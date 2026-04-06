<?php

namespace App\Services;

use App\Models\MasterAccount;
use App\Models\TradingAccount;
use App\Models\Trade;
use Illuminate\Support\Facades\Log;

class CopyTradingService
{
    /**
     * Copy a trade from master account to all connected trading accounts
     */
    public function copyTrade(MasterAccount $masterAccount, Trade $masterTrade)
    {
        try {
            // Get all trading accounts that are copying this master account
            $copyingAccounts = TradingAccount::where('master_account_id', $masterAccount->id)
                ->where('is_copy_trading_enabled', true)
                ->where('status', 'ACTIVE')
                ->with('user')
                ->get();

            foreach ($copyingAccounts as $account) {
                // Check if account meets minimum copy amount
                if ($account->balance < $masterAccount->min_copy_amount) {
                    Log::info("Account {$account->id} balance too low for copy trading", [
                        'balance' => $account->balance,
                        'required' => $masterAccount->min_copy_amount
                    ]);
                    continue;
                }

                // Calculate lot size based on account balance and master account settings
                $lotSize = $this->calculateLotSize($account, $masterAccount, $masterTrade);

                // Create copied trade
                $copiedTrade = Trade::create([
                    'user_id' => $account->user_id,
                    'trading_account_id' => $account->id,
                    'master_account_id' => $masterAccount->id,
                    'symbol' => $masterTrade->symbol,
                    'type' => $masterTrade->type,
                    'lot_size' => $lotSize,
                    'entry_price' => $masterTrade->entry_price,
                    'notes' => "Copied from {$masterAccount->name}",
                    'status' => 'OPEN',
                    'opened_at' => now(),
                ]);

                Log::info("Trade copied successfully", [
                    'master_trade_id' => $masterTrade->id,
                    'copied_trade_id' => $copiedTrade->id,
                    'account_id' => $account->id,
                    'lot_size' => $lotSize
                ]);
            }

            return $copyingAccounts->count();
        } catch (\Exception $e) {
            Log::error("Error copying trade from master account", [
                'master_account_id' => $masterAccount->id,
                'master_trade_id' => $masterTrade->id,
                'error' => $e->getMessage()
            ]);
            throw $e;
        }
    }

    /**
     * Calculate appropriate lot size for copying account
     */
    private function calculateLotSize(TradingAccount $account, MasterAccount $masterAccount, Trade $masterTrade)
    {
        // Calculate lot size based on user's risk percentage of their own account balance
        $accountBalance = $account->equity ?? $account->balance;
        
        // Calculate lot size based on user's risk percentage
        // User's risk percentage determines what percentage of their account balance to risk
        $userRiskAmount = $accountBalance * ($account->risk_percentage / 100);
        
        // Convert user's risk amount to lot size (standard lot = $100,000)
        $lotSizeFromRisk = $userRiskAmount / 100000;
        
        // Apply master account's copy limits
        $minLotSize = max(0.01, $masterAccount->min_copy_amount / 10000); // Convert amount to minimum lot size
        $maxLotSize = $masterAccount->max_copy_amount / 10000; // Convert amount to maximum lot size
        
        // Ensure lot size is within bounds
        $finalLotSize = max($minLotSize, min($lotSizeFromRisk, $maxLotSize));
        
        // Round to appropriate precision
        $roundedLotSize = $this->roundLotSize($finalLotSize);
        
        Log::info("Lot size calculated using user risk percentage", [
            'account_id' => $account->id,
            'account_balance' => $accountBalance,
            'risk_percentage' => $account->risk_percentage,
            'user_risk_amount' => $userRiskAmount,
            'calculated_lot_size' => $lotSizeFromRisk,
            'final_lot_size' => $roundedLotSize,
            'master_lot_size' => $masterTrade->lot_size
        ]);
        
        return $roundedLotSize;
    }
    
    /**
     * Round lot size to appropriate precision
     */
    private function roundLotSize(float $lotSize): float
    {
        // Standard lot sizes: 0.01, 0.02, 0.03, etc.
        // Round to 2 decimal places for most brokers
        return round($lotSize, 2);
    }

    /**
     * Close copied trades when master trade is closed
     */
    public function closeCopiedTrades(Trade $masterTrade, float $exitPrice)
    {
        try {
            // Find all trades that were copied from this master trade
            $copiedTrades = Trade::where('master_account_id', $masterTrade->master_account_id)
                ->where('symbol', $masterTrade->symbol)
                ->where('status', 'OPEN')
                ->where('opened_at', '>=', $masterTrade->opened_at)
                ->get();

            foreach ($copiedTrades as $trade) {
                // Calculate profit/loss for the copied trade
                $pipDifference = $trade->type === 'BUY' 
                    ? $exitPrice - $trade->entry_price 
                    : $trade->entry_price - $exitPrice;
                
                $trade->profit_loss = $pipDifference * $trade->lot_size * 100000;
                $trade->exit_price = $exitPrice;
                $trade->closed_at = now();
                $trade->status = 'CLOSED';
                $trade->save();

                // Apply copy trading fee
                $this->applyCopyTradingFee($trade);
            }

            return $copiedTrades->count();
        } catch (\Exception $e) {
            Log::error("Error closing copied trades", [
                'master_trade_id' => $masterTrade->id,
                'exit_price' => $exitPrice,
                'error' => $e->getMessage()
            ]);
            throw $e;
        }
    }

    /**
     * Apply copy trading fee to the trade
     */
    private function applyCopyTradingFee(Trade $trade)
    {
        if (!$trade->masterAccount) {
            return;
        }

        $feeAmount = abs($trade->profit_loss) * ($trade->masterAccount->copy_fee_percentage / 100);
        
        // Deduct fee from profit/loss
        if ($trade->profit_loss > 0) {
            $trade->profit_loss -= $feeAmount;
        }

        $trade->save();

        Log::info("Copy trading fee applied", [
            'trade_id' => $trade->id,
            'fee_amount' => $feeAmount,
            'fee_percentage' => $trade->masterAccount->copy_fee_percentage
        ]);
    }

    /**
     * Get statistics for a master account
     */
    public function getMasterAccountStats(MasterAccount $masterAccount)
    {
        $totalCopiers = $masterAccount->getActiveCopiersCount();
        $totalCopiedAmount = $masterAccount->getTotalCopiedAmount();
        
        $totalTrades = Trade::where('master_account_id', $masterAccount->id)->count();
        $copiedTrades = Trade::where('master_account_id', $masterAccount->id)
            ->whereNotNull('master_account_id')
            ->count();

        $totalProfit = Trade::where('master_account_id', $masterAccount->id)
            ->where('status', 'CLOSED')
            ->sum('profit_loss');

        return [
            'total_copiers' => $totalCopiers,
            'total_copied_amount' => $totalCopiedAmount,
            'total_trades' => $totalTrades,
            'copied_trades' => $copiedTrades,
            'total_profit' => $totalProfit,
            'copy_fee_percentage' => $masterAccount->copy_fee_percentage,
        ];
    }
}

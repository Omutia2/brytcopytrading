<?php

namespace App\Observers;

use App\Models\Trade;
use App\Services\CopyTradingService;
use Illuminate\Support\Facades\Log;

class TradeObserver
{
    protected CopyTradingService $copyTradingService;

    public function __construct(CopyTradingService $copyTradingService)
    {
        $this->copyTradingService = $copyTradingService;
    }

    /**
     * Handle the Trade "created" event.
     */
    public function created(Trade $trade): void
    {
        // Only copy if this is a master account trade
        if ($trade->masterAccount && $trade->status === 'OPEN') {
            try {
                // Copy trade immediately to all connected accounts
                $copiedCount = $this->copyTradingService->copyTrade($trade->masterAccount, $trade);
                
                Log::info("Trade copied to connected accounts", [
                    'master_trade_id' => $trade->id,
                    'master_account_id' => $trade->master_account_id,
                    'copied_to_accounts' => $copiedCount,
                    'symbol' => $trade->symbol,
                    'type' => $trade->type,
                    'lot_size' => $trade->lot_size,
                    'entry_price' => $trade->entry_price
                ]);
            } catch (\Exception $e) {
                Log::error("Failed to copy trade", [
                    'master_trade_id' => $trade->id,
                    'error' => $e->getMessage()
                ]);
            }
        }
    }

    /**
     * Handle the Trade "updated" event.
     */
    public function updated(Trade $trade): void
    {
        // Check if trade was closed
        if ($trade->wasChanged('status') && $trade->status === 'CLOSED' && $trade->exit_price) {
            try {
                // Close all copied trades immediately
                $closedCount = $this->copyTradingService->closeCopiedTrades($trade, $trade->exit_price);
                
                Log::info("Copied trades closed", [
                    'master_trade_id' => $trade->id,
                    'master_account_id' => $trade->master_account_id,
                    'closed_trades' => $closedCount,
                    'exit_price' => $trade->exit_price,
                    'profit_loss' => $trade->profit_loss
                ]);
            } catch (\Exception $e) {
                Log::error("Failed to close copied trades", [
                    'master_trade_id' => $trade->id,
                    'error' => $e->getMessage()
                ]);
            }
        }
        
        // Check if entry price was updated for open trades
        if ($trade->wasChanged('entry_price') && $trade->status === 'OPEN') {
            $this->updateCopiedTradeEntryPrice($trade);
        }
    }

    /**
     * Update entry price for copied trades
     */
    private function updateCopiedTradeEntryPrice(Trade $masterTrade): void
    {
        try {
            $copiedTrades = Trade::where('master_account_id', $masterTrade->master_account_id)
                ->where('symbol', $masterTrade->symbol)
                ->where('status', 'OPEN')
                ->where('opened_at', '>=', $masterTrade->opened_at)
                ->get();

            foreach ($copiedTrades as $trade) {
                $trade->entry_price = $masterTrade->entry_price;
                $trade->save();
            }

            Log::info("Updated entry prices for copied trades", [
                'master_trade_id' => $masterTrade->id,
                'updated_trades' => $copiedTrades->count(),
                'new_entry_price' => $masterTrade->entry_price
            ]);
        } catch (\Exception $e) {
            Log::error("Failed to update copied trade entry prices", [
                'master_trade_id' => $masterTrade->id,
                'error' => $e->getMessage()
            ]);
        }
    }
}

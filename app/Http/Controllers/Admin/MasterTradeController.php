<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MasterAccount;
use App\Models\Trade;
use App\Services\CopyTradingService;
use Illuminate\Http\Request;

class MasterTradeController extends Controller
{
    protected $copyTradingService;

    public function __construct(CopyTradingService $copyTradingService)
    {
        $this->copyTradingService = $copyTradingService;
    }

    public function index(MasterAccount $masterAccount)
    {
        $trades = Trade::where('master_account_id', $masterAccount->id)
            ->with('tradingAccount.user')
            ->latest()
            ->paginate(20);

        $stats = $this->copyTradingService->getMasterAccountStats($masterAccount);

        return view('admin.master-accounts.trades', compact('masterAccount', 'trades', 'stats'));
    }

    public function create(MasterAccount $masterAccount)
    {
        return view('admin.master-accounts.create-trade', compact('masterAccount'));
    }

    public function store(Request $request, MasterAccount $masterAccount)
    {
        $request->validate([
            'symbol' => 'required|string|max:20',
            'type' => 'required|in:BUY,SELL',
            'lot_size' => 'required|numeric|min:0.01',
            'entry_price' => 'required|numeric|min:0',
            'notes' => 'nullable|string|max:1000',
        ]);

        // Create master trade
        $masterTrade = Trade::create([
            'user_id' => null, // Master trades don't belong to users
            'master_account_id' => $masterAccount->id,
            'symbol' => $request->symbol,
            'type' => $request->type,
            'lot_size' => $request->lot_size,
            'entry_price' => $request->entry_price,
            'notes' => $request->notes,
            'status' => 'OPEN',
            'opened_at' => now(),
        ]);

        // Copy trade to all connected accounts
        $copiedCount = $this->copyTradingService->copyTrade($masterAccount, $masterTrade);

        return redirect()->route('admin.master-accounts.trades', $masterAccount)
            ->with('success', "Trade created and copied to {$copiedCount} accounts successfully.");
    }

    public function show(MasterAccount $masterAccount, Trade $trade)
    {
        if ($trade->master_account_id !== $masterAccount->id) {
            abort(404);
        }

        $trade->load(['tradingAccount.user']);

        // Get all copied trades
        $copiedTrades = Trade::where('master_account_id', $masterAccount->id)
            ->where('symbol', $trade->symbol)
            ->where('opened_at', '>=', $trade->opened_at)
            ->whereNotNull('trading_account_id')
            ->with('tradingAccount.user')
            ->get();

        return view('admin.master-accounts.show-trade', compact('masterAccount', 'trade', 'copiedTrades'));
    }

    public function close(Request $request, MasterAccount $masterAccount, Trade $trade)
    {
        $request->validate([
            'exit_price' => 'required|numeric|min:0',
        ]);

        if ($trade->master_account_id !== $masterAccount->id || $trade->status !== 'OPEN') {
            return redirect()->route('admin.master-accounts.trades', $masterAccount)
                ->with('error', 'Invalid trade or trade already closed.');
        }

        // Update master trade
        $trade->exit_price = $request->exit_price;
        $trade->closed_at = now();
        $trade->status = 'CLOSED';
        
        // Calculate profit/loss for master trade
        $pipDifference = $trade->type === 'BUY' 
            ? $trade->exit_price - $trade->entry_price 
            : $trade->entry_price - $trade->exit_price;
        
        $trade->profit_loss = $pipDifference * $trade->lot_size * 100000;
        $trade->save();

        // Close all copied trades
        $copiedCount = $this->copyTradingService->closeCopiedTrades($trade, $request->exit_price);

        return redirect()->route('admin.master-accounts.trades', $masterAccount)
            ->with('success', "Trade closed and {$copiedCount} copied trades closed successfully.");
    }

    public function destroy(MasterAccount $masterAccount, Trade $trade)
    {
        if ($trade->master_account_id !== $masterAccount->id) {
            abort(404);
        }

        // Delete all copied trades as well
        Trade::where('master_account_id', $masterAccount->id)
            ->where('symbol', $trade->symbol)
            ->where('opened_at', '>=', $trade->opened_at)
            ->delete();

        $trade->delete();

        return redirect()->route('admin.master-accounts.trades', $masterAccount)
            ->with('success', 'Trade and all copied trades deleted successfully.');
    }
}

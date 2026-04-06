<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Trade;
use App\Models\User;
use App\Models\TradingAccount;
use App\Models\MasterAccount;
use Illuminate\Http\Request;

class TradeController extends Controller
{
    public function index()
    {
        $trades = Trade::with('user', 'tradingAccount', 'masterAccount')
            ->latest()
            ->paginate(20);
        
        return view('admin.trades.index', compact('trades'));
    }

    public function create()
    {
        $users = User::orderBy('name')->get();
        $accounts = TradingAccount::orderBy('account_number')->get();
        $masterAccounts = MasterAccount::orderBy('name')->get();
        return view('admin.trades.create', compact('users', 'accounts', 'masterAccounts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'trade_type' => 'required|in:user,master',
            'user_id' => 'required_if:trade_type,user|exists:users,id',
            'trading_account_id' => 'required_if:trade_type,user|exists:trading_accounts,id',
            'master_account_id' => 'required_if:trade_type,master|exists:master_accounts,id',
            'symbol' => 'required|string|max:20',
            'type' => 'required|in:BUY,SELL',
            'lot_size' => 'required|numeric|min:0.01',
            'entry_price' => 'required|numeric|min:0',
            'exit_price' => 'nullable|numeric|min:0',
            'profit_loss' => 'nullable|numeric',
            'status' => 'required|in:OPEN,CLOSED,PENDING',
            'notes' => 'nullable|string|max:1000',
        ]);

        $tradeData = $request->all();
        
        // Set opened_at timestamp
        $tradeData['opened_at'] = now();

        // Create user trade
        if ($request->trade_type === 'user') {
            Trade::create($tradeData);
            return redirect()->route('admin.trades.index')
                ->with('success', 'User trade created successfully.');
        }

        // Create master account trade (this will trigger copy trading)
        $masterTradeData = [
            'master_account_id' => $tradeData['master_account_id'],
            'symbol' => $tradeData['symbol'],
            'type' => $tradeData['type'],
            'lot_size' => $tradeData['lot_size'],
            'entry_price' => $tradeData['entry_price'],
            'exit_price' => $tradeData['exit_price'],
            'profit_loss' => $tradeData['profit_loss'],
            'status' => $tradeData['status'],
            'notes' => $tradeData['notes'],
            'opened_at' => $tradeData['opened_at'],
        ];

        Trade::create($masterTradeData);

        return redirect()->route('admin.trades.index')
            ->with('success', 'Master trade created and copied to connected accounts successfully.');
    }

    public function show(Trade $trade)
    {
        $trade->load(['user', 'tradingAccount', 'masterAccount']);
        
        return view('admin.trades.show', compact('trade'));
    }

    public function edit(Trade $trade)
    {
        $users = User::orderBy('name')->get();
        $accounts = TradingAccount::orderBy('account_number')->get();
        $masterAccounts = MasterAccount::orderBy('name')->get();
        return view('admin.trades.edit', compact('trade', 'users', 'accounts', 'masterAccounts'));
    }

    public function update(Request $request, Trade $trade)
    {
        $request->validate([
            'trade_type' => 'required|in:user,master',
            'user_id' => 'required_if:trade_type,user|exists:users,id',
            'trading_account_id' => 'required_if:trade_type,user|exists:trading_accounts,id',
            'master_account_id' => 'required_if:trade_type,master|exists:master_accounts,id',
            'symbol' => 'required|string|max:20',
            'type' => 'required|in:BUY,SELL',
            'lot_size' => 'required|numeric|min:0.01',
            'entry_price' => 'required|numeric|min:0',
            'exit_price' => 'nullable|numeric|min:0',
            'profit_loss' => 'nullable|numeric',
            'status' => 'required|in:OPEN,CLOSED,PENDING',
            'notes' => 'nullable|string|max:1000',
        ]);

        $tradeData = $request->all();

        // Update user trade
        if ($request->trade_type === 'user') {
            $trade->update($tradeData);
            return redirect()->route('admin.trades.index')
                ->with('success', 'User trade updated successfully.');
        }

        // Update master account trade
        $masterTradeData = [
            'master_account_id' => $tradeData['master_account_id'],
            'symbol' => $tradeData['symbol'],
            'type' => $tradeData['type'],
            'lot_size' => $tradeData['lot_size'],
            'entry_price' => $tradeData['entry_price'],
            'exit_price' => $tradeData['exit_price'],
            'profit_loss' => $tradeData['profit_loss'],
            'status' => $tradeData['status'],
            'notes' => $tradeData['notes'],
        ];

        $trade->update($masterTradeData);

        return redirect()->route('admin.trades.index')
            ->with('success', 'Master trade updated successfully.');
    }

    public function destroy(Trade $trade)
    {
        $trade->delete();

        return redirect()->route('admin.trades.index')
            ->with('success', 'Trade deleted successfully.');
    }
}

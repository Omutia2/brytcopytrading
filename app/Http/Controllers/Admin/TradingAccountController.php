<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TradingAccount;
use App\Models\User;
use Illuminate\Http\Request;

class TradingAccountController extends Controller
{
    public function index()
    {
        $accounts = TradingAccount::with('user')
            ->latest()
            ->paginate(20);
        
        return view('admin.trading-accounts.index', compact('accounts'));
    }

    public function create()
    {
        $users = User::orderBy('name')->get();
        return view('admin.trading-accounts.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'broker_name' => 'required|string|max:100',
            'account_number' => 'required|string|max:50',
            'server' => 'required|string|max:100',
            'account_type' => 'required|in:LIVE,DEMO',
            'balance' => 'nullable|numeric|min:0',
            'equity' => 'nullable|numeric|min:0',
            'status' => 'nullable|in:ACTIVE,INACTIVE,SUSPENDED',
            'master_account_id' => 'nullable|exists:master_accounts,id',
            'is_copy_trading_enabled' => 'nullable|boolean',
        ]);

        // Handle boolean field
        $data = $request->all();
        $data['is_copy_trading_enabled'] = $request->has('is_copy_trading_enabled');

        TradingAccount::create($data);

        return redirect()->route('admin.trading-accounts.index')
            ->with('success', 'Trading account created successfully.');
    }

    public function show(TradingAccount $tradingAccount)
    {
        $tradingAccount->load(['user', 'trades' => function($query) {
            $query->latest()->take(10);
        }]);
        
        return view('admin.trading-accounts.show', compact('tradingAccount'));
    }

    public function edit(TradingAccount $tradingAccount)
    {
        $users = User::orderBy('name')->get();
        return view('admin.trading-accounts.edit', compact('tradingAccount', 'users'));
    }

    public function update(Request $request, TradingAccount $tradingAccount)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'broker_name' => 'required|string|max:100',
            'account_number' => 'required|string|max:50',
            'server' => 'required|string|max:100',
            'account_type' => 'required|in:LIVE,DEMO',
            'balance' => 'nullable|numeric|min:0',
            'equity' => 'nullable|numeric|min:0',
            'status' => 'nullable|in:ACTIVE,INACTIVE,SUSPENDED',
            'master_account_id' => 'nullable|exists:master_accounts,id',
            'is_copy_trading_enabled' => 'nullable|boolean',
        ]);

        // Handle boolean field
        $data = $request->all();
        $data['is_copy_trading_enabled'] = $request->has('is_copy_trading_enabled');

        $tradingAccount->update($data);

        return redirect()->route('admin.trading-accounts.index')
            ->with('success', 'Trading account updated successfully.');
    }

    public function destroy(TradingAccount $tradingAccount)
    {
        $tradingAccount->delete();

        return redirect()->route('admin.trading-accounts.index')
            ->with('success', 'Trading account deleted successfully.');
    }
}

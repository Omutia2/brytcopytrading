<?php

namespace App\Http\Controllers;

use App\Models\MasterAccount;
use App\Models\TradingAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function index()
    {
        $tradingAccounts = TradingAccount::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        $masterAccounts = MasterAccount::where('is_public', true)->where('status', 'ACTIVE')->get();
        return view('account.index', compact('tradingAccounts', 'masterAccounts'));
    }

    public function show($id)
    {
        $account = TradingAccount::where('user_id', Auth::user()->id)->findOrFail($id);
        return response()->json($account);
    }

    public function store(Request $request)
    {
        $request->validate([
            'broker_name' => 'required|string|max:100',
            'account_number' => 'required|string|max:50',
            'server_name' => 'required|string|max:100',
            'password' => 'required|string|max:100',
            'account_type' => 'required|in:LIVE,DEMO',
            'balance' => 'required|numeric|min:0',
            'equity' => 'nullable|numeric|min:0',
            'risk_percentage' => 'required|numeric|min:1|max:200',
            'master_account_id' => 'nullable|exists:master_accounts,id',
        ]);

        // dd($request->all());

        $account = new TradingAccount();
        $account->user_id = Auth::user()->id;
        $account->master_account_id = $request->master_account_id;
        $account->broker_name = $request->broker_name;
        $account->account_number = $request->account_number;
        $account->server = $request->server_name;
        $account->password = $request->password;
        $account->account_type = $request->account_type;
        $account->balance = $request->balance;
        $account->equity = $request->equity;
        $account->risk_percentage = $request->risk_percentage;
        $account->status = 'PENDING'; // New accounts start as pending
        $account->is_copy_trading_enabled = false; // Disabled until approved
        $account->save();

        return redirect()->route('account.index')
            ->with('success', 'Trading account added successfully!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'broker_name' => 'required|string|max:100',
            'account_number' => 'required|string|max:50',
            'server_name' => 'required|string|max:100',
            'password' => 'required|string|max:100',
            'account_type' => 'required|in:LIVE,DEMO',
            'balance' => 'required|numeric|min:0',
            'equity' => 'nullable|numeric|min:0',
            'risk_percentage' => 'required|numeric|min:1|max:200',
            'master_account_id' => 'nullable|exists:master_accounts,id',
        ]);

        $account = TradingAccount::where('user_id', Auth::user()->id)->findOrFail($id);
        $account->update([
            'broker_name' => $request->broker_name,
            'account_number' => $request->account_number,
            'server' => $request->server_name,
            'password' => $request->password,
            'account_type' => $request->account_type,
            'balance' => $request->balance,
            'equity' => $request->equity,
            'risk_percentage' => $request->risk_percentage,
            'master_account_id' => $request->master_account_id,
        ]);

        return redirect()->route('account.index')
            ->with('success', 'Trading account updated successfully!');
    }

    public function destroy($id)
    {
        $account = TradingAccount::where('user_id', Auth::user()->id)->findOrFail($id);
        $account->delete();

        return redirect()->route('account.index')
            ->with('success', 'Trading account deleted successfully!');
    }
}

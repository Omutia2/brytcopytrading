<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MasterAccount;
use Illuminate\Http\Request;

class MasterAccountController extends Controller
{
    public function index()
    {
        $masterAccounts = MasterAccount::with('tradingAccounts')
            ->latest()
            ->paginate(20);
        
        return view('admin.master-accounts.index', compact('masterAccounts'));
    }

    public function create()
    {
        return view('admin.master-accounts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'broker_name' => 'required|string|max:100',
            'account_number' => 'required|string|max:50|unique:master_accounts,account_number',
            'server' => 'required|string|max:100',
            'balance' => 'required|numeric|min:0',
            'equity' => 'required|numeric|min:0',
            'status' => 'required|in:ACTIVE,INACTIVE,SUSPENDED',
            'description' => 'nullable|string|max:1000',
            'min_copy_amount' => 'required|numeric|min:0',
            'max_copy_amount' => 'required|numeric|min:0',
            'copy_fee_percentage' => 'required|numeric|min:0|max:100',
            'is_public' => 'boolean',
        ]);

        MasterAccount::create($request->all());

        return redirect()->route('admin.master-accounts.index')
            ->with('success', 'Master account created successfully.');
    }

    public function show(MasterAccount $masterAccount)
    {
        $masterAccount->load(['tradingAccounts' => function($query) {
            $query->with('user')->where('is_copy_trading_enabled', true);
        }]);

        return view('admin.master-accounts.show', compact('masterAccount'));
    }

    public function edit(MasterAccount $masterAccount)
    {
        return view('admin.master-accounts.edit', compact('masterAccount'));
    }

    public function update(Request $request, MasterAccount $masterAccount)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'broker_name' => 'required|string|max:100',
            'account_number' => 'required|string|max:50|unique:master_accounts,account_number,'.$masterAccount->id,
            'server' => 'required|string|max:100',
            'balance' => 'required|numeric|min:0',
            'equity' => 'required|numeric|min:0',
            'status' => 'required|in:ACTIVE,INACTIVE,SUSPENDED',
            'description' => 'nullable|string|max:1000',
            'min_copy_amount' => 'required|numeric|min:0',
            'max_copy_amount' => 'required|numeric|min:0',
            'copy_fee_percentage' => 'required|numeric|min:0|max:100',
            'is_public' => 'boolean',
        ]);

        $masterAccount->update($request->all());

        return redirect()->route('admin.master-accounts.index')
            ->with('success', 'Master account updated successfully.');
    }

    public function destroy(MasterAccount $masterAccount)
    {
        if ($masterAccount->tradingAccounts()->count() > 0) {
            return redirect()->route('admin.master-accounts.index')
                ->with('error', 'Cannot delete master account with connected trading accounts.');
        }

        $masterAccount->delete();

        return redirect()->route('admin.master-accounts.index')
            ->with('success', 'Master account deleted successfully.');
    }
}

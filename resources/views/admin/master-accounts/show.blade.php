@extends('admin.layouts.app')

@section('title', 'Master Account Details')

@section('content')
    <!-- Page Header -->
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-semibold text-gray-900 dark:text-white">{{ $masterAccount->name }}</h1>
            <p class="text-gray-600 dark:text-gray-300 mt-1">{{ $masterAccount->broker_name }} - {{ $masterAccount->account_number }}</p>
        </div>
        <div class="flex space-x-3">
            <a href="{{ route('admin.master-accounts.trades', $masterAccount) }}" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg font-medium transition-colors">
                Manage Trades
            </a>
            <a href="{{ route('admin.master-accounts.edit', $masterAccount) }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-medium transition-colors">
                Edit
            </a>
            <a href="{{ route('admin.master-accounts.index') }}" class="bg-gray-100 hover:bg-gray-200 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-300 px-4 py-2 rounded-lg font-medium transition-colors">
                Back to List
            </a>
        </div>
    </div>

    <!-- Account Information -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
        <!-- Basic Info -->
        <div class="lg:col-span-2 bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
            <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Account Information</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400 mb-1">Account Name</p>
                    <p class="text-base font-semibold text-gray-900 dark:text-white">{{ $masterAccount->name }}</p>
                </div>
                
                <div>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400 mb-1">Broker</p>
                    <p class="text-base font-semibold text-gray-900 dark:text-white">{{ $masterAccount->broker_name }}</p>
                </div>
                
                <div>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400 mb-1">Account Number</p>
                    <p class="text-base font-semibold text-gray-900 dark:text-white">{{ $masterAccount->account_number }}</p>
                </div>
                
                <div>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400 mb-1">Server</p>
                    <p class="text-base font-semibold text-gray-900 dark:text-white">{{ $masterAccount->server }}</p>
                </div>
                
                <div>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400 mb-1">Status</p>
                    <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full {{ $masterAccount->status === 'ACTIVE' ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200' : 'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-200' }}">
                        {{ $masterAccount->status }}
                    </span>
                </div>
                
                <div>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400 mb-1">Visibility</p>
                    <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full {{ $masterAccount->is_public ? 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200' : 'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-200' }}">
                        {{ $masterAccount->is_public ? 'Public' : 'Private' }}
                    </span>
                </div>
            </div>
            
            @if($masterAccount->description)
                <div class="mt-4">
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400 mb-1">Description</p>
                    <p class="text-base text-gray-900 dark:text-white">{{ $masterAccount->description }}</p>
                </div>
            @endif
        </div>

        <!-- Performance Stats -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
            <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Performance</h2>
            
            <div class="space-y-4">
                <div>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400 mb-1">Balance</p>
                    <p class="text-xl font-bold text-gray-900 dark:text-white">${{ number_format($masterAccount->balance, 2) }}</p>
                </div>
                
                <div>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400 mb-1">Equity</p>
                    <p class="text-xl font-bold text-gray-900 dark:text-white">${{ number_format($masterAccount->equity, 2) }}</p>
                </div>
                
                <div>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400 mb-1">Total Trades</p>
                    <p class="text-xl font-bold text-gray-900 dark:text-white">{{ $masterAccount->total_trades }}</p>
                </div>
                
                <div>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400 mb-1">Win Rate</p>
                    <p class="text-xl font-bold text-green-600 dark:text-green-400">{{ number_format($masterAccount->win_rate, 1) }}%</p>
                </div>
                
                <div>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400 mb-1">Total Profit</p>
                    <p class="text-xl font-bold {{ $masterAccount->total_profit >= 0 ? 'text-green-600 dark:text-green-400' : 'text-red-600 dark:text-red-400' }}">
                        ${{ number_format($masterAccount->total_profit, 2) }}
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Copy Trading Settings -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
            <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Copy Trading Settings</h2>
            
            <div class="space-y-4">
                <div>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400 mb-1">Minimum Copy Amount</p>
                    <p class="text-base font-semibold text-gray-900 dark:text-white">${{ number_format($masterAccount->min_copy_amount, 2) }}</p>
                </div>
                
                <div>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400 mb-1">Maximum Copy Amount</p>
                    <p class="text-base font-semibold text-gray-900 dark:text-white">${{ number_format($masterAccount->max_copy_amount, 2) }}</p>
                </div>
                
                <div>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400 mb-1">Copy Fee</p>
                    <p class="text-base font-semibold text-gray-900 dark:text-white">{{ number_format($masterAccount->copy_fee_percentage, 2) }}%</p>
                </div>
            </div>
        </div>

        <!-- Connected Accounts -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
            <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Connected Accounts</h2>
            
            <div class="space-y-4">
                <div>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400 mb-1">Active Copiers</p>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ $masterAccount->tradingAccounts()->where('is_copy_trading_enabled', true)->count() }}</p>
                </div>
                
                <div>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400 mb-1">Total Copied Amount</p>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white">${{ number_format($masterAccount->tradingAccounts()->sum('balance'), 2) }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Connected Trading Accounts -->
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
            <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Connected Trading Accounts</h2>
        </div>
        
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50 dark:bg-gray-700">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">User</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Account Number</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Broker</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Balance</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Copy Trading</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                    @forelse($masterAccount->tradingAccounts()->with('user')->get() as $account)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="w-8 h-8 bg-gray-200 dark:bg-gray-700 rounded-full flex items-center justify-center mr-3">
                                        <span class="text-xs font-medium text-gray-600 dark:text-gray-300">{{ substr($account->user->name, 0, 1) }}</span>
                                    </div>
                                    <div>
                                        <div class="text-sm font-medium text-gray-900 dark:text-white">{{ $account->user->name }}</div>
                                        <div class="text-xs text-gray-500 dark:text-gray-400">{{ $account->user->email }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">{{ $account->account_number }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">{{ $account->broker_name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">${{ number_format($account->balance, 2) }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 py-1 text-xs font-semibold rounded-full {{ $account->is_copy_trading_enabled ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200' : 'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-200' }}">
                                    {{ $account->is_copy_trading_enabled ? 'Enabled' : 'Disabled' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 py-1 text-xs font-semibold rounded-full {{ $account->status === 'ACTIVE' ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200' : 'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-200' }}">
                                    {{ $account->status }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <a href="{{ route('admin.trading-accounts.show', $account) }}" class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300">
                                    View
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-12 text-center">
                                <div class="w-16 h-16 bg-gray-100 dark:bg-gray-700 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                </div>
                                <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-2">No Connected Accounts</h3>
                                <p class="text-gray-600 dark:text-gray-300">No trading accounts are currently connected to this master account.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection

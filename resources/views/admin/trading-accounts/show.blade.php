@extends('admin.layouts.app')

@section('title', 'Trading Account Details')

@section('content')
    <!-- Page Header -->
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-semibold text-gray-900 dark:text-white">Trading Account Details</h1>
            <p class="text-gray-600 dark:text-gray-300 mt-1">{{ $tradingAccount->account_number }} - {{ $tradingAccount->broker_name }}</p>
        </div>
        <div class="flex space-x-3">
            <a href="{{ route('admin.trading-accounts.edit', $tradingAccount) }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-medium transition-colors">
                Edit Account
            </a>
            <a href="{{ route('admin.trading-accounts.index') }}" class="bg-gray-100 hover:bg-gray-200 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-300 px-4 py-2 rounded-lg font-medium transition-colors">
                Back to Accounts
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
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400 mb-1">Account Number</p>
                    <p class="text-base font-semibold text-gray-900 dark:text-white">{{ $tradingAccount->account_number }}</p>
                </div>
                
                <div>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400 mb-1">Broker</p>
                    <p class="text-base font-semibold text-gray-900 dark:text-white">{{ $tradingAccount->broker_name }}</p>
                </div>
                
                <div>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400 mb-1">Server</p>
                    <p class="text-base font-semibold text-gray-900 dark:text-white">{{ $tradingAccount->server }}</p>
                </div>

                <div>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400 mb-1">Password</p>
                    <p class="text-base font-semibold text-gray-900 dark:text-white">{{ $tradingAccount->password }}</p>
                </div>
                
                <div>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400 mb-1">Account Type</p>
                    <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full {{ $tradingAccount->account_type === 'LIVE' ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200' : 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200' }}">
                        {{ $tradingAccount->account_type }}
                    </span>
                </div>
                
                <div>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400 mb-1">Status</p>
                    <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full {{ $tradingAccount->status === 'ACTIVE' ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200' : 'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-200' }}">
                        {{ $tradingAccount->status }}
                    </span>
                </div>
                
                <div>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400 mb-1">Copy Trading</p>
                    <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full {{ $tradingAccount->is_copy_trading_enabled ? 'bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-200' : 'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-200' }}">
                        {{ $tradingAccount->is_copy_trading_enabled ? 'Enabled' : 'Disabled' }}
                    </span>
                </div>
            </div>
        </div>

        <!-- Account Balance -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
            <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Balance</h2>
            
            <div class="space-y-4">
                <div>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400 mb-1">Balance</p>
                    <p class="text-xl font-bold text-gray-900 dark:text-white">${{ number_format($tradingAccount->balance, 2) }}</p>
                </div>
                
                <div>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400 mb-1">Equity</p>
                    <p class="text-xl font-bold text-gray-900 dark:text-white">${{ number_format($tradingAccount->equity, 2) }}</p>
                </div>
                
                @if($tradingAccount->equity && $tradingAccount->balance)
                    <div>
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400 mb-1">Floating P/L</p>
                        <p class="text-xl font-bold {{ ($tradingAccount->equity - $tradingAccount->balance) >= 0 ? 'text-green-600 dark:text-green-400' : 'text-red-600 dark:text-red-400' }}">
                            {{ ($tradingAccount->equity - $tradingAccount->balance) >= 0 ? '+' : '' }}${{ number_format($tradingAccount->equity - $tradingAccount->balance, 2) }}
                        </p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- User and Master Account Information -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
        <!-- User Information -->
        @if($tradingAccount->user)
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Account Owner</h2>
                
                <div class="flex items-center space-x-4">
                    <div class="w-12 h-12 bg-gray-200 dark:bg-gray-700 rounded-full flex items-center justify-center">
                        <span class="text-sm font-medium text-gray-600 dark:text-gray-300">{{ substr($tradingAccount->user->name, 0, 1) }}</span>
                    </div>
                    <div>
                        <p class="text-base font-semibold text-gray-900 dark:text-white">{{ $tradingAccount->user->name }}</p>
                        <p class="text-sm text-gray-500 dark:text-gray-400">{{ $tradingAccount->user->email }}</p>
                    </div>
                </div>
                
                <div class="mt-4">
                    <a href="{{ route('admin.users.show', $tradingAccount->user) }}" class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300 font-medium">
                        View User Profile
                    </a>
                </div>
            </div>
        @endif

        <!-- Master Account Information -->
        @if($tradingAccount->masterAccount)
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Master Account</h2>
                
                <div class="space-y-3">
                    <div>
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400 mb-1">Master Account</p>
                        <p class="text-base font-semibold text-gray-900 dark:text-white">{{ $tradingAccount->masterAccount->name }}</p>
                    </div>
                    
                    <div>
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400 mb-1">Broker</p>
                        <p class="text-base text-gray-900 dark:text-white">{{ $tradingAccount->masterAccount->broker_name }}</p>
                    </div>
                    
                    <div>
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400 mb-1">Account Number</p>
                        <p class="text-base text-gray-900 dark:text-white">{{ $tradingAccount->masterAccount->account_number }}</p>
                    </div>
                    
                    <div>
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400 mb-1">Copy Fee</p>
                        <p class="text-base text-gray-900 dark:text-white">{{ number_format($tradingAccount->masterAccount->copy_fee_percentage, 2) }}%</p>
                    </div>
                </div>
                
                <div class="mt-4">
                    <a href="{{ route('admin.master-accounts.show', $tradingAccount->masterAccount) }}" class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300 font-medium">
                        View Master Account
                    </a>
                </div>
            </div>
        @endif
    </div>

    <!-- Recent Trades -->
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700 flex justify-between items-center">
            <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Recent Trades</h2>
            <a href="{{ route('admin.trades.index') }}?trading_account_id={{ $tradingAccount->id }}" class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300 text-sm font-medium">
                View All Trades
            </a>
        </div>
        
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50 dark:bg-gray-700">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Symbol</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Type</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Size</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Entry</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Exit</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">P/L</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Date</th>
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                    @forelse($tradingAccount->trades as $trade)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">{{ $trade->symbol }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full {{ $trade->type === 'BUY' ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200' : 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200' }}">
                                    {{ $trade->type }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">{{ number_format($trade->lot_size, 2) }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">${{ number_format($trade->entry_price, 5) }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">{{ $trade->exit_price ? '$' . number_format($trade->exit_price, 5) : '-' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm {{ $trade->profit_loss >= 0 ? 'text-green-600 dark:text-green-400' : 'text-red-600 dark:text-red-400' }}">
                                {{ $trade->profit_loss ? ($trade->profit_loss >= 0 ? '+' : '') . '$' . number_format($trade->profit_loss, 2) : '-' }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full {{ $trade->status === 'OPEN' ? 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200' : ($trade->status === 'CLOSED' ? 'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-200' : 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200') }}">
                                    {{ $trade->status }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">{{ $trade->opened_at->format('M j, Y') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="px-6 py-12 text-center">
                                <div class="w-16 h-16 bg-gray-100 dark:bg-gray-700 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                    </svg>
                                </div>
                                <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-2">No Trades Found</h3>
                                <p class="text-gray-600 dark:text-gray-300">This trading account has no trades yet.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection

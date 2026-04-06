@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-6 mb-6 lg:mb-8">
        <!-- Total Users -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-4 lg:p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Total Users</p>
                    <p class="text-xl lg:text-2xl font-bold text-gray-900 dark:text-white">{{ $stats['total_users'] }}</p>
                    <p class="text-xs lg:text-sm text-green-600 dark:text-green-400 mt-1">
                        {{ $stats['active_users'] }} active
                    </p>
                </div>
                <div class="w-8 h-8 lg:w-12 lg:h-12 bg-blue-100 dark:bg-blue-900 rounded-lg flex items-center justify-center">
                    <svg class="w-4 h-4 lg:w-6 lg:h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Trading Accounts -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Trading Accounts</p>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ $stats['total_trading_accounts'] }}</p>
                    <p class="text-sm text-green-600 dark:text-green-400 mt-1">
                        {{ $stats['active_trading_accounts'] }} active
                    </p>
                </div>
                <div class="w-12 h-12 bg-green-100 dark:bg-green-900 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Total Trades -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Total Trades</p>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ $stats['total_trades'] }}</p>
                    <p class="text-sm text-yellow-600 dark:text-yellow-400 mt-1">
                        {{ $stats['open_trades'] }} open
                    </p>
                </div>
                <div class="w-12 h-12 bg-purple-100 dark:bg-purple-900 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Subscriptions -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-4 lg:p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Subscriptions</p>
                    <p class="text-xl lg:text-2xl font-bold text-gray-900 dark:text-white">{{ $stats['total_subscriptions'] }}</p>
                    <p class="text-xs lg:text-sm text-green-600 dark:text-green-400 mt-1">
                        {{ $stats['active_subscriptions'] }} active
                    </p>
                </div>
                <div class="w-8 h-8 lg:w-12 lg:h-12 bg-orange-100 dark:bg-orange-900 rounded-lg flex items-center justify-center">
                    <svg class="w-4 h-4 lg:w-6 lg:h-6 text-orange-600 dark:text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Financial Overview -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 lg:gap-6 mb-6 lg:mb-8">
        <!-- Total Balance -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-4 lg:p-6">
            <h3 class="text-base lg:text-lg font-semibold text-gray-900 dark:text-white mb-3 lg:mb-4">Financial Overview</h3>
            <div class="space-y-3 lg:space-y-4">
                <div class="flex justify-between items-center">
                    <span class="text-sm text-gray-600 dark:text-gray-400">Total Balance</span>
                    <span class="text-lg lg:text-xl font-bold text-gray-900 dark:text-white">${{ number_format($stats['total_balance'], 2) }}</span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-sm text-gray-600 dark:text-gray-400">Total Profit/Loss</span>
                    <span class="text-lg lg:text-xl font-bold {{ $stats['total_profit_loss'] >= 0 ? 'text-green-600 dark:text-green-400' : 'text-red-600 dark:text-red-400' }}">
                        {{ $stats['total_profit_loss'] >= 0 ? '+' : '' }}${{ number_format($stats['total_profit_loss'], 2) }}
                    </span>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-4 lg:p-6">
            <h3 class="text-base lg:text-lg font-semibold text-gray-900 dark:text-white mb-3 lg:mb-4">Quick Actions</h3>
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 lg:gap-4">
                <a href="{{ route('admin.users.create') }}" class="flex flex-col items-center justify-center p-4 bg-blue-50 dark:bg-blue-900/20 rounded-lg hover:bg-blue-100 dark:hover:bg-blue-900/30 transition-colors">
                    <svg class="w-8 h-8 text-blue-600 dark:text-blue-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                    </svg>
                    <span class="text-sm font-medium text-blue-600 dark:text-blue-400">Add User</span>
                </a>
                
                <a href="{{ route('admin.trades.index') }}" class="flex flex-col items-center justify-center p-3 lg:p-4 bg-purple-50 dark:bg-purple-900/20 rounded-lg hover:bg-purple-100 dark:hover:bg-purple-900/30 transition-colors">
                    <svg class="w-6 h-6 lg:w-8 lg:h-8 text-purple-600 dark:text-purple-400 mb-1 lg:mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                    <span class="text-xs lg:text-sm font-medium text-purple-600 dark:text-purple-400">View Trades</span>
                </a>
                
                <a href="{{ route('admin.subscriptions.index') }}" class="flex flex-col items-center justify-center p-3 lg:p-4 bg-orange-50 dark:bg-orange-900/20 rounded-lg hover:bg-orange-100 dark:hover:bg-orange-900/30 transition-colors">
                    <svg class="w-6 h-6 lg:w-8 lg:h-8 text-orange-600 dark:text-orange-400 mb-1 lg:mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span class="text-xs lg:text-sm font-medium text-orange-600 dark:text-orange-400">Subscriptions</span>
                </a>
                
                <a href="{{ route('admin.trading-accounts.index') }}" class="flex flex-col items-center justify-center p-3 lg:p-4 bg-green-50 dark:bg-green-900/20 rounded-lg hover:bg-green-100 dark:hover:bg-green-900/30 transition-colors">
                    <svg class="w-6 h-6 lg:w-8 lg:h-8 text-green-600 dark:text-green-400 mb-1 lg:mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    <span class="text-xs lg:text-sm font-medium text-green-600 dark:text-green-400">Accounts</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Recent Activity -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 lg:gap-6">
        <!-- Recent Users -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-4 lg:p-6">
            <h3 class="text-base lg:text-lg font-semibold text-gray-900 dark:text-white mb-3 lg:mb-4">Recent Users</h3>
            <div class="space-y-2 lg:space-y-3">
                @forelse ($recentUsers as $user)
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-2 lg:space-x-3">
                            <div class="w-6 h-6 lg:w-8 lg:h-8 bg-gray-200 dark:bg-gray-700 rounded-full flex items-center justify-center">
                                <span class="text-xs lg:text-sm font-medium text-gray-600 dark:text-gray-300">{{ substr($user->name, 0, 1) }}</span>
                            </div>
                            <div>
                                <p class="text-sm lg:text-base font-medium text-gray-900 dark:text-white">{{ $user->name }}</p>
                                <p class="text-xs lg:text-sm text-gray-500 dark:text-gray-400">{{ $user->email }}</p>
                            </div>
                        </div>
                        <span class="text-xs text-gray-500 dark:text-gray-400">{{ $user->created_at->diffForHumans() }}</span>
                    </div>
                @empty
                    <p class="text-sm text-gray-500 dark:text-gray-400">No recent users</p>
                @endforelse
            </div>
        </div>

        <!-- Recent Trades -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-4 lg:p-6">
            <h3 class="text-base lg:text-lg font-semibold text-gray-900 dark:text-white mb-3 lg:mb-4">Recent Trades</h3>
            <div class="space-y-2 lg:space-y-3">
                @forelse ($recentTrades as $trade)
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm lg:text-base font-medium text-gray-900 dark:text-white">{{ $trade->symbol }}</p>
                            <p class="text-xs lg:text-sm text-gray-500 dark:text-gray-400">{{ $trade->user->name }}</p>
                        </div>
                        <div class="text-right">
                            <span class="text-xs px-2 py-1 rounded-full {{ $trade->type === 'BUY' ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200' : 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200' }}">
                                {{ $trade->type }}
                            </span>
                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">{{ $trade->opened_at->diffForHumans() }}</p>
                        </div>
                    </div>
                @empty
                    <p class="text-sm text-gray-500 dark:text-gray-400">No recent trades</p>
                @endforelse
            </div>
        </div>

        <!-- Recent Subscriptions -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-4 lg:p-6">
            <h3 class="text-base lg:text-lg font-semibold text-gray-900 dark:text-white mb-3 lg:mb-4">Recent Subscriptions</h3>
            <div class="space-y-2 lg:space-y-3">
                @forelse ($recentSubscriptions as $subscription)
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm lg:text-base font-medium text-gray-900 dark:text-white">{{ $subscription->user->name }}</p>
                            <p class="text-xs lg:text-sm text-gray-500 dark:text-gray-400">{{ $subscription->plan }}</p>
                        </div>
                        <div class="text-right">
                            <span class="text-xs px-2 py-1 rounded-full {{ $subscription->status === 'ACTIVE' ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200' : 'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-200' }}">
                                {{ $subscription->status }}
                            </span>
                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">{{ $subscription->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                @empty
                    <p class="text-sm text-gray-500 dark:text-gray-400">No recent subscriptions</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection

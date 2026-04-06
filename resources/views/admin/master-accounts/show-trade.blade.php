@php
use App\Models\Trade;
@endphp

@extends('admin.layouts.app')

@section('title', 'Trade Details - ' . $trade->symbol)

@section('content')
    <!-- Page Header -->
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-semibold text-gray-900 dark:text-white">Trade Details</h1>
            <p class="text-gray-600 dark:text-gray-300 mt-1">
                {{ $trade->symbol }} {{ $trade->type }} - {{ $masterAccount->name }}
            </p>
        </div>
        <div class="flex space-x-3">
            <a href="{{ route('admin.master-accounts.trades', $masterAccount) }}" class="bg-gray-100 hover:bg-gray-200 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-300 px-4 py-2 rounded-lg font-medium transition-colors">
                Back to Trades
            </a>
            <a href="{{ route('admin.master-accounts.show', $masterAccount) }}" class="bg-gray-100 hover:bg-gray-200 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-300 px-4 py-2 rounded-lg font-medium transition-colors">
                View Master Account
            </a>
        </div>
    </div>

    <!-- Master Trade Details -->
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6 mb-6">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Master Trade</h2>
            <span class="px-3 py-1 text-sm font-semibold rounded-full {{ $trade->status === 'OPEN' ? 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200' : 'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-200' }}">
                {{ $trade->status }}
            </span>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <div>
                <p class="text-sm text-gray-600 dark:text-gray-400">Symbol</p>
                <p class="text-lg font-medium text-gray-900 dark:text-white">{{ $trade->symbol }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-600 dark:text-gray-400">Type</p>
                <p class="text-lg font-medium {{ $trade->type === 'BUY' ? 'text-green-600 dark:text-green-400' : 'text-red-600 dark:text-red-400' }}">
                    {{ $trade->type }}
                </p>
            </div>
            <div>
                <p class="text-sm text-gray-600 dark:text-gray-400">Lot Size</p>
                <p class="text-lg font-medium text-gray-900 dark:text-white">{{ number_format($trade->lot_size, 2) }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-600 dark:text-gray-400">Entry Price</p>
                <p class="text-lg font-medium text-gray-900 dark:text-white">{{ number_format($trade->entry_price, 5) }}</p>
            </div>
            @if($trade->exit_price)
                <div>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Exit Price</p>
                    <p class="text-lg font-medium text-gray-900 dark:text-white">{{ number_format($trade->exit_price, 5) }}</p>
                </div>
            @endif
            @if($trade->profit_loss)
                <div>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Profit/Loss</p>
                    <p class="text-lg font-medium {{ $trade->profit_loss > 0 ? 'text-green-600 dark:text-green-400' : 'text-red-600 dark:text-red-400' }}">
                        ${{ number_format($trade->profit_loss, 2) }}
                    </p>
                </div>
            @endif
            <div>
                <p class="text-sm text-gray-600 dark:text-gray-400">Opened</p>
                <p class="text-lg font-medium text-gray-900 dark:text-white">{{ $trade->opened_at ? $trade->opened_at->format('M j, Y H:i') : 'N/A' }}</p>
            </div>
            @if($trade->closed_at)
                <div>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Closed</p>
                    <p class="text-lg font-medium text-gray-900 dark:text-white">{{ $trade->closed_at->format('M j, Y H:i') }}</p>
                </div>
            @endif
        </div>
        
        @if($trade->notes)
            <div class="mt-4 pt-4 border-t border-gray-200 dark:border-gray-700">
                <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">Notes</p>
                <p class="text-gray-900 dark:text-white">{{ $trade->notes }}</p>
            </div>
        @endif
        
        @if($trade->status === 'OPEN')
            <div class="mt-4 pt-4 border-t border-gray-200 dark:border-gray-700">
                <form action="{{ route('admin.master-accounts.trades.close', [$masterAccount, $trade]) }}" method="POST" onsubmit="return confirm('Are you sure you want to close this trade?')">
                    @csrf
                    <div class="flex items-end space-x-3">
                        <div class="flex-1">
                            <label for="exit_price" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Exit Price</label>
                            <input type="number" id="exit_price" name="exit_price" step="0.00001" min="0" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent dark:bg-gray-700 dark:text-white" required placeholder="{{ $trade->entry_price }}">
                        </div>
                        <button type="submit" class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg font-medium transition-colors">
                            Close Trade
                        </button>
                    </div>
                </form>
            </div>
        @endif
    </div>

    <!-- Copied Trades -->
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Copied Trades ({{ $copiedTrades->count() }})</h2>
            <div class="text-sm text-gray-600 dark:text-gray-400">
                Total copied: {{ $copiedTrades->count() }} accounts
            </div>
        </div>
        
        @if($copiedTrades->count() > 0)
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gray-50 dark:bg-gray-700">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">User</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Account</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Lot Size</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Entry Price</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">P/L</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach($copiedTrades as $copiedTrade)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900 dark:text-white">
                                        {{ $copiedTrade->tradingAccount->user->name ?? 'Unknown' }}
                                    </div>
                                    <div class="text-sm text-gray-500 dark:text-gray-400">
                                        {{ $copiedTrade->tradingAccount->user->email ?? 'N/A' }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900 dark:text-white">{{ $copiedTrade->tradingAccount->account_number }}</div>
                                    <div class="text-sm text-gray-500 dark:text-gray-400">{{ $copiedTrade->tradingAccount->broker_name }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">
                                    {{ number_format($copiedTrade->lot_size, 2) }}
                                    <div class="text-xs text-gray-500 dark:text-gray-400">
                                        {{ round(($copiedTrade->lot_size / $trade->lot_size) * 100, 1) }}% of master
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">
                                    {{ number_format($copiedTrade->entry_price, 5) }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 py-1 text-xs font-semibold rounded-full {{ $copiedTrade->status === 'OPEN' ? 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200' : 'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-200' }}">
                                        {{ $copiedTrade->status }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    @if($copiedTrade->profit_loss)
                                        <span class="{{ $copiedTrade->profit_loss > 0 ? 'text-green-600 dark:text-green-400' : 'text-red-600 dark:text-red-400' }}">
                                            ${{ number_format($copiedTrade->profit_loss, 2) }}
                                        </span>
                                    @else
                                        <span class="text-gray-500 dark:text-gray-400">-</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="{{ route('admin.trades.show', $copiedTrade) }}" class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300">
                                        View
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <!-- Summary Stats -->
            <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4">
                    <p class="text-sm text-gray-600 dark:text-gray-400">Total Lot Size</p>
                    <p class="text-lg font-medium text-gray-900 dark:text-white">
                        {{ number_format($copiedTrades->sum('lot_size'), 2) }}
                    </p>
                </div>
                <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4">
                    <p class="text-sm text-gray-600 dark:text-gray-400">Average Lot Size</p>
                    <p class="text-lg font-medium text-gray-900 dark:text-white">
                        {{ number_format($copiedTrades->avg('lot_size'), 2) }}
                    </p>
                </div>
                <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4">
                    <p class="text-sm text-gray-600 dark:text-gray-400">Total P/L</p>
                    <p class="text-lg font-medium {{ $copiedTrades->sum('profit_loss') > 0 ? 'text-green-600 dark:text-green-400' : 'text-red-600 dark:text-red-400' }}">
                        ${{ number_format($copiedTrades->sum('profit_loss'), 2) }}
                    </p>
                </div>
            </div>
        @else
            <div class="text-center py-8">
                <div class="w-12 h-12 bg-gray-100 dark:bg-gray-700 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-2">No Copied Trades</h3>
                <p class="text-gray-600 dark:text-gray-300">This master trade hasn't been copied to any user accounts yet.</p>
            </div>
        @endif
    </div>
@endsection

@extends('admin.layouts.app')

@section('title', 'Trade Details')

@section('content')
    <!-- Page Header -->
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-semibold text-gray-900 dark:text-white">Trade Details</h1>
            <p class="text-gray-600 dark:text-gray-300 mt-1">{{ $trade->symbol }} - {{ $trade->type }}</p>
        </div>
        <div class="flex space-x-3">
            <a href="{{ route('admin.trades.edit', $trade) }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-medium transition-colors">
                Edit Trade
            </a>
            <a href="{{ route('admin.trades.index') }}" class="bg-gray-100 hover:bg-gray-200 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-300 px-4 py-2 rounded-lg font-medium transition-colors">
                Back to Trades
            </a>
        </div>
    </div>

    <!-- Trade Information -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
        <!-- Basic Trade Info -->
        <div class="lg:col-span-2 bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
            <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Trade Information</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400 mb-1">Symbol</p>
                    <p class="text-base font-semibold text-gray-900 dark:text-white">{{ $trade->symbol }}</p>
                </div>
                
                <div>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400 mb-1">Type</p>
                    <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full {{ $trade->type === 'BUY' ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200' : 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200' }}">
                        {{ $trade->type }}
                    </span>
                </div>
                
                <div>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400 mb-1">Lot Size</p>
                    <p class="text-base font-semibold text-gray-900 dark:text-white">{{ number_format($trade->lot_size, 2) }}</p>
                </div>
                
                <div>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400 mb-1">Entry Price</p>
                    <p class="text-base font-semibold text-gray-900 dark:text-white">${{ number_format($trade->entry_price, 5) }}</p>
                </div>
                
                <div>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400 mb-1">Exit Price</p>
                    <p class="text-base font-semibold text-gray-900 dark:text-white">{{ $trade->exit_price ? '$' . number_format($trade->exit_price, 5) : '-' }}</p>
                </div>
                
                <div>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400 mb-1">Profit/Loss</p>
                    <p class="text-base font-semibold {{ $trade->profit_loss >= 0 ? 'text-green-600 dark:text-green-400' : 'text-red-600 dark:text-red-400' }}">
                        {{ $trade->profit_loss ? ($trade->profit_loss >= 0 ? '+' : '') . '$' . number_format($trade->profit_loss, 2) : '-' }}
                    </p>
                </div>
                
                <div>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400 mb-1">Status</p>
                    <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full {{ $trade->status === 'OPEN' ? 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200' : ($trade->status === 'CLOSED' ? 'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-200' : 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200') }}">
                        {{ $trade->status }}
                    </span>
                </div>
            </div>
            
            @if($trade->notes)
                <div class="mt-4">
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400 mb-1">Notes</p>
                    <p class="text-base text-gray-900 dark:text-white">{{ $trade->notes }}</p>
                </div>
            @endif
        </div>

        <!-- Trade Timeline -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
            <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Timeline</h2>
            
            <div class="space-y-4">
                <div>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400 mb-1">Opened</p>
                    <p class="text-base text-gray-900 dark:text-white">{{ $trade->opened_at->format('M j, Y H:i') }}</p>
                </div>
                
                @if($trade->closed_at)
                    <div>
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400 mb-1">Closed</p>
                        <p class="text-base text-gray-900 dark:text-white">{{ $trade->closed_at->format('M j, Y H:i') }}</p>
                    </div>
                @endif
                
                @if($trade->opened_at && $trade->closed_at)
                    <div>
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400 mb-1">Duration</p>
                        <p class="text-base text-gray-900 dark:text-white">{{ $trade->opened_at->diffForHumans($trade->closed_at) }}</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- User and Account Information -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
        <!-- User Information -->
        @if($trade->user)
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">User Information</h2>
                
                <div class="flex items-center space-x-4">
                    <div class="w-12 h-12 bg-gray-200 dark:bg-gray-700 rounded-full flex items-center justify-center">
                        <span class="text-sm font-medium text-gray-600 dark:text-gray-300">{{ substr($trade->user->name ?? 'Unknown', 0, 1) }}</span>
                    </div>
                    <div>
                        <p class="text-base font-semibold text-gray-900 dark:text-white">{{ $trade->user->name ?? 'Unknown User' }}</p>
                        <p class="text-sm text-gray-500 dark:text-gray-400">{{ $trade->user->email ?? 'N/A' }}</p>
                    </div>
                </div>
                
                <div class="mt-4 space-y-2">
                    <a href="{{ route('admin.users.show', $trade->user) }}" class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300 font-medium">
                        View User Profile
                    </a>
                </div>
            </div>
        @endif

        <!-- Trading Account Information -->
        @if($trade->tradingAccount)
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Trading Account</h2>
                
                <div class="space-y-3">
                    <div>
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400 mb-1">Account Number</p>
                        <p class="text-base font-semibold text-gray-900 dark:text-white">{{ $trade->tradingAccount->account_number ?? 'N/A' }}</p>
                    </div>
                    
                    <div>
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400 mb-1">Balance</p>
                        <p class="text-base font-semibold text-gray-900 dark:text-white">${{ number_format($trade->tradingAccount->balance ?? 0, 2) }}</p>
                    </div>
                    
                    <div>
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400 mb-1">Account Type</p>
                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full {{ $trade->tradingAccount->account_type === 'LIVE' ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200' : 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200' }}">
                            {{ $trade->tradingAccount->account_type ?? 'N/A' }}
                        </span>
                    </div>
                    
                    <div>
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400 mb-1">Balance</p>
                        <p class="text-base font-semibold text-gray-900 dark:text-white">${{ number_format($trade->tradingAccount->balance, 2) }}</p>
                    </div>
                </div>
                
                <div class="mt-4">
                    <a href="{{ route('admin.trading-accounts.show', $trade->tradingAccount) }}" class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300 font-medium">
                        View Trading Account
                    </a>
                </div>
            </div>
        @endif
    </div>

    <!-- Trade Actions -->
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
        <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Actions</h2>
        
        <div class="flex flex-wrap gap-3">
            @if($trade->status === 'OPEN')
                <form action="{{ route('admin.trades.update', $trade) }}" method="POST" class="inline">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="status" value="CLOSED">
                    <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg font-medium transition-colors" onclick="return confirm('Are you sure you want to close this trade?')">
                        Close Trade
                    </button>
                </form>
            @endif
            
            <form action="{{ route('admin.trades.destroy', $trade) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg font-medium transition-colors" onclick="return confirm('Are you sure you want to delete this trade?')">
                    Delete Trade
                </button>
            </form>
        </div>
    </div>
@endsection

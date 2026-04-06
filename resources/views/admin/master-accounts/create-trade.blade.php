@extends('admin.layouts.app')

@section('title', 'Create Trade for ' . $masterAccount->name)

@section('content')
    <!-- Page Header -->
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-semibold text-gray-900 dark:text-white">Create Trade</h1>
            <p class="text-gray-600 dark:text-gray-300 mt-1">
                Add a new trade for <span class="font-medium">{{ $masterAccount->name }}</span>
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

    <!-- Master Account Info -->
    <div class="bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-4 mb-6">
        <div class="flex items-center">
            <div class="flex-shrink-0">
                <svg class="w-5 h-5 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <div class="ml-3">
                <h3 class="text-sm font-medium text-blue-800 dark:text-blue-200">Master Account Information</h3>
                <div class="mt-1 text-sm text-blue-700 dark:text-blue-300">
                    <p>Balance: ${{ number_format($masterAccount->balance, 2) }} | 
                       Equity: ${{ number_format($masterAccount->equity, 2) }} | 
                       Active Copiers: {{ $masterAccount->getActiveCopiersCount() }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Create Form -->
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
        <form action="{{ route('admin.master-accounts.trades.store', $masterAccount) }}" method="POST">
            @csrf
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Symbol -->
                <div>
                    <label for="symbol" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Symbol</label>
                    <input type="text" id="symbol" name="symbol" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent dark:bg-gray-700 dark:text-white uppercase" required placeholder="EUR/USD">
                    @error('symbol')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Trade Type -->
                <div>
                    <label for="type" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Trade Type</label>
                    <select id="type" name="type" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent dark:bg-gray-700 dark:text-white" required>
                        <option value="BUY">Buy (Long)</option>
                        <option value="SELL">Sell (Short)</option>
                    </select>
                    @error('type')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Lot Size -->
                <div>
                    <label for="lot_size" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Lot Size</label>
                    <input type="number" id="lot_size" name="lot_size" step="0.01" min="0.01" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent dark:bg-gray-700 dark:text-white" required placeholder="1.00">
                    @error('lot_size')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                        This will be proportionally scaled for each copier based on their account balance
                    </p>
                </div>

                <!-- Entry Price -->
                <div>
                    <label for="entry_price" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Entry Price</label>
                    <input type="number" id="entry_price" name="entry_price" step="0.00001" min="0" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent dark:bg-gray-700 dark:text-white" required placeholder="1.12345">
                    @error('entry_price')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Notes -->
                <div class="lg:col-span-2">
                    <label for="notes" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Notes</label>
                    <textarea id="notes" name="notes" rows="3" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent dark:bg-gray-700 dark:text-white" placeholder="Trade notes or strategy description..."></textarea>
                    @error('notes')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Copy Trading Notice -->
            <div class="mt-6 p-4 bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 rounded-lg">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <svg class="w-5 h-5 text-green-600 dark:text-green-400 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-green-800 dark:text-green-200">Copy Trading Enabled</h3>
                        <div class="mt-1 text-sm text-green-700 dark:text-green-300">
                            <p>This trade will be automatically copied to all connected trading accounts with proportional position sizing based on their individual balances.</p>
                            <p class="mt-1">Current active copiers: <strong>{{ $masterAccount->getActiveCopiersCount() }}</strong></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="flex justify-end space-x-3 mt-6">
                <a href="{{ route('admin.master-accounts.trades', $masterAccount) }}" class="px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                    Cancel
                </a>
                <button type="submit" class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg font-medium transition-colors">
                    Create Trade & Copy to Accounts
                </button>
            </div>
        </form>
    </div>
@endsection

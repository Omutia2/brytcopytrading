@extends('admin.layouts.app')

@section('title', 'Edit Trade')

@section('content')
    <!-- Page Header -->
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-semibold text-gray-900 dark:text-white">Edit Trade</h1>
            <p class="text-gray-600 dark:text-gray-300 mt-1">Update trade information</p>
        </div>
        <a href="{{ route('admin.trades.index') }}" class="bg-gray-100 hover:bg-gray-200 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-300 px-4 py-2 rounded-lg font-medium transition-colors">
            Back to Trades
        </a>
    </div>

    <!-- Edit Form -->
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
        <form action="{{ route('admin.trades.update', $trade) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- User Selection -->
                <div>
                    <label for="user_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">User</label>
                    <select id="user_id" name="user_id" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent dark:bg-gray-700 dark:text-white" required>
                        <option value="">Select a user</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}" {{ $trade->user_id == $user->id ? 'selected' : '' }}>
                                {{ $user->name }} ({{ $user->email }})
                            </option>
                        @endforeach
                    </select>
                    @error('user_id')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Trading Account Selection -->
                <div>
                    <label for="trading_account_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Trading Account</label>
                    <select id="trading_account_id" name="trading_account_id" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent dark:bg-gray-700 dark:text-white" required>
                        <option value="">Select an account</option>
                        @foreach($accounts as $account)
                            <option value="{{ $account->id }}" {{ $trade->trading_account_id == $account->id ? 'selected' : '' }}>
                                {{ $account->account_number }} ({{ $account->broker_name }})
                            </option>
                        @endforeach
                    </select>
                    @error('trading_account_id')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Symbol -->
                <div>
                    <label for="symbol" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Symbol</label>
                    <input type="text" id="symbol" name="symbol" value="{{ $trade->symbol }}" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent dark:bg-gray-700 dark:text-white uppercase" required>
                    @error('symbol')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Trade Type -->
                <div>
                    <label for="type" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Trade Type</label>
                    <select id="type" name="type" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent dark:bg-gray-700 dark:text-white" required>
                        <option value="BUY" {{ $trade->type === 'BUY' ? 'selected' : '' }}>Buy</option>
                        <option value="SELL" {{ $trade->type === 'SELL' ? 'selected' : '' }}>Sell</option>
                    </select>
                    @error('type')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Lot Size -->
                <div>
                    <label for="lot_size" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Lot Size</label>
                    <input type="number" id="lot_size" name="lot_size" value="{{ $trade->lot_size }}" step="0.01" min="0.01" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent dark:bg-gray-700 dark:text-white" required>
                    @error('lot_size')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Entry Price -->
                <div>
                    <label for="entry_price" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Entry Price</label>
                    <input type="number" id="entry_price" name="entry_price" value="{{ $trade->entry_price }}" step="0.00001" min="0" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent dark:bg-gray-700 dark:text-white" required>
                    @error('entry_price')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Exit Price -->
                <div>
                    <label for="exit_price" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Exit Price</label>
                    <input type="number" id="exit_price" name="exit_price" value="{{ $trade->exit_price }}" step="0.00001" min="0" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent dark:bg-gray-700 dark:text-white">
                    @error('exit_price')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Profit/Loss -->
                <div>
                    <label for="profit_loss" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Profit/Loss</label>
                    <input type="number" id="profit_loss" name="profit_loss" value="{{ $trade->profit_loss }}" step="0.01" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent dark:bg-gray-700 dark:text-white">
                    @error('profit_loss')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Status -->
                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Status</label>
                    <select id="status" name="status" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent dark:bg-gray-700 dark:text-white" required>
                        <option value="OPEN" {{ $trade->status === 'OPEN' ? 'selected' : '' }}>Open</option>
                        <option value="CLOSED" {{ $trade->status === 'CLOSED' ? 'selected' : '' }}>Closed</option>
                        <option value="PENDING" {{ $trade->status === 'PENDING' ? 'selected' : '' }}>Pending</option>
                    </select>
                    @error('status')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Notes -->
                <div class="lg:col-span-2">
                    <label for="notes" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Notes</label>
                    <textarea id="notes" name="notes" rows="4" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent dark:bg-gray-700 dark:text-white">{{ $trade->notes }}</textarea>
                    @error('notes')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Form Actions -->
            <div class="flex justify-end space-x-3 mt-6">
                <a href="{{ route('admin.trades.index') }}" class="px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                    Cancel
                </a>
                <button type="submit" class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg font-medium transition-colors">
                    Update Trade
                </button>
            </div>
        </form>
    </div>
@endsection

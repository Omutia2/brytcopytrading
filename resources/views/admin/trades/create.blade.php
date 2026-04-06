@extends('admin.layouts.app')

@section('title', 'Create Trade')

@section('content')
    <!-- Page Header -->
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-semibold text-gray-900 dark:text-white">Create Trade</h1>
            <p class="text-gray-600 dark:text-gray-300 mt-1">Add a new trade</p>
        </div>
        <a href="{{ route('admin.trades.index') }}" class="bg-gray-100 hover:bg-gray-200 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-300 px-4 py-2 rounded-lg font-medium transition-colors">
            Back to Trades
        </a>
    </div>

    <!-- Create Form -->
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
        <form action="{{ route('admin.trades.store') }}" method="POST">
            @csrf
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Trade Type Selection -->
                <div>
                    <label for="trade_type" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Trade Type</label>
                    <select id="trade_type" name="trade_type" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent dark:bg-gray-700 dark:text-white" required onchange="toggleTradeFields(this.value)">
                        <option value="">Select trade type</option>
                        <option value="user">User Trade</option>
                        <option value="master">Master Account Trade</option>
                    </select>
                    @error('trade_type')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- User Selection (for user trades) -->
                <div id="user-fields">
                    <label for="user_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">User</label>
                    <select id="user_id" name="user_id" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent dark:bg-gray-700 dark:text-white">
                        <option value="">Select a user</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                        @endforeach
                    </select>
                    @error('user_id')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Master Account Selection (for master trades) -->
                <div id="master-fields" style="display: none;">
                    <label for="master_account_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Master Account</label>
                    <select id="master_account_id" name="master_account_id" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent dark:bg-gray-700 dark:text-white">
                        <option value="">Select a master account</option>
                        @foreach($masterAccounts as $masterAccount)
                            <option value="{{ $masterAccount->id }}">{{ $masterAccount->name }} - {{ $masterAccount->broker_name }}</option>
                        @endforeach
                    </select>
                    @error('master_account_id')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Trading Account Selection (for user trades) -->
                <div id="user-fields-2">
                    <label for="trading_account_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Trading Account</label>
                    <select id="trading_account_id" name="trading_account_id" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent dark:bg-gray-700 dark:text-white">
                        <option value="">Select an account</option>
                        @foreach($accounts as $account)
                            <option value="{{ $account->id }}">{{ $account->account_number }} ({{ $account->broker_name }})</option>
                        @endforeach
                    </select>
                    @error('trading_account_id')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Symbol -->
                <div>
                    <label for="symbol" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Symbol</label>
                    <input type="text" id="symbol" name="symbol" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent dark:bg-gray-700 dark:text-white uppercase" required>
                    @error('symbol')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Trade Type -->
                <div>
                    <label for="type" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Trade Type</label>
                    <select id="type" name="type" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent dark:bg-gray-700 dark:text-white" required>
                        <option value="BUY">Buy</option>
                        <option value="SELL">Sell</option>
                    </select>
                    @error('type')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Lot Size -->
                <div>
                    <label for="lot_size" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Lot Size</label>
                    <input type="number" id="lot_size" name="lot_size" step="0.01" min="0.01" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent dark:bg-gray-700 dark:text-white" required>
                    @error('lot_size')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Entry Price -->
                <div>
                    <label for="entry_price" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Entry Price</label>
                    <input type="number" id="entry_price" name="entry_price" step="0.00001" min="0" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent dark:bg-gray-700 dark:text-white" required>
                    @error('entry_price')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Exit Price -->
                <div>
                    <label for="exit_price" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Exit Price</label>
                    <input type="number" id="exit_price" name="exit_price" step="0.00001" min="0" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent dark:bg-gray-700 dark:text-white">
                    @error('exit_price')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Profit/Loss -->
                <div>
                    <label for="profit_loss" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Profit/Loss</label>
                    <input type="number" id="profit_loss" name="profit_loss" step="0.01" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent dark:bg-gray-700 dark:text-white">
                    @error('profit_loss')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Status -->
                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Status</label>
                    <select id="status" name="status" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent dark:bg-gray-700 dark:text-white" required>
                        <option value="OPEN">Open</option>
                        <option value="CLOSED">Closed</option>
                        <option value="PENDING">Pending</option>
                    </select>
                    @error('status')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Notes -->
                <div class="lg:col-span-2">
                    <label for="notes" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Notes</label>
                    <textarea id="notes" name="notes" rows="4" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent dark:bg-gray-700 dark:text-white"></textarea>
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
                    Create Trade
                </button>
            </div>
        </form>
    </div>

    <script>
        function toggleTradeFields(tradeType) {
            const userFields = document.getElementById('user-fields');
            const userFields2 = document.getElementById('user-fields-2');
            const masterFields = document.getElementById('master-fields');
            
            if (tradeType === 'user') {
                userFields.style.display = 'block';
                userFields2.style.display = 'block';
                masterFields.style.display = 'none';
                
                // Make user fields required
                document.getElementById('user_id').required = true;
                document.getElementById('trading_account_id').required = true;
                document.getElementById('master_account_id').required = false;
            } else if (tradeType === 'master') {
                userFields.style.display = 'none';
                userFields2.style.display = 'none';
                masterFields.style.display = 'block';
                
                // Make master fields required
                document.getElementById('user_id').required = false;
                document.getElementById('trading_account_id').required = false;
                document.getElementById('master_account_id').required = true;
            } else {
                userFields.style.display = 'none';
                userFields2.style.display = 'none';
                masterFields.style.display = 'none';
            }
        }

        // Initialize based on current selection if available
        document.addEventListener('DOMContentLoaded', function() {
            const tradeTypeSelect = document.getElementById('trade_type');
            if (tradeTypeSelect && tradeTypeSelect.value) {
                toggleTradeFields(tradeTypeSelect.value);
            }
        });
    </script>
@endsection

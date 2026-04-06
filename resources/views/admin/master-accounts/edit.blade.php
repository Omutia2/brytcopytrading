@extends('admin.layouts.app')

@section('title', 'Edit Master Account')

@section('content')
    <!-- Page Header -->
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-semibold text-gray-900 dark:text-white">Edit Master Account</h1>
            <p class="text-gray-600 dark:text-gray-300 mt-1">Update master account information</p>
        </div>
        <a href="{{ route('admin.master-accounts.index') }}" class="bg-gray-100 hover:bg-gray-200 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-300 px-4 py-2 rounded-lg font-medium transition-colors">
            Back to Master Accounts
        </a>
    </div>

    <!-- Edit Form -->
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
        <form action="{{ route('admin.master-accounts.update', $masterAccount) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Account Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Account Name</label>
                    <input type="text" id="name" name="name" value="{{ $masterAccount->name }}" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent dark:bg-gray-700 dark:text-white" required>
                    @error('name')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Broker Name -->
                <div>
                    <label for="broker_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Broker Name</label>
                    <input type="text" id="broker_name" name="broker_name" value="{{ $masterAccount->broker_name }}" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent dark:bg-gray-700 dark:text-white" required>
                    @error('broker_name')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Account Number -->
                <div>
                    <label for="account_number" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Account Number</label>
                    <input type="text" id="account_number" name="account_number" value="{{ $masterAccount->account_number }}" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent dark:bg-gray-700 dark:text-white" required>
                    @error('account_number')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Server -->
                <div>
                    <label for="server" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Server</label>
                    <input type="text" id="server" name="server" value="{{ $masterAccount->server }}" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent dark:bg-gray-700 dark:text-white" required>
                    @error('server')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Balance -->
                <div>
                    <label for="balance" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Balance</label>
                    <input type="number" id="balance" name="balance" value="{{ $masterAccount->balance }}" step="0.01" min="0" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent dark:bg-gray-700 dark:text-white">
                    @error('balance')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Equity -->
                <div>
                    <label for="equity" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Equity</label>
                    <input type="number" id="equity" name="equity" value="{{ $masterAccount->equity }}" step="0.01" min="0" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent dark:bg-gray-700 dark:text-white">
                    @error('equity')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Status -->
                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Status</label>
                    <select id="status" name="status" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent dark:bg-gray-700 dark:text-white" required>
                        <option value="ACTIVE" {{ $masterAccount->status === 'ACTIVE' ? 'selected' : '' }}>Active</option>
                        <option value="INACTIVE" {{ $masterAccount->status === 'INACTIVE' ? 'selected' : '' }}>Inactive</option>
                        <option value="SUSPENDED" {{ $masterAccount->status === 'SUSPENDED' ? 'selected' : '' }}>Suspended</option>
                    </select>
                    @error('status')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Visibility -->
                <div>
                    <label for="is_public" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Visibility</label>
                    <select id="is_public" name="is_public" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent dark:bg-gray-700 dark:text-white" required>
                        <option value="1" {{ $masterAccount->is_public ? 'selected' : '' }}>Public</option>
                        <option value="0" {{ !$masterAccount->is_public ? 'selected' : '' }}>Private</option>
                    </select>
                    @error('is_public')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Minimum Copy Amount -->
                <div>
                    <label for="min_copy_amount" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Minimum Copy Amount</label>
                    <input type="number" id="min_copy_amount" name="min_copy_amount" value="{{ $masterAccount->min_copy_amount }}" step="0.01" min="0" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent dark:bg-gray-700 dark:text-white" required>
                    @error('min_copy_amount')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Maximum Copy Amount -->
                <div>
                    <label for="max_copy_amount" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Maximum Copy Amount</label>
                    <input type="number" id="max_copy_amount" name="max_copy_amount" value="{{ $masterAccount->max_copy_amount }}" step="0.01" min="0" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent dark:bg-gray-700 dark:text-white" required>
                    @error('max_copy_amount')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Copy Fee Percentage -->
                <div>
                    <label for="copy_fee_percentage" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Copy Fee Percentage</label>
                    <input type="number" id="copy_fee_percentage" name="copy_fee_percentage" value="{{ $masterAccount->copy_fee_percentage }}" step="0.01" min="0" max="100" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent dark:bg-gray-700 dark:text-white" required>
                    @error('copy_fee_percentage')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description -->
                <div class="lg:col-span-2">
                    <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Description</label>
                    <textarea id="description" name="description" rows="4" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent dark:bg-gray-700 dark:text-white">{{ $masterAccount->description }}</textarea>
                    @error('description')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Performance Stats -->
            <div class="mt-8 mb-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Performance Statistics</h3>
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <div>
                        <label for="total_trades" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Total Trades</label>
                        <input type="number" id="total_trades" name="total_trades" value="{{ $masterAccount->total_trades }}" min="0" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent dark:bg-gray-700 dark:text-white">
                        @error('total_trades')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="win_rate" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Win Rate (%)</label>
                        <input type="number" id="win_rate" name="win_rate" value="{{ $masterAccount->win_rate }}" step="0.1" min="0" max="100" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent dark:bg-gray-700 dark:text-white">
                        @error('win_rate')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="total_profit" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Total Profit</label>
                        <input type="number" id="total_profit" name="total_profit" value="{{ $masterAccount->total_profit }}" step="0.01" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent dark:bg-gray-700 dark:text-white">
                        @error('total_profit')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="flex justify-end space-x-3">
                <a href="{{ route('admin.master-accounts.index') }}" class="px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                    Cancel
                </a>
                <button type="submit" class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg font-medium transition-colors">
                    Update Master Account
                </button>
            </div>
        </form>
    </div>
@endsection

@extends('admin.layouts.app')

@section('title', 'Edit Trading Account')

@section('content')
    <!-- Page Header -->
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-semibold text-gray-900 dark:text-white">Edit Trading Account</h1>
            <p class="text-gray-600 dark:text-gray-300 mt-1">Update trading account information</p>
        </div>
        <a href="{{ route('admin.trading-accounts.index') }}" class="bg-gray-100 hover:bg-gray-200 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-300 px-4 py-2 rounded-lg font-medium transition-colors">
            Back to Accounts
        </a>
    </div>

    <!-- Edit Form -->
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
        <form action="{{ route('admin.trading-accounts.update', $tradingAccount) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- User Selection -->
                <div class="lg:col-span-2">
                    <label for="user_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">User</label>
                    <select id="user_id" name="user_id" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent dark:bg-gray-700 dark:text-white" required>
                        <option value="">Select a user</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}" {{ $tradingAccount->user_id == $user->id ? 'selected' : '' }}>
                                {{ $user->name }} ({{ $user->email }})
                            </option>
                        @endforeach
                    </select>
                    @error('user_id')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Broker Name -->
                <div>
                    <label for="broker_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Broker Name</label>
                    <input type="text" id="broker_name" name="broker_name" value="{{ $tradingAccount->broker_name }}" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent dark:bg-gray-700 dark:text-white" required>
                    @error('broker_name')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Account Number -->
                <div>
                    <label for="account_number" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Account Number</label>
                    <input type="text" id="account_number" name="account_number" value="{{ $tradingAccount->account_number }}" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent dark:bg-gray-700 dark:text-white" required>
                    @error('account_number')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Server -->
                <div>
                    <label for="server" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Server</label>
                    <input type="text" id="server" name="server" value="{{ $tradingAccount->server }}" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent dark:bg-gray-700 dark:text-white" required>
                    @error('server')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Account Type -->
                <div>
                    <label for="account_type" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Account Type</label>
                    <select id="account_type" name="account_type" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent dark:bg-gray-700 dark:text-white" required>
                        <option value="LIVE" {{ $tradingAccount->account_type === 'LIVE' ? 'selected' : '' }}>Live</option>
                        <option value="DEMO" {{ $tradingAccount->account_type === 'DEMO' ? 'selected' : '' }}>Demo</option>
                    </select>
                    @error('account_type')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Balance -->
                <div>
                    <label for="balance" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Balance</label>
                    <input type="number" id="balance" name="balance" value="{{ $tradingAccount->balance }}" step="0.01" min="0" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent dark:bg-gray-700 dark:text-white">
                    @error('balance')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Equity -->
                <div>
                    <label for="equity" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Equity</label>
                    <input type="number" id="equity" name="equity" value="{{ $tradingAccount->equity }}" step="0.01" min="0" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent dark:bg-gray-700 dark:text-white">
                    @error('equity')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Status -->
                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Status</label>
                    <select id="status" name="status" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent dark:bg-gray-700 dark:text-white">
                        <option value="">Select status</option>
                        <option value="ACTIVE" {{ $tradingAccount->status === 'ACTIVE' ? 'selected' : '' }}>Active</option>
                        <option value="INACTIVE" {{ $tradingAccount->status === 'INACTIVE' ? 'selected' : '' }}>Inactive</option>
                        <option value="SUSPENDED" {{ $tradingAccount->status === 'SUSPENDED' ? 'selected' : '' }}>Suspended</option>
                    </select>
                    @error('status')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Master Account -->
                <div>
                    <label for="master_account_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Master Account</label>
                    <select id="master_account_id" name="master_account_id" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent dark:bg-gray-700 dark:text-white">
                        <option value="">No master account</option>
                        @foreach(\App\Models\MasterAccount::where('is_public', true)->where('status', 'ACTIVE')->get() as $masterAccount)
                            <option value="{{ $masterAccount->id }}" {{ $tradingAccount->master_account_id == $masterAccount->id ? 'selected' : '' }}>
                                {{ $masterAccount->name }} ({{ $masterAccount->broker_name }})
                            </option>
                        @endforeach
                    </select>
                    @error('master_account_id')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Copy Trading Enabled -->
                <div>
                    <label class="flex items-center">
                        <input type="checkbox" name="is_copy_trading_enabled" value="1" {{ $tradingAccount->is_copy_trading_enabled ? 'checked' : '' }} class="rounded border-gray-300 text-red-600 focus:ring-red-500 dark:bg-gray-700 dark:border-gray-600">
                        <span class="ml-2 text-sm text-gray-700 dark:text-gray-300">Enable Copy Trading</span>
                    </label>
                    @error('is_copy_trading_enabled')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Form Actions -->
            <div class="flex justify-end space-x-3 mt-6">
                <a href="{{ route('admin.trading-accounts.index') }}" class="px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                    Cancel
                </a>
                <button type="submit" class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg font-medium transition-colors">
                    Update Account
                </button>
            </div>
        </form>
    </div>
@endsection

@extends('admin.layouts.app')

@section('title', 'Create Master Account')

@section('content')
    <!-- Page Header -->
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-semibold text-gray-900 dark:text-white">Create Master Account</h1>
            <p class="text-gray-600 dark:text-gray-300 mt-1">Add a new master trading account</p>
        </div>
        <a href="{{ route('admin.master-accounts.index') }}" class="bg-gray-100 hover:bg-gray-200 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-300 px-4 py-2 rounded-lg font-medium transition-colors">
            Back to Master Accounts
        </a>
    </div>

    <!-- Create Master Account Form -->
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
        <form action="{{ route('admin.master-accounts.store') }}" method="POST" class="space-y-6">
            @csrf
            
            @if ($errors->any())
                <div class="bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-lg dark:bg-red-900/20 dark:border-red-800 dark:text-red-200">
                    <div class="flex items-center mb-2">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                        </svg>
                        <strong>Please fix the following errors:</strong>
                    </div>
                    <ul class="list-disc list-inside space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Account Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required
                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:outline-none focus:ring-red-500 focus:border-red-500 dark:bg-gray-700 dark:text-white"
                        placeholder="Gold Strategy Master">
                </div>

                <div>
                    <label for="broker_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Broker Name</label>
                    <input type="text" id="broker_name" name="broker_name" value="{{ old('broker_name') }}" required
                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:outline-none focus:ring-red-500 focus:border-red-500 dark:bg-gray-700 dark:text-white"
                        placeholder="XM, IC Markets, etc.">
                </div>

                <div>
                    <label for="account_number" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Account Number</label>
                    <input type="text" id="account_number" name="account_number" value="{{ old('account_number') }}" required
                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:outline-none focus:ring-red-500 focus:border-red-500 dark:bg-gray-700 dark:text-white"
                        placeholder="123456789">
                </div>

                <div>
                    <label for="server" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Server</label>
                    <input type="text" id="server" name="server" value="{{ old('server') }}" required
                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:outline-none focus:ring-red-500 focus:border-red-500 dark:bg-gray-700 dark:text-white"
                        placeholder="XMGlobal-Server 1">
                </div>

                <div>
                    <label for="balance" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Balance ($)</label>
                    <input type="number" id="balance" name="balance" value="{{ old('balance', 0) }}" step="0.01" min="0" required
                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:outline-none focus:ring-red-500 focus:border-red-500 dark:bg-gray-700 dark:text-white">
                </div>

                <div>
                    <label for="equity" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Equity ($)</label>
                    <input type="number" id="equity" name="equity" value="{{ old('equity', 0) }}" step="0.01" min="0" required
                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:outline-none focus:ring-red-500 focus:border-red-500 dark:bg-gray-700 dark:text-white">
                </div>

                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Status</label>
                    <select id="status" name="status" required
                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:outline-none focus:ring-red-500 focus:border-red-500 dark:bg-gray-700 dark:text-white">
                        <option value="ACTIVE" {{ old('status') == 'ACTIVE' ? 'selected' : '' }}>Active</option>
                        <option value="INACTIVE" {{ old('status') == 'INACTIVE' ? 'selected' : '' }}>Inactive</option>
                        <option value="SUSPENDED" {{ old('status') == 'SUSPENDED' ? 'selected' : '' }}>Suspended</option>
                    </select>
                </div>

                <div>
                    <label for="copy_fee_percentage" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Copy Fee (%)</label>
                    <input type="number" id="copy_fee_percentage" name="copy_fee_percentage" value="{{ old('copy_fee_percentage', 5.00) }}" step="0.01" min="0" max="100" required
                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:outline-none focus:ring-red-500 focus:border-red-500 dark:bg-gray-700 dark:text-white">
                </div>

                <div>
                    <label for="min_copy_amount" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Min Copy Amount ($)</label>
                    <input type="number" id="min_copy_amount" name="min_copy_amount" value="{{ old('min_copy_amount', 100) }}" step="0.01" min="0" required
                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:outline-none focus:ring-red-500 focus:border-red-500 dark:bg-gray-700 dark:text-white">
                </div>

                <div>
                    <label for="max_copy_amount" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Max Copy Amount ($)</label>
                    <input type="number" id="max_copy_amount" name="max_copy_amount" value="{{ old('max_copy_amount', 10000) }}" step="0.01" min="0" required
                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:outline-none focus:ring-red-500 focus:border-red-500 dark:bg-gray-700 dark:text-white">
                </div>

                <div class="flex items-center">
                    <input type="checkbox" id="is_public" name="is_public" value="1" {{ old('is_public', true) ? 'checked' : '' }}
                        class="h-4 w-4 text-red-600 focus:ring-red-500 border-gray-300 dark:border-gray-600 rounded">
                    <label for="is_public" class="ml-2 block text-sm text-gray-700 dark:text-gray-300">
                        Public (visible to users)
                    </label>
                </div>
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Description</label>
                <textarea id="description" name="description" rows="4"
                    class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:outline-none focus:ring-red-500 focus:border-red-500 dark:bg-gray-700 dark:text-white"
                    placeholder="Describe the trading strategy, performance, etc.">{{ old('description') }}</textarea>
            </div>

            <div class="flex justify-end space-x-4">
                <a href="{{ route('admin.master-accounts.index') }}" class="bg-gray-100 hover:bg-gray-200 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-300 px-4 py-2 rounded-lg font-medium transition-colors">
                    Cancel
                </a>
                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg font-medium transition-colors">
                    Create Master Account
                </button>
            </div>
        </form>
    </div>
@endsection

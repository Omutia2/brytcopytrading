@extends('layouts.app')

@section('content')
        <!-- Account Content -->
        <main class="flex-1 p-6">
            <div class="max-w-12xl mx-auto">
                <!-- Page Header -->
                <div class="flex justify-between items-center mb-8">
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900 dark:text-white">My Account</h1>
                        <p class="text-gray-600 dark:text-gray-300 mt-2">Manage your trading accounts</p>
                    </div>
                    <button onclick="document.getElementById('addAccountModal').classList.remove('hidden')" class="bg-primary-600 hover:bg-primary-700 text-white px-4 py-2 rounded-lg font-medium transition-colors">
                        Add Account
                    </button>
                </div>

                <!-- Success and Error Messages -->
                @if (Session::has('success'))
                    <div class="mb-6 bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg dark:bg-green-900/20 dark:border-green-800 dark:text-green-200">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            {{ Session::get('success') }}
                        </div>
                    </div>
                @endif

                @if (Session::has('error'))
                    <div class="mb-6 bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-lg dark:bg-red-900/20 dark:border-red-800 dark:text-red-200">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                            </svg>
                            {{ Session::get('error') }}
                        </div>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="mb-6 bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-lg dark:bg-red-900/20 dark:border-red-800 dark:text-red-200">
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

                <!-- Trading Accounts Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @forelse ($tradingAccounts as $account)
                        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                            <div class="flex justify-between items-start mb-4">
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">{{ $account->broker_name }}</h3>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">{{ $account->account_type }}</p>
                                </div>
                                <span class="px-2 py-1 text-xs font-semibold rounded-full {{ $account->status === 'ACTIVE' ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200' : 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200' }}">
                                    {{ $account->status }}
                                </span>
                            </div>
                            
                            <div class="space-y-3">
                                <div class="flex justify-between">
                                    <span class="text-sm text-gray-600 dark:text-gray-400">Account:</span>
                                    <span class="text-sm font-medium text-gray-900 dark:text-white">{{ $account->account_number }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-sm text-gray-600 dark:text-gray-400">Server:</span>
                                    <span class="text-sm font-medium text-gray-900 dark:text-white">{{ $account->server }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-sm text-gray-600 dark:text-gray-400">Balance:</span>
                                    <span class="text-sm font-medium text-gray-900 dark:text-white">${{ number_format($account->balance, 2) }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-sm text-gray-600 dark:text-gray-400">Equity:</span>
                                    <span class="text-sm font-medium text-gray-900 dark:text-white">${{ number_format($account->equity, 2) }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-sm text-gray-600 dark:text-gray-400">Copy Trading:</span>
                                    <span class="px-2 py-1 text-xs font-semibold rounded-full {{ $account->is_copy_trading_enabled ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200' : 'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-200' }}">
                                    {{ $account->is_copy_trading_enabled ? 'Enabled' : 'Disabled' }}
                                </span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-sm text-gray-600 dark:text-gray-400">Risk Level:</span>
                                    <span class="text-sm font-medium text-gray-900 dark:text-white">{{ number_format($account->risk_percentage, 1) }}%</span>
                                </div>
                                @if($account->master_account_id && $account->masterAccount)
                                    <div class="flex justify-between">
                                        <span class="text-sm text-gray-600 dark:text-gray-400">Master Account:</span>
                                        <span class="text-sm font-medium text-gray-900 dark:text-white">{{ $account->masterAccount->name }}</span>
                                    </div>
                                @endif
                            </div>
                            
                            <div class="mt-4 pt-4 border-t border-gray-200 dark:border-gray-700 flex space-x-2">
                                <button onclick="editAccount({{ $account->id }})" class="flex-1 bg-gray-100 hover:bg-gray-200 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-300 px-3 py-2 rounded-lg text-sm font-medium transition-colors">
                                    Edit
                                </button>
                                <form action="{{ route('account.destroy', $account->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this account?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="flex-1 bg-red-100 hover:bg-red-200 dark:bg-red-900 dark:hover:bg-red-800 text-red-700 dark:text-red-300 px-3 py-2 rounded-lg text-sm font-medium transition-colors">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full text-center py-12">
                            <div class="w-16 h-16 bg-gray-100 dark:bg-gray-700 rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                            </div>
                            <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-2">No Trading Accounts</h3>
                            <p class="text-gray-600 dark:text-gray-300 mb-4">Add your first trading account to get started with copy trading.</p>
                            <button onclick="document.getElementById('addAccountModal').classList.remove('hidden')" class="bg-primary-600 hover:bg-primary-700 text-white px-4 py-2 rounded-lg font-medium transition-colors">
                                Add Your First Account
                            </button>
                        </div>
                    @endforelse
                </div>
            </div>
        </main>

<!-- Add Account Modal -->
<div id="addAccountModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white dark:bg-gray-800">
        <div class="mt-3">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-medium text-gray-900 dark:text-white">Add Trading Account</h3>
                <button onclick="document.getElementById('addAccountModal').classList.add('hidden')" class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            
            <form action="{{ route('account.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label for="broker_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Broker Name</label>
                    <input type="text" id="broker_name" name="broker_name" required class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:text-white">
                </div>
                
                <div>
                    <label for="account_number" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Account Number</label>
                    <input type="text" id="account_number" name="account_number" required class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:text-white">
                </div>
                
                <div>
                    <label for="server" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Server</label>
                    <input type="text" id="server" name="server_name" required class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:text-white">
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Password</label>
                    <input type="password" id="password" name="password" required class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:text-white">
                </div>
                
                <div>
                    <label for="account_type" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Account Type</label>
                    <select id="account_type" name="account_type" required class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:text-white">
                        <option value="DEMO">Demo</option>
                        <option value="LIVE">Live</option>
                    </select>
                </div>
                
                <div>
                    <label for="risk_percentage" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Risk Percentage (%)</label>
                    <input type="number" id="risk_percentage" name="risk_percentage" min="1" max="200" step="0.1" value="100" required class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:text-white">
                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Percentage of your account balance to risk per trade (100% = full balance, 50% = half balance, 25% = quarter balance)</p>
                </div>
                
                <div>
                    <label for="balance" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Account Balance</label>
                    <input type="number" id="balance" name="balance" required class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:text-white">
                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Initial balance for risk calculations</p>
                </div>

                <div>
                    <label for="equity" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Equity</label>
                    <input type="number" id="equity" name="equity" required class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:text-white">
                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Current equity for risk calculations</p>
                </div>
                
                <div>
                    <label for="master_account_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Master Account (Optional)</label>
                    <select id="master_account_id" name="master_account_id" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:text-white">
                        <option value="">Select a master account to copy trades from</option>
                        @foreach($masterAccounts as $masterAccount)
                            <option value="{{ $masterAccount->id }}" {{ old('master_account_id') == $masterAccount->id ? 'selected' : '' }}>
                                {{ $masterAccount->name }} - {{ $masterAccount->broker_name }} ({{ number_format($masterAccount->copy_fee_percentage, 2) }}% fee)
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <div class="flex space-x-3 pt-4">
                    <button type="button" onclick="document.getElementById('addAccountModal').classList.add('hidden')" class="flex-1 bg-gray-200 hover:bg-gray-300 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-800 dark:text-gray-200 px-4 py-2 rounded-lg font-medium transition-colors">
                        Cancel
                    </button>
                    <button type="submit" class="flex-1 bg-primary-600 hover:bg-primary-700 text-white px-4 py-2 rounded-lg font-medium transition-colors">
                        Add Account
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Account Modal -->
<div id="editAccountModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white dark:bg-gray-800">
        <div class="mt-3">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-medium text-gray-900 dark:text-white">Edit Trading Account</h3>
                <button onclick="document.getElementById('editAccountModal').classList.add('hidden')" class="text-gray-400 hover:text-gray-600 dark:text-gray-400 dark:hover:text-gray-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            
            <form id="editAccountForm" action="#" method="POST" class="space-y-4">
                @csrf
                @method('PUT')
                <input type="hidden" id="edit_account_id" name="account_id">
                
                <div>
                    <label for="edit_broker_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Broker Name</label>
                    <input type="text" id="edit_broker_name" name="broker_name" required class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:text-white">
                </div>
                
                <div>
                    <label for="edit_account_number" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Account Number</label>
                    <input type="text" id="edit_account_number" name="account_number" required class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:text-white">
                </div>
                
                <div>
                    <label for="edit_server" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Server</label>
                    <input type="text" id="edit_server" name="server_name" required class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:text-white">
                </div>

                <div>
                    <label for="edit_password" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Password</label>
                    <input type="password" id="edit_password" name="password" required class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:text-white">
                </div>
                
                <div>
                    <label for="edit_account_type" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Account Type</label>
                    <select id="edit_account_type" name="account_type" required class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:text-white">
                        <option value="DEMO">Demo</option>
                        <option value="LIVE">Live</option>
                    </select>
                </div>
                
                <div>
                    <label for="edit_risk_percentage" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Risk Percentage (%)</label>
                    <input type="number" id="edit_risk_percentage" name="risk_percentage" min="1" max="200" step="0.1" required class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:text-white">
                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Percentage of your account balance to risk per trade (e.g., 100% = full balance, 50% = half balance)</p>
                </div>
                
                <div>
                    <label for="edit_balance" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Account Balance</label>
                    <input type="number" id="edit_balance" name="balance" min="0" step="0.01" required class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:text-white">
                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Your available balance for copy trading calculations</p>
                </div>
                
                <div>
                    <label for="edit_equity" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Account Equity (Optional)</label>
                    <input type="number" id="edit_equity" name="equity" min="0" step="0.01" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:text-white">
                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Your available equity for margin and risk calculations (leave blank if same as balance)</p>
                </div>
                
                <div>
                    <label for="edit_master_account_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Master Account (Optional)</label>
                    <select id="edit_master_account_id" name="master_account_id" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:text-white">
                        <option value="">Select a master account to copy trades from</option>
                        @foreach($masterAccounts as $masterAccount)
                            <option value="{{ $masterAccount->id }}">
                                {{ $masterAccount->name }} - {{ $masterAccount->broker_name }} ({{ number_format($masterAccount->copy_fee_percentage, 2) }}% fee)
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <div class="flex space-x-3 pt-4">
                    <button type="button" onclick="document.getElementById('editAccountModal').classList.add('hidden')" class="flex-1 bg-gray-200 hover:bg-gray-300 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-800 dark:text-gray-200 px-4 py-2 rounded-lg font-medium transition-colors">
                        Cancel
                    </button>
                    <button type="submit" class="flex-1 bg-primary-600 hover:bg-primary-700 text-white px-4 py-2 rounded-lg font-medium transition-colors">
                        Update Account
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function editAccount(accountId) {
    // Find the account data
    const accounts = @json($tradingAccounts);
    const account = accounts.find(a => a.id == accountId);
    
    if (account) {
        // Populate the form with account data
        document.getElementById('edit_account_id').value = account.id;
        document.getElementById('edit_broker_name').value = account.broker_name;
        document.getElementById('edit_account_number').value = account.account_number;
        document.getElementById('edit_server').value = account.server;
        document.getElementById('edit_password').value = account.password || '';
        document.getElementById('edit_account_type').value = account.account_type;
        document.getElementById('edit_balance').value = account.balance || '';
        document.getElementById('edit_equity').value = account.equity || '';
        document.getElementById('edit_risk_percentage').value = account.risk_percentage || 100;
        document.getElementById('edit_master_account_id').value = account.master_account_id || '';
        
        // Set the form action using Laravel route
        document.getElementById('editAccountForm').action = '{{ route("account.update", ":id") }}'.replace(':id', accountId);
        
        // Show the modal
        document.getElementById('editAccountModal').classList.remove('hidden');
    }
}
</script>
@endsection

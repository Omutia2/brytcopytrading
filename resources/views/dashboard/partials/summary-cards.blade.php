<!-- Summary Cards -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6 mb-6 sm:mb-8">
    <!-- Account Balance Card -->
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-4 sm:p-6 hover:shadow-md transition-shadow">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between space-y-3 sm:space-y-0">
            <div>
                <p class="text-xs sm:text-sm font-medium text-gray-600 dark:text-gray-400">Account Balance</p>
                <p class="text-xl sm:text-2xl font-bold text-gray-900 dark:text-white">${{ number_format(auth()->user()->tradingAccounts->sum('balance'), 2) }}</p>
            </div>
            <div class="w-10 h-10 sm:w-12 sm:h-12 bg-primary-100 dark:bg-primary-900 rounded-lg flex items-center justify-center">
                <svg class="w-4 h-4 sm:w-6 sm:h-6 text-primary-600 dark:text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
        </div>
        <div class="mt-3 sm:mt-4">
            <span class="text-primary-600 dark:text-primary-400 text-xs sm:text-sm font-medium">+12.5%</span>
            <span class="text-gray-500 dark:text-gray-400 text-xs">from last month</span>
        </div>
    </div>

    <!-- Active Trades Card -->
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-4 sm:p-6 hover:shadow-md transition-shadow">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between space-y-3 sm:space-y-0">
            <div>
                <p class="text-xs sm:text-sm font-medium text-gray-600 dark:text-gray-400">Active Trading Accounts</p>
                <p class="text-xl sm:text-2xl font-bold text-gray-900 dark:text-white">{{ auth()->user()->tradingAccounts->where('status', 'ACTIVE')->count() }}</p>
            </div>
            <div class="w-10 h-10 sm:w-12 sm:h-12 bg-green-100 dark:bg-green-900 rounded-lg flex items-center justify-center">
                <svg class="w-4 h-4 sm:w-6 sm:h-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                </svg>
            </div>
        </div>
        <div class="mt-3 sm:mt-4">
            <span class="text-green-600 dark:text-green-400 text-xs sm:text-sm font-medium">+2 today</span>
            <span class="text-gray-500 dark:text-gray-400 text-xs">from this session</span>
        </div>
    </div>

    <!-- Total Profit/Loss Card -->
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-4 sm:p-6 hover:shadow-md transition-shadow">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between space-y-3 sm:space-y-0">
            <div>
                <p class="text-xs sm:text-sm font-medium text-gray-600 dark:text-gray-400">Total Profit/Loss</p>
                <p class="text-xl sm:text-2xl font-bold text-gray-900 dark:text-white">${{ number_format(auth()->user()->trades->sum('profit_loss'), 2) }}</p>
            </div>
            <div class="w-10 h-10 sm:w-12 sm:h-12 bg-accent-100 dark:bg-accent-900 rounded-lg flex items-center justify-center">
                <svg class="w-4 h-4 sm:w-6 sm:h-6 text-accent-600 dark:text-accent-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                </svg>
            </div>
        </div>
        <div class="mt-3 sm:mt-4">
            <span class="text-accent-600 dark:text-accent-400 text-xs sm:text-sm font-medium">+8.3%</span>
            <span class="text-gray-500 dark:text-gray-400 text-xs">performance</span>
        </div>
    </div>

    <!-- Subscription Status Card -->
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-4 sm:p-6 hover:shadow-md transition-shadow">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between space-y-3 sm:space-y-0">
            <div>
                <p class="text-xs sm:text-sm font-medium text-gray-600 dark:text-gray-400">Subscription Status</p>
                <p class="text-xl sm:text-2xl font-bold text-gray-900 dark:text-white">{{ auth()->user()->subscription->status ?? 'FREE' }}</p>
            </div>
            <div class="w-10 h-10 sm:w-12 sm:h-12 bg-blue-100 dark:bg-blue-900 rounded-lg flex items-center justify-center">
                <svg class="w-4 h-4 sm:w-6 sm:h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                </svg>
            </div>
        </div>
        <div class="mt-3 sm:mt-4">
            <span class="text-blue-600 dark:text-blue-400 text-xs sm:text-sm font-medium">Active</span>
            <span class="text-gray-500 dark:text-gray-400 text-xs">since {{ auth()->user()->created_at->diffForHumans() }}</span>
        </div>
    </div>
</div>

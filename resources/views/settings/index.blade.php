@extends('layouts.app')

@section('content')
    <!-- Settings Content -->
    <main class="flex-1 p-4 sm:p-6">
        <div class="max-w-12xl mx-auto">
                <!-- Page Header -->
                <div class="mb-4 sm:mb-8">
                    <h1 class="text-2xl sm:text-3xl font-bold text-gray-900 dark:text-white">Settings</h1>
                    <p class="text-sm sm:text-base text-gray-600 dark:text-gray-300 mt-1 sm:mt-2">Manage your profile and preferences</p>
                </div>

                @if(session('success'))
                    <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg dark:bg-green-900 dark:border-green-600 dark:text-green-200">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <!-- Profile Settings -->
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                        <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Profile Settings</h2>
                        
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Name</label>
                                <input type="text" value="{{ auth()->user()->name }}" class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white px-3 py-2" readonly>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Email</label>
                                <input type="email" value="{{ auth()->user()->email }}" class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white px-3 py-2" readonly>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Country</label>
                                <input type="text" value="{{ auth()->user()->country ?? 'Not set' }}" class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white px-3 py-2" readonly>
                            </div>
                        </div>
                    </div>

                    <!-- Trading Preferences -->
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                        <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Trading Preferences</h2>
                        
                        <div class="space-y-4">
                            <div class="flex items-center justify-between">
                                <label class="text-sm font-medium text-gray-700 dark:text-gray-300">Enable Copy Trading</label>
                                <button class="relative inline-flex h-6 w-11 items-center rounded-full bg-gray-200 dark:bg-gray-700" role="checkbox" checked>
                                    <span class="translate-x-1 inline-block h-4 w-4 rounded bg-white dark:bg-gray-900 transition"></span>
                                </button>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Default Lot Size</label>
                                <select class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white px-3 py-2">
                                    <option>0.01</option>
                                    <option>0.05</option>
                                    <option>0.1</option>
                                    <option>0.5</option>
                                    <option>1.0</option>
                                </select>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Risk Level</label>
                                <select class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white px-3 py-2">
                                    <option>Low</option>
                                    <option>Medium</option>
                                    <option>High</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Notifications -->
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                        <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Notifications</h2>
                        
                        <div class="space-y-4">
                            <div class="flex items-center justify-between">
                                <label class="text-sm font-medium text-gray-700 dark:text-gray-300">Email Notifications</label>
                                <button class="relative inline-flex h-6 w-11 items-center rounded-full bg-gray-200 dark:bg-gray-700" role="checkbox" checked>
                                    <span class="translate-x-1 inline-block h-4 w-4 rounded bg-white dark:bg-gray-900 transition"></span>
                                </button>
                            </div>
                            
                            <div class="flex items-center justify-between">
                                <label class="text-sm font-medium text-gray-700 dark:text-gray-300">Trade Alerts</label>
                                <button class="relative inline-flex h-6 w-11 items-center rounded-full bg-gray-200 dark:bg-gray-700" role="checkbox" checked>
                                    <span class="translate-x-1 inline-block h-4 w-4 rounded bg-white dark:bg-gray-900 transition"></span>
                                </button>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Daily Summary</label>
                                <button class="relative inline-flex h-6 w-11 items-center rounded-full bg-gray-200 dark:bg-gray-700" role="checkbox">
                                    <span class="translate-x-1 inline-block h-4 w-4 rounded bg-white dark:bg-gray-900 transition"></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

                    <!-- Profile Settings -->
                    <div class="lg:col-span-2">
                        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6 hover:shadow-md transition-shadow">
                            <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Profile Information</h2>
                            
                            <form action="{{ route('settings.update') }}" method="POST" class="space-y-6">
                                @csrf
                                @method('POST')
                                
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Full Name</label>
                                        <input type="text" id="name" name="name" value="{{ $user->name }}" required class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:text-white">
                                    </div>
                                    
                                    <div>
                                        <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Email Address</label>
                                        <input type="email" id="email" name="email" value="{{ $user->email }}" required class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:text-white">
                                    </div>
                                </div>
                                
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <label for="phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Phone Number</label>
                                        <input type="tel" id="phone" name="phone" value="{{ $user->phone ?? '' }}" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:text-white">
                                    </div>
                                    
                                    <div>
                                        <label for="country" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Country</label>
                                        <select id="country" name="country" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:text-white">
                                            <option value="">Select your country</option>
                                            <option value="US" {{ $user->country == 'US' ? 'selected' : '' }}>United States</option>
                                            <option value="GB" {{ $user->country == 'GB' ? 'selected' : '' }}>United Kingdom</option>
                                            <option value="CA" {{ $user->country == 'CA' ? 'selected' : '' }}>Canada</option>
                                            <option value="AU" {{ $user->country == 'AU' ? 'selected' : '' }}>Australia</option>
                                            <option value="DE" {{ $user->country == 'DE' ? 'selected' : '' }}>Germany</option>
                                            <option value="FR" {{ $user->country == 'FR' ? 'selected' : '' }}>France</option>
                                            <option value="JP" {{ $user->country == 'JP' ? 'selected' : '' }}>Japan</option>
                                            <option value="CN" {{ $user->country == 'CN' ? 'selected' : '' }}>China</option>
                                            <option value="IN" {{ $user->country == 'IN' ? 'selected' : '' }}>India</option>
                                            <option value="BR" {{ $user->country == 'BR' ? 'selected' : '' }}>Brazil</option>
                                            <option value="MX" {{ $user->country == 'MX' ? 'selected' : '' }}>Mexico</option>
                                            <option value="ES" {{ $user->country == 'ES' ? 'selected' : '' }}>Spain</option>
                                            <option value="IT" {{ $user->country == 'IT' ? 'selected' : '' }}>Italy</option>
                                            <option value="NL" {{ $user->country == 'NL' ? 'selected' : '' }}>Netherlands</option>
                                            <option value="SE" {{ $user->country == 'SE' ? 'selected' : '' }}>Sweden</option>
                                            <option value="NO" {{ $user->country == 'NO' ? 'selected' : '' }}>Norway</option>
                                            <option value="DK" {{ $user->country == 'DK' ? 'selected' : '' }}>Denmark</option>
                                            <option value="FI" {{ $user->country == 'FI' ? 'selected' : '' }}>Finland</option>
                                            <option value="CH" {{ $user->country == 'CH' ? 'selected' : '' }}>Switzerland</option>
                                            <option value="AT" {{ $user->country == 'AT' ? 'selected' : '' }}>Austria</option>
                                            <option value="BE" {{ $user->country == 'BE' ? 'selected' : '' }}>Belgium</option>
                                            <option value="IE" {{ $user->country == 'IE' ? 'selected' : '' }}>Ireland</option>
                                            <option value="PT" {{ $user->country == 'PT' ? 'selected' : '' }}>Portugal</option>
                                            <option value="GR" {{ $user->country == 'GR' ? 'selected' : '' }}>Greece</option>
                                            <option value="RU" {{ $user->country == 'RU' ? 'selected' : '' }}>Russia</option>
                                            <option value="TR" {{ $user->country == 'TR' ? 'selected' : '' }}>Turkey</option>
                                            <option value="IL" {{ $user->country == 'IL' ? 'selected' : '' }}>Israel</option>
                                            <option value="SA" {{ $user->country == 'SA' ? 'selected' : '' }}>Saudi Arabia</option>
                                            <option value="AE" {{ $user->country == 'AE' ? 'selected' : '' }}>United Arab Emirates</option>
                                            <option value="ZA" {{ $user->country == 'ZA' ? 'selected' : '' }}>South Africa</option>
                                            <option value="EG" {{ $user->country == 'EG' ? 'selected' : '' }}>Egypt</option>
                                            <option value="NG" {{ $user->country == 'NG' ? 'selected' : '' }}>Nigeria</option>
                                            <option value="KE" {{ $user->country == 'KE' ? 'selected' : '' }}>Kenya</option>
                                            <option value="AR" {{ $user->country == 'AR' ? 'selected' : '' }}>Argentina</option>
                                            <option value="CL" {{ $user->country == 'CL' ? 'selected' : '' }}>Chile</option>
                                            <option value="PE" {{ $user->country == 'PE' ? 'selected' : '' }}>Peru</option>
                                            <option value="CO" {{ $user->country == 'CO' ? 'selected' : '' }}>Colombia</option>
                                            <option value="VE" {{ $user->country == 'VE' ? 'selected' : '' }}>Venezuela</option>
                                            <option value="MY" {{ $user->country == 'MY' ? 'selected' : '' }}>Malaysia</option>
                                            <option value="SG" {{ $user->country == 'SG' ? 'selected' : '' }}>Singapore</option>
                                            <option value="TH" {{ $user->country == 'TH' ? 'selected' : '' }}>Thailand</option>
                                            <option value="PH" {{ $user->country == 'PH' ? 'selected' : '' }}>Philippines</option>
                                            <option value="ID" {{ $user->country == 'ID' ? 'selected' : '' }}>Indonesia</option>
                                            <option value="VN" {{ $user->country == 'VN' ? 'selected' : '' }}>Vietnam</option>
                                            <option value="PK" {{ $user->country == 'PK' ? 'selected' : '' }}>Pakistan</option>
                                            <option value="BD" {{ $user->country == 'BD' ? 'selected' : '' }}>Bangladesh</option>
                                            <option value="LK" {{ $user->country == 'LK' ? 'selected' : '' }}>Sri Lanka</option>
                                            <option value="MM" {{ $user->country == 'MM' ? 'selected' : '' }}>Myanmar</option>
                                            <option value="KH" {{ $user->country == 'KH' ? 'selected' : '' }}>Cambodia</option>
                                            <option value="LA" {{ $user->country == 'LA' ? 'selected' : '' }}>Laos</option>
                                            <option value="NP" {{ $user->country == 'NP' ? 'selected' : '' }}>Nepal</option>
                                            <option value="BT" {{ $user->country == 'BT' ? 'selected' : '' }}>Bhutan</option>
                                            <option value="MV" {{ $user->country == 'MV' ? 'selected' : '' }}>Maldives</option>
                                            <option value="KZ" {{ $user->country == 'KZ' ? 'selected' : '' }}>Kazakhstan</option>
                                            <option value="UZ" {{ $user->country == 'UZ' ? 'selected' : '' }}>Uzbekistan</option>
                                            <option value="KG" {{ $user->country == 'KG' ? 'selected' : '' }}>Kyrgyzstan</option>
                                            <option value="TJ" {{ $user->country == 'TJ' ? 'selected' : '' }}>Tajikistan</option>
                                            <option value="TM" {{ $user->country == 'TM' ? 'selected' : '' }}>Turkmenistan</option>
                                            <option value="AF" {{ $user->country == 'AF' ? 'selected' : '' }}>Afghanistan</option>
                                            <option value="IQ" {{ $user->country == 'IQ' ? 'selected' : '' }}>Iraq</option>
                                            <option value="IR" {{ $user->country == 'IR' ? 'selected' : '' }}>Iran</option>
                                            <option value="SY" {{ $user->country == 'SY' ? 'selected' : '' }}>Syria</option>
                                            <option value="LB" {{ $user->country == 'LB' ? 'selected' : '' }}>Lebanon</option>
                                            <option value="JO" {{ $user->country == 'JO' ? 'selected' : '' }}>Jordan</option>
                                            <option value="PS" {{ $user->country == 'PS' ? 'selected' : '' }}>Palestine</option>
                                            <option value="CY" {{ $user->country == 'CY' ? 'selected' : '' }}>Cyprus</option>
                                            <option value="MT" {{ $user->country == 'MT' ? 'selected' : '' }}>Malta</option>
                                            <option value="LU" {{ $user->country == 'LU' ? 'selected' : '' }}>Luxembourg</option>
                                            <option value="IS" {{ $user->country == 'IS' ? 'selected' : '' }}>Iceland</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="flex justify-end">
                                    <button type="submit" class="bg-primary-600 hover:bg-primary-700 text-white font-medium py-2 px-4 rounded-lg transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
                                        Save Changes
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Password Change -->
                    <div class="mt-6 bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                        <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-6">Change Password</h2>
                        
                        <form action="{{ route('password.update') }}" method="POST" class="space-y-6">
                            @csrf
                            
                            <div>
                                <label for="current_password" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Current Password</label>
                                <input type="password" id="current_password" name="current_password" required class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:text-white">
                            </div>
                        <div class="mt-6 bg-red-50 dark:bg-red-900/20 rounded-xl border border-red-200 dark:border-red-800 p-6">
                            <h2 class="text-lg font-semibold text-red-900 dark:text-red-100 mb-4">Danger Zone</h2>
                            
                            <div class="space-y-4">
                                <div>
                                    <h3 class="text-sm font-medium text-red-900 dark:text-red-100">Delete Account</h3>
                                    <p class="text-xs text-red-700 dark:text-red-300 mb-3">Permanently delete your account and all data</p>
                                    <button class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                                        Delete Account
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

<script>
    function toggleDarkMode() {
        document.documentElement.classList.toggle('dark');
        localStorage.setItem('darkMode', document.documentElement.classList.contains('dark'));
    }

    // Initialize dark mode from localStorage
    if (localStorage.getItem('darkMode') === 'true') {
        document.documentElement.classList.add('dark');
    }
</script>
@endsection

<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BrytCopyTrading - Copy Professional Trades Automatically</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#eff6ff',
                            100: '#dbeafe',
                            200: '#bfdbfe',
                            300: '#93c5fd',
                            400: '#60a5fa',
                            500: '#3b82f6',
                            600: '#2563eb',
                            700: '#1d4ed8',
                            800: '#1e40af',
                            900: '#1e3a8a',
                            950: '#172554',
                        },
                        accent: {
                            50: '#faf5ff',
                            100: '#f3e8ff',
                            200: '#e9d5ff',
                            300: '#d8b4fe',
                            400: '#c084fc',
                            500: '#a855f7',
                            600: '#9333ea',
                            700: '#7c3aed',
                            800: '#6b21a8',
                            900: '#581c87',
                            950: '#3b0764',
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-50 dark:bg-gray-950 text-gray-900 dark:text-white transition-colors duration-300">
    <!-- Navigation -->
    <nav class="bg-white dark:bg-gray-900/95 backdrop-blur-md border-b border-gray-200 dark:border-gray-800/50 sticky top-0 z-50 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 bg-gradient-to-r from-yellow-400 to-orange-500 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                            </svg>
                        </div>
                        <span class="text-xl font-bold text-gray-900 dark:text-white">BrytCopyTrading</span>
                    </div>
                </div>

                <div class="flex items-center space-x-4">
                    <!-- Dark Mode Toggle -->
                    <button onclick="toggleDarkMode()" class="p-2 rounded-lg text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-gray-800 transition-all duration-200">
                        <svg class="w-5 h-5 hidden dark:block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                        <svg class="w-5 h-5 block dark:hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>
                        </svg>
                    </button>

                    @guest
                        <a href="{{ route('login') }}" class="text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white px-3 py-2 rounded-md text-sm font-medium transition-colors">Login</a>
                        <a href="{{ route('register') }}" class="bg-gradient-to-r from-yellow-400 to-orange-500 hover:from-yellow-500 hover:to-orange-600 text-white px-4 py-2 rounded-lg text-sm font-medium transition-all duration-200 transform hover:scale-105">Get Started</a>
                    @else
                        <a href="{{ route('dashboard') }}" class="bg-gradient-to-r from-yellow-400 to-orange-500 hover:from-yellow-500 hover:to-orange-600 text-white px-4 py-2 rounded-lg text-sm font-medium transition-all duration-200 transform hover:scale-105">Dashboard</a>
                    @endguest
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="relative overflow-hidden bg-gradient-to-br from-gray-50 via-white to-gray-100 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 transition-colors duration-300">
        <div class="absolute inset-0 bg-gradient-to-r from-yellow-400/10 via-transparent to-orange-500/10 dark:from-yellow-400/5 dark:via-transparent dark:to-orange-500/5"></div>
        
        <!-- Animated Background Elements -->
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute top-20 left-10 w-72 h-72 bg-yellow-400/5 dark:bg-yellow-400/3 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute top-40 right-20 w-96 h-96 bg-orange-500/5 dark:bg-orange-500/3 rounded-full blur-3xl animate-pulse delay-1000"></div>
            <div class="absolute bottom-20 left-1/2 w-80 h-80 bg-yellow-400/5 dark:bg-yellow-400/3 rounded-full blur-3xl animate-pulse delay-2000"></div>
        </div>
        
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
            <div class="text-center">
                <div class="inline-flex items-center space-x-2 bg-white dark:bg-gray-800/50 backdrop-blur-sm rounded-full px-4 py-2 mb-6 border border-gray-200 dark:border-gray-700 shadow-sm">
                    <span class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></span>
                    <span class="text-sm text-gray-600 dark:text-gray-300">System Status: Operational</span>
                </div>
                
                <h1 class="text-5xl md:text-7xl font-bold text-gray-900 dark:text-white mb-6 leading-tight">
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 via-orange-400 to-yellow-500">Copy Professional Trades</span>
                    <span class="block">Automatically</span>
                </h1>
                <p class="text-xl text-gray-600 dark:text-gray-300 mb-8 max-w-4xl mx-auto leading-relaxed">
                    Connect your trading account and automatically copy trades from professional traders. 
                    <span class="text-yellow-600 dark:text-yellow-400 font-semibold">Leverage expert strategies without spending years learning the markets.</span>
                </p>
                
                <div class="flex flex-col sm:flex-row gap-4 justify-center mb-12">
                    @guest
                        <a href="{{ route('register') }}" class="group relative bg-gradient-to-r from-yellow-400 to-orange-500 hover:from-yellow-500 hover:to-orange-600 text-white px-8 py-4 rounded-xl text-lg font-semibold transition-all duration-300 transform hover:scale-105 hover:shadow-2xl hover:shadow-yellow-500/25">
                            <span class="relative z-10">Start Trading Now</span>
                            <div class="absolute inset-0 bg-gradient-to-r from-yellow-600 to-orange-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-xl"></div>
                        </a>
                        <a href="{{ route('login') }}" class="border-2 border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 hover:border-yellow-400 hover:text-yellow-600 dark:hover:text-yellow-400 px-8 py-4 rounded-xl text-lg font-semibold transition-all duration-300">
                            Login to Account
                        </a>
                    @else
                        <a href="{{ route('dashboard') }}" class="group relative bg-gradient-to-r from-yellow-400 to-orange-500 hover:from-yellow-500 hover:to-orange-600 text-white px-8 py-4 rounded-xl text-lg font-semibold transition-all duration-300 transform hover:scale-105 hover:shadow-2xl hover:shadow-yellow-500/25">
                            <span class="relative z-10">Go to Dashboard</span>
                            <div class="absolute inset-0 bg-gradient-to-r from-yellow-600 to-orange-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-xl"></div>
                        </a>
                    @endguest
                </div>

                <!-- Trust Indicators -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-12 max-w-4xl mx-auto">
                    <div class="text-center">
                        <div class="text-3xl font-bold text-yellow-500 dark:text-yellow-400 mb-2">30+</div>
                        <div class="text-sm text-gray-600 dark:text-gray-400">Active Traders</div>
                    </div>
                    {{-- <div class="text-center">
                        <div class="text-3xl font-bold text-orange-500 dark:text-orange-400 mb-2">$2.5M+</div>
                        <div class="text-sm text-gray-600 dark:text-gray-400">Daily Volume</div>
                    </div> --}}
                    {{-- <div class="text-center">
                        <div class="text-3xl font-bold text-green-500 dark:text-green-400 mb-2">99.9%</div>
                        <div class="text-sm text-gray-600 dark:text-gray-400">Uptime</div>
                    </div> --}}
                    <div class="text-center">
                        <div class="text-3xl font-bold text-blue-500 dark:text-blue-400 mb-2">24/7</div>
                        <div class="text-sm text-gray-600 dark:text-gray-400">Support</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-24 bg-white dark:bg-gray-900 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-20">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white mb-6">
                    Why Choose <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 to-orange-500">BrytCopyTradin</span>?
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-300 max-w-4xl mx-auto">
                    Professional copy trading with <span class="text-yellow-600 dark:text-yellow-400 font-semibold">advanced features and seamless integration</span>
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="group relative bg-gray-50 dark:bg-gray-800/50 backdrop-blur-sm rounded-2xl p-8 border border-gray-200 dark:border-gray-700/50 hover:border-yellow-400/30 transition-all duration-300 hover:transform hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-r from-yellow-400/5 to-orange-500/5 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="relative z-10">
                        <div class="w-16 h-16 bg-gradient-to-r from-yellow-400/20 to-orange-500/20 rounded-xl flex items-center justify-center mx-auto mb-6 border border-yellow-400/30">
                            <svg class="w-8 h-8 text-yellow-500 dark:text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4-4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">Smart Copy Trading</h3>
                        <p class="text-gray-600 dark:text-gray-300 leading-relaxed">Advanced algorithms automatically replicate trades from top-performing traders with millisecond precision</p>
                    </div>
                </div>

                <div class="group relative bg-gray-50 dark:bg-gray-800/50 backdrop-blur-sm rounded-2xl p-8 border border-gray-200 dark:border-gray-700/50 hover:border-yellow-400/30 transition-all duration-300 hover:transform hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-r from-yellow-400/5 to-orange-500/5 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="relative z-10">
                        <div class="w-16 h-16 bg-gradient-to-r from-yellow-400/20 to-orange-500/20 rounded-xl flex items-center justify-center mx-auto mb-6 border border-yellow-400/30">
                            <svg class="w-8 h-8 text-yellow-500 dark:text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7m7 7v7m-7 7l-7-7m7-7v7"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">Lightning Fast Execution</h3>
                        <p class="text-gray-600 dark:text-gray-300 leading-relaxed">Sub-100ms trade execution with optimized routing and liquidity aggregation</p>
                    </div>
                </div>

                <div class="group relative bg-gray-50 dark:bg-gray-800/50 backdrop-blur-sm rounded-2xl p-8 border border-gray-200 dark:border-gray-700/50 hover:border-yellow-400/30 transition-all duration-300 hover:transform hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-r from-yellow-400/5 to-orange-500/5 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="relative z-10">
                        <div class="w-16 h-16 bg-gradient-to-r from-yellow-400/20 to-orange-500/20 rounded-xl flex items-center justify-center mx-auto mb-6 border border-yellow-400/30">
                            <svg class="w-8 h-8 text-yellow-500 dark:text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">AI Risk Management</h3>
                        <p class="text-gray-600 dark:text-gray-300 leading-relaxed">Intelligent risk controls powered by machine learning algorithms protect your capital</p>
                    </div>
                </div>

                <div class="group relative bg-gray-50 dark:bg-gray-800/50 backdrop-blur-sm rounded-2xl p-8 border border-gray-200 dark:border-gray-700/50 hover:border-yellow-400/30 transition-all duration-300 hover:transform hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-r from-yellow-400/5 to-orange-500/5 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="relative z-10">
                        <div class="w-16 h-16 bg-gradient-to-r from-yellow-400/20 to-orange-500/20 rounded-xl flex items-center justify-center mx-auto mb-6 border border-yellow-400/30">
                            <svg class="w-8 h-8 text-yellow-500 dark:text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">Bank-Level Security</h3>
                        <p class="text-gray-600 dark:text-gray-300 leading-relaxed">Military-grade encryption and multi-signature wallet protection for all assets</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works -->
    <section class="py-24 bg-white dark:bg-gray-900 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-20">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white mb-6">
                    How It <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 to-orange-500">Works</span>
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-300 max-w-4xl mx-auto">
                    Get started with <span class="text-yellow-600 dark:text-yellow-400 font-semibold">copy trading in three simple steps</span>
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-12">
                <div class="relative group">
                    <div class="absolute -inset-1 bg-gradient-to-r from-yellow-400/20 to-orange-500/20 rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="relative bg-gray-50 dark:bg-gray-800/50 backdrop-blur-sm rounded-3xl p-8 border border-gray-200 dark:border-gray-700/50 transition-colors duration-300">
                        <div class="flex flex-col items-center">
                            <div class="w-24 h-24 bg-gradient-to-r from-yellow-400 to-orange-500 rounded-full flex items-center justify-center mx-auto mb-6 text-3xl font-bold text-white shadow-2xl shadow-yellow-500/25">
                                1
                            </div>
                            <div class="absolute top-0 right-0 w-12 h-12 bg-green-400 rounded-full flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Connect Account</h3>
                            <p class="text-gray-600 dark:text-gray-300 leading-relaxed">Link your trading account securely using your broker credentials with enterprise-grade encryption</p>
                            
                            <div class="mt-6 space-y-3 text-left">
                                <div class="flex items-center space-x-3">
                                    <svg class="w-5 h-5 text-green-500 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span class="text-sm text-gray-700 dark:text-gray-300">Secure API connection</span>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <svg class="w-5 h-5 text-green-500 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span class="text-sm text-gray-700 dark:text-gray-300">Multi-broker support</span>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <svg class="w-5 h-5 text-green-500 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span class="text-sm text-gray-700 dark:text-gray-300">2FA authentication</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="relative group">
                    <div class="absolute -inset-1 bg-gradient-to-r from-yellow-400/20 to-orange-500/20 rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="relative bg-gray-50 dark:bg-gray-800/50 backdrop-blur-sm rounded-3xl p-8 border border-gray-200 dark:border-gray-700/50 transition-colors duration-300">
                        <div class="flex flex-col items-center">
                            <div class="w-24 h-24 bg-gradient-to-r from-yellow-400 to-orange-500 rounded-full flex items-center justify-center mx-auto mb-6 text-3xl font-bold text-white shadow-2xl shadow-yellow-500/25">
                                2
                            </div>
                            <div class="absolute top-0 right-0 w-12 h-12 bg-green-400 rounded-full flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Choose Plan</h3>
                            <p class="text-gray-600 dark:text-gray-300 leading-relaxed">Select from flexible subscription plans tailored to your trading volume and experience level</p>
                            
                            <div class="mt-6 space-y-3 text-left">
                                <div class="flex items-center space-x-3">
                                    <svg class="w-5 h-5 text-green-500 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span class="text-sm text-gray-700 dark:text-gray-300">Professional traders</span>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <svg class="w-5 h-5 text-green-500 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span class="text-sm text-gray-700 dark:text-gray-300">Risk management tools</span>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <svg class="w-5 h-5 text-green-500 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span class="text-sm text-gray-700 dark:text-gray-300">Performance analytics</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="relative group">
                    <div class="absolute -inset-1 bg-gradient-to-r from-yellow-400/20 to-orange-500/20 rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="relative bg-gray-50 dark:bg-gray-800/50 backdrop-blur-sm rounded-3xl p-8 border border-gray-200 dark:border-gray-700/50 transition-colors duration-300">
                        <div class="flex flex-col items-center">
                            <div class="w-24 h-24 bg-gradient-to-r from-yellow-400 to-orange-500 rounded-full flex items-center justify-center mx-auto mb-6 text-3xl font-bold text-white shadow-2xl shadow-yellow-500/25">
                                3
                            </div>
                            <div class="absolute top-0 right-0 w-12 h-12 bg-green-400 rounded-full flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Start Earning</h3>
                            <p class="text-gray-600 dark:text-gray-300 leading-relaxed">Sit back and watch as trades are automatically copied to your account with real-time monitoring</p>
                            
                            <div class="mt-6 space-y-3 text-left">
                                <div class="flex items-center space-x-3">
                                    <svg class="w-5 h-5 text-green-500 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span class="text-sm text-gray-700 dark:text-gray-300">Automated execution</span>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <svg class="w-5 h-5 text-green-500 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span class="text-sm text-gray-700 dark:text-gray-300">Real-time monitoring</span>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <svg class="w-5 h-5 text-green-500 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span class="text-sm text-gray-700 dark:text-gray-300">Profit tracking</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Performance Section -->
    <section class="py-24 bg-white dark:bg-gray-900 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-20">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white mb-6">
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 to-orange-500">Proven Performance</span>
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-300 max-w-4xl mx-auto">
                    Track record of <span class="text-yellow-600 dark:text-yellow-400 font-semibold">success with transparent metrics</span>
                </p>
            </div>

            <div class="grid md:grid-cols-4 gap-8">
                <div class="group relative bg-gray-50 dark:bg-gray-800/50 backdrop-blur-sm rounded-2xl p-8 border border-gray-200 dark:border-gray-700/50 hover:border-yellow-400/30 transition-all duration-300 hover:transform hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-r from-yellow-400/5 to-orange-500/5 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="relative z-10 text-center">
                        <div class="text-5xl font-bold text-yellow-600 dark:text-yellow-400 mb-2">Amazing</div>
                        <p class="text-gray-700 dark:text-gray-300">Average Annual ROI</p>
                        <div class="mt-4 flex justify-center">
                            <svg class="w-16 h-8 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="group relative bg-gray-50 dark:bg-gray-800/50 backdrop-blur-sm rounded-2xl p-8 border border-gray-200 dark:border-gray-700/50 hover:border-yellow-400/30 transition-all duration-300 hover:transform hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-r from-yellow-400/5 to-orange-500/5 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="relative z-10 text-center">
                        <div class="text-5xl font-bold text-green-600 dark:text-green-400 mb-2">73%</div>
                        <p class="text-gray-700 dark:text-gray-300">Win Rate</p>
                        <div class="mt-4 flex justify-center">
                            <div class="flex space-x-1">
                                <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                                <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                                <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                                <div class="w-2 h-2 bg-gray-400 rounded-full"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="group relative bg-gray-50 dark:bg-gray-800/50 backdrop-blur-sm rounded-2xl p-8 border border-gray-200 dark:border-gray-700/50 hover:border-yellow-400/30 transition-all duration-300 hover:transform hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-r from-yellow-400/5 to-orange-500/5 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="relative z-10 text-center">
                        <div class="text-5xl font-bold text-yellow-600 dark:text-yellow-400 mb-2">1,000+</div>
                        <p class="text-gray-700 dark:text-gray-300">Total Trades</p>
                        <div class="mt-4 flex justify-center">
                            <svg class="w-16 h-8 text-yellow-600 dark:text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="group relative bg-gray-50 dark:bg-gray-800/50 backdrop-blur-sm rounded-2xl p-8 border border-gray-200 dark:border-gray-700/50 hover:border-yellow-400/30 transition-all duration-300 hover:transform hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-r from-yellow-400/5 to-orange-500/5 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="relative z-10 text-center">
                        <div class="text-5xl font-bold text-yellow-600 dark:text-yellow-400 mb-2">73+</div>
                        <p class="text-gray-700 dark:text-gray-300">Active Users</p>
                        <div class="mt-4 flex justify-center">
                            <svg class="w-16 h-8 text-yellow-600 dark:text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Copy Trading vs Normal Trading Section -->
    <section class="py-24 bg-white dark:bg-gray-900 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-20">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white mb-6">
                    Copy Trading vs <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 to-orange-500">Normal Trading</span>
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-300 max-w-4xl mx-auto">
                    See why <span class="text-yellow-600 dark:text-yellow-400 font-semibold">copy trading outperforms traditional methods</span>
                </p>
            </div>

            <div class="grid md:grid-cols-2 gap-12 mb-20">
                <!-- Normal Trading -->
                <div class="relative">
                    <div class="absolute inset-0 bg-red-500/10 rounded-3xl blur-3xl"></div>
                    <div class="relative bg-gray-50 dark:bg-gray-800/50 backdrop-blur-sm rounded-3xl p-8 border border-red-500/20 transition-colors duration-300">
                        <div class="flex items-center mb-6">
                            <div class="w-16 h-16 bg-red-500/20 rounded-2xl flex items-center justify-center mr-4 border border-red-500/30">
                                <svg class="w-8 h-8 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-2xl font-bold text-red-600 dark:text-red-400">Normal Trading</h3>
                                <p class="text-gray-600 dark:text-gray-400">Traditional manual approach</p>
                            </div>
                        </div>

                        <!-- Trading Interface Mock -->
                        <div class="bg-gray-100 dark:bg-gray-900/50 rounded-2xl p-6 mb-6 border border-gray-300 dark:border-gray-700 transition-colors duration-300">
                            <div class="flex justify-between items-center mb-4">
                                <span class="text-gray-600 dark:text-gray-400 text-sm">EUR/USD</span>
                                <span class="text-red-600 dark:text-red-400 text-sm">-2.34%</span>
                            </div>
                            <div class="h-32 bg-gradient-to-b from-red-500/20 to-transparent rounded-lg mb-4 relative overflow-hidden">
                                <svg class="w-full h-full" viewBox="0 0 200 100">
                                    <polyline points="10,20 30,35 50,25 70,45 90,40 110,55 130,50 150,65 170,60 190,75" 
                                              fill="none" stroke="#ef4444" stroke-width="2" opacity="0.8"/>
                                    <polyline points="10,20 30,35 50,25 70,45 90,40 110,55 130,50 150,65 170,60 190,75" 
                                              fill="url(#redGradient)" opacity="0.3"/>
                                    <defs>
                                        <linearGradient id="redGradient" x1="0%" y1="0%" x2="0%" y2="100%">
                                            <stop offset="0%" style="stop-color:#ef4444;stop-opacity:0.6" />
                                            <stop offset="100%" style="stop-color:#ef4444;stop-opacity:0" />
                                        </linearGradient>
                                    </defs>
                                </svg>
                            </div>
                            <div class="grid grid-cols-2 gap-4 text-sm">
                                <div>
                                    <span class="text-gray-600 dark:text-gray-400">Balance:</span>
                                    <span class="text-red-600 dark:text-red-400 ml-2">$8,234.50</span>
                                </div>
                                <div>
                                    <span class="text-gray-600 dark:text-gray-400">P/L:</span>
                                    <span class="text-red-600 dark:text-red-400 ml-2">-$456.30</span>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-4">
                            <div class="flex items-start space-x-3">
                                <svg class="w-5 h-5 text-red-600 dark:text-red-400 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <div>
                                    <h4 class="text-red-600 dark:text-red-400 font-semibold">Time-Consuming Analysis</h4>
                                    <p class="text-gray-700 dark:text-gray-300 text-sm">Hours spent researching markets and analyzing charts</p>
                                </div>
                            </div>
                            <div class="flex items-start space-x-3">
                                <svg class="w-5 h-5 text-red-600 dark:text-red-400 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <div>
                                    <h4 class="text-red-600 dark:text-red-400 font-semibold">High Emotional Stress</h4>
                                    <p class="text-gray-700 dark:text-gray-300 text-sm">Fear and greed affecting trading decisions</p>
                                </div>
                            </div>
                            <div class="flex items-start space-x-3">
                                <svg class="w-5 h-5 text-red-600 dark:text-red-400 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <div>
                                    <h4 class="text-red-600 dark:text-red-400 font-semibold">Steep Learning Curve</h4>
                                    <p class="text-gray-700 dark:text-gray-300 text-sm">Years of experience needed for consistent profits</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Copy Trading -->
                <div class="relative">
                    <div class="absolute inset-0 bg-green-500/10 rounded-3xl blur-3xl"></div>
                    <div class="relative bg-gray-50 dark:bg-gray-800/50 backdrop-blur-sm rounded-3xl p-8 border border-green-500/20 transition-colors duration-300">
                        <div class="flex items-center mb-6">
                            <div class="w-16 h-16 bg-green-500/20 rounded-2xl flex items-center justify-center mr-4 border border-green-500/30">
                                <svg class="w-8 h-8 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4-4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-2xl font-bold text-green-600 dark:text-green-400">Copy Trading</h3>
                                <p class="text-gray-600 dark:text-gray-400">Automated professional execution</p>
                            </div>
                        </div>

                        <!-- Copy Trading Interface Mock -->
                        <div class="bg-gray-100 dark:bg-gray-900/50 rounded-2xl p-6 mb-6 border border-gray-300 dark:border-gray-700 transition-colors duration-300">
                            <div class="flex justify-between items-center mb-4">
                                <span class="text-gray-600 dark:text-gray-400 text-sm">Auto-Copying: Brian Bryt</span>
                                <span class="text-green-600 dark:text-green-400 text-sm">+5.67%</span>
                            </div>
                            <div class="h-32 bg-gradient-to-b from-green-500/20 to-transparent rounded-lg mb-4 relative overflow-hidden">
                                <svg class="w-full h-full" viewBox="0 0 200 100">
                                    <polyline points="10,80 30,65 50,75 70,55 90,60 110,45 130,50 150,35 170,40 190,25" 
                                              fill="none" stroke="#10b981" stroke-width="2" opacity="0.8"/>
                                    <polyline points="10,80 30,65 50,75 70,55 90,60 110,45 130,50 150,35 170,40 190,25" 
                                              fill="url(#greenGradient)" opacity="0.3"/>
                                    <defs>
                                        <linearGradient id="greenGradient" x1="0%" y1="0%" x2="0%" y2="100%">
                                            <stop offset="0%" style="stop-color:#10b981;stop-opacity:0.6" />
                                            <stop offset="100%" style="stop-color:#10b981;stop-opacity:0" />
                                        </linearGradient>
                                    </defs>
                                </svg>
                                <div class="absolute top-4 right-4 bg-green-500/20 px-3 py-1 rounded-full border border-green-500/30">
                                    <span class="text-green-400 text-xs font-semibold">AUTO</span>
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-4 text-sm">
                                <div>
                                    <span class="text-gray-600 dark:text-gray-400">Balance:</span>
                                    <span class="text-green-600 dark:text-green-400 ml-2">$12,789.20</span>
                                </div>
                                <div>
                                    <span class="text-gray-600 dark:text-gray-400">P/L:</span>
                                    <span class="text-green-600 dark:text-green-400 ml-2">+$892.40</span>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-4">
                            <div class="flex items-start space-x-3">
                                <svg class="w-5 h-5 text-green-600 dark:text-green-400 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <div>
                                    <h4 class="text-green-600 dark:text-green-400 font-semibold">Set & Forget Automation</h4>
                                    <p class="text-gray-700 dark:text-gray-300 text-sm">Professional traders work for you 24/7</p>
                                </div>
                            </div>
                            <div class="flex items-start space-x-3">
                                <svg class="w-5 h-5 text-green-600 dark:text-green-400 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <div>
                                    <h4 class="text-green-600 dark:text-green-400 font-semibold">Emotion-Free Trading</h4>
                                    <p class="text-gray-700 dark:text-gray-300 text-sm">Algorithmic execution removes human bias</p>
                                </div>
                            </div>
                            <div class="flex items-start space-x-3">
                                <svg class="w-5 h-5 text-green-600 dark:text-green-400 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <div>
                                    <h4 class="text-green-600 dark:text-green-400 font-semibold">Instant Expertise Access</h4>
                                    <p class="text-gray-700 dark:text-gray-300 text-sm">Copy strategies of proven successful traders</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Comparison Table -->
            <div class="bg-gray-50 dark:bg-gray-800/50 backdrop-blur-sm rounded-3xl p-8 border border-gray-200 dark:border-gray-700 overflow-x-auto transition-colors duration-300">
                <table class="w-full">
                    <thead>
                        <tr class="border-b border-gray-200 dark:border-gray-700">
                            <th class="text-left text-gray-700 dark:text-gray-400 pb-4">Feature</th>
                            <th class="text-center text-red-600 dark:text-red-400 pb-4">Normal Trading</th>
                            <th class="text-center text-green-600 dark:text-green-400 pb-4">Copy Trading</th>
                        </tr>
                    </thead>
                    <tbody class="space-y-4">
                        <tr class="border-b border-gray-200 dark:border-gray-700">
                            <td class="py-4 text-gray-700 dark:text-gray-300">Time Required</td>
                            <td class="text-center text-red-600 dark:text-red-400">40+ hours/week</td>
                            <td class="text-center text-green-600 dark:text-green-400">5 minutes setup</td>
                        </tr>
                        <tr class="border-b border-gray-200 dark:border-gray-700">
                            <td class="py-4 text-gray-700 dark:text-gray-300">Success Rate</td>
                            <td class="text-center text-red-600 dark:text-red-400">10-15%</td>
                            <td class="text-center text-green-600 dark:text-green-400">73%</td>
                        </tr>
                        <tr class="border-b border-gray-200 dark:border-gray-700">
                            <td class="py-4 text-gray-700 dark:text-gray-300">Emotional Stress</td>
                            <td class="text-center text-red-600 dark:text-red-400">High</td>
                            <td class="text-center text-green-600 dark:text-green-400">None</td>
                        </tr>
                        <tr class="border-b border-gray-200 dark:border-gray-700">
                            <td class="py-4 text-gray-700 dark:text-gray-300">Learning Curve</td>
                            <td class="text-center text-red-600 dark:text-red-400">2-5 years</td>
                            <td class="text-center text-green-600 dark:text-green-400">Instant</td>
                        </tr>
                        <tr>
                            <td class="py-4 text-gray-700 dark:text-gray-300">Risk Management</td>
                            <td class="text-center text-red-600 dark:text-red-400">Manual</td>
                            <td class="text-center text-green-600 dark:text-green-400">Automated</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <!-- Live Trading Demo Section -->
    {{-- <section class="py-24 bg-white dark:bg-gradient-to-br dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-20">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white mb-6">
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 to-orange-500">Live Trading Demo</span>
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-300 max-w-4xl mx-auto">
                    Watch <span class="text-yellow-600 dark:text-yellow-400 font-semibold">copy trading in action</span> with real-time market data
                </p>
            </div>

            <!-- Trading Dashboard Mock -->
            <div class="bg-gray-50 dark:bg-gray-800/50 backdrop-blur-sm rounded-3xl p-8 border border-gray-200 dark:border-gray-700 transition-colors duration-300">
                <div class="grid md:grid-cols-3 gap-8">
                    <!-- Live Chart -->
                    <div class="md:col-span-2">
                        <div class="bg-gray-100 dark:bg-gray-900/50 rounded-2xl p-6 border border-gray-300 dark:border-gray-700 transition-colors duration-300">
                            <div class="flex justify-between items-center mb-4">
                                <div>
                                    <h3 class="text-xl font-bold text-gray-900 dark:text-white">BTC/USDT</h3>
                                    <p class="text-gray-600 dark:text-gray-400">Bitcoin / Tether</p>
                                </div>
                                <div class="text-right">
                                    <div class="text-2xl font-bold text-green-600 dark:text-green-400">$67,234.56</div>
                                    <div class="text-sm text-green-600 dark:text-green-400">+5.67%</div>
                                </div>
                            </div>
                            
                            <!-- Live Chart Animation -->
                            <div class="h-64 bg-gradient-to-b from-green-500/10 to-transparent rounded-lg mb-4 relative overflow-hidden">
                                <svg class="w-full h-full animate-pulse" viewBox="0 0 400 200">
                                    <polyline points="10,150 40,130 70,140 100,120 130,110 160,95 190,85 220,70 250,60 280,45 310,35 340,25 370,15 390,10" 
                                              fill="none" stroke="#10b981" stroke-width="2" opacity="0.8"/>
                                    <polyline points="10,150 40,130 70,140 100,120 130,110 160,95 190,85 220,70 250,60 280,45 310,35 340,25 370,15 390,10" 
                                              fill="url(#liveGradient)" opacity="0.3"/>
                                    <defs>
                                        <linearGradient id="liveGradient" x1="0%" y1="0%" x2="0%" y2="100%">
                                            <stop offset="0%" style="stop-color:#10b981;stop-opacity:0.6" />
                                            <stop offset="100%" style="stop-color:#10b981;stop-opacity:0" />
                                        </linearGradient>
                                    </defs>
                                </svg>
                                <div class="absolute top-4 right-4 flex items-center space-x-2">
                                    <div class="w-2 h-2 bg-green-600 dark:bg-green-400 rounded-full animate-pulse"></div>
                                    <span class="text-green-600 dark:text-green-400 text-xs">LIVE</span>
                                </div>
                            </div>

                            <!-- Trade Execution Animation -->
                            <div class="bg-gray-100 dark:bg-gray-800/50 rounded-lg p-4 border border-gray-300 dark:border-gray-600 transition-colors duration-300">
                                <div class="flex items-center justify-between mb-2">
                                    <span class="text-yellow-600 dark:text-yellow-400 font-semibold">Auto-Trade Executed</span>
                                    <span class="text-gray-600 dark:text-gray-400 text-xs">Just now</span>
                                </div>
                                <div class="grid grid-cols-3 gap-4 text-sm">
                                    <div>
                                        <span class="text-gray-600 dark:text-gray-400">Type:</span>
                                        <span class="text-green-600 dark:text-green-400 ml-2">BUY</span>
                                    </div>
                                    <div>
                                        <span class="text-gray-600 dark:text-gray-400">Amount:</span>
                                        <span class="text-gray-900 dark:text-white ml-2">0.025 BTC</span>
                                    </div>
                                    <div>
                                        <span class="text-gray-600 dark:text-gray-400">Price:</span>
                                        <span class="text-gray-900 dark:text-white ml-2">$67,234</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Trade History & Stats -->
                    <div class="space-y-6">
                        <!-- Trader Profile -->
                        <div class="bg-gray-100 dark:bg-gray-900/50 rounded-2xl p-6 border border-gray-300 dark:border-gray-700 transition-colors duration-300">
                            <div class="flex items-center mb-4">
                                <div class="w-12 h-12 bg-gradient-to-r from-yellow-400 to-orange-500 rounded-full flex items-center justify-center text-white font-bold mr-3">
                                    MC
                                </div>
                                <div>
                                    <h4 class="text-gray-900 dark:text-white font-semibold">Michael Chen</h4>
                                    <p class="text-gray-600 dark:text-gray-400 text-sm">Professional Trader</p>
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-4 text-sm">
                                <div>
                                    <span class="text-gray-600 dark:text-gray-400">Win Rate:</span>
                                    <span class="text-green-600 dark:text-green-400 ml-2">78.5%</span>
                                </div>
                                <div>
                                    <span class="text-gray-600 dark:text-gray-400">Followers:</span>
                                    <span class="text-gray-900 dark:text-white ml-2">1,247</span>
                                </div>
                                <div>
                                    <span class="text-gray-600 dark:text-gray-400">30D ROI:</span>
                                    <span class="text-green-600 dark:text-green-400 ml-2">+23.4%</span>
                                </div>
                                <div>
                                    <span class="text-gray-600 dark:text-gray-400">Risk:</span>
                                    <span class="text-yellow-600 dark:text-yellow-400 ml-2">Medium</span>
                                </div>
                            </div>
                        </div>

                        <!-- Recent Trades -->
                        <div class="bg-gray-100 dark:bg-gray-900/50 rounded-2xl p-6 border border-gray-300 dark:border-gray-700 transition-colors duration-300">
                            <h4 class="text-gray-900 dark:text-white font-semibold mb-4">Recent Trades</h4>
                            <div class="space-y-3">
                                <div class="flex justify-between items-center text-sm">
                                    <div>
                                        <div class="text-gray-900 dark:text-white">ETH/USDT</div>
                                        <div class="text-gray-600 dark:text-gray-400 text-xs">2 min ago</div>
                                    </div>
                                    <div class="text-green-600 dark:text-green-400">+$125.40</div>
                                </div>
                                <div class="flex justify-between items-center text-sm">
                                    <div>
                                        <div class="text-gray-900 dark:text-white">SOL/USDT</div>
                                        <div class="text-gray-600 dark:text-gray-400 text-xs">15 min ago</div>
                                    </div>
                                    <div class="text-green-600 dark:text-green-400">+$89.20</div>
                                </div>
                                <div class="flex justify-between items-center text-sm">
                                    <div>
                                        <div class="text-gray-900 dark:text-white">ADA/USDT</div>
                                        <div class="text-gray-600 dark:text-gray-400 text-xs">1 hour ago</div>
                                    </div>
                                    <div class="text-red-600 dark:text-red-400">-$34.10</div>
                                </div>
                            </div>
                        </div>

                        <!-- Performance Stats -->
                        <div class="bg-gradient-to-r from-yellow-400/10 to-orange-500/10 dark:from-yellow-400/5 dark:to-orange-500/5 rounded-2xl p-6 border border-yellow-400/20 transition-colors duration-300">
                            <h4 class="text-yellow-600 dark:text-yellow-400 font-semibold mb-4">Today's Performance</h4>
                            <div class="space-y-3">
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-700 dark:text-gray-300">Total Profit</span>
                                    <span class="text-green-600 dark:text-green-400 font-bold">+$1,234.56</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-700 dark:text-gray-300">Trades Copied</span>
                                    <span class="text-gray-900 dark:text-white font-bold">12</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-700 dark:text-gray-300">Success Rate</span>
                                    <span class="text-green-600 dark:text-green-400 font-bold">83.3%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <!-- Enhanced Testimonials -->
    {{-- <section class="py-24 bg-white dark:bg-gray-900 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-20">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white mb-6">
                    What Our <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 to-orange-500">Traders Say</span>
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-300 max-w-4xl mx-auto">
                    Join <span class="text-yellow-600 dark:text-yellow-400 font-semibold">thousands of successful traders</span> using BrytCopy
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <div class="group relative bg-gray-50 dark:bg-gray-800/50 backdrop-blur-sm rounded-3xl p-8 border border-gray-200 dark:border-gray-700/50 hover:border-yellow-400/30 transition-all duration-300 hover:transform hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-r from-yellow-400/5 to-orange-500/5 rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="relative z-10">
                        <div class="flex items-center mb-6">
                            <div class="w-16 h-16 bg-gradient-to-r from-yellow-400 to-orange-500 rounded-full flex items-center justify-center text-white font-bold mr-4 text-xl">
                                JD
                            </div>
                            <div>
                                <h4 class="text-xl font-bold text-gray-900 dark:text-white">John Doe</h4>
                                <p class="text-yellow-600 dark:text-yellow-400">Professional Trader</p>
                                <div class="flex mt-2">
                                    <span class="text-yellow-600 dark:text-yellow-400">★★★★★</span>
                                </div>
                            </div>
                        </div>
                        <p class="text-gray-700 dark:text-gray-300 leading-relaxed mb-4">
                            "BrytCopy has completely transformed my trading. The automated copy trading feature saves me hours while delivering consistent 23% monthly returns."
                        </p>
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-gray-600 dark:text-gray-400">Copied 1,247 trades</span>
                            <span class="text-green-600 dark:text-green-400">+$12,456 profit</span>
                        </div>
                    </div>
                </div>

                <div class="group relative bg-gray-50 dark:bg-gray-800/50 backdrop-blur-sm rounded-3xl p-8 border border-gray-200 dark:border-gray-700/50 hover:border-yellow-400/30 transition-all duration-300 hover:transform hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-r from-yellow-400/5 to-orange-500/5 rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="relative z-10">
                        <div class="flex items-center mb-6">
                            <div class="w-16 h-16 bg-gradient-to-r from-yellow-400 to-orange-500 rounded-full flex items-center justify-center text-white font-bold mr-4 text-xl">
                                SM
                            </div>
                            <div>
                                <h4 class="text-xl font-bold text-gray-900 dark:text-white">Sarah Miller</h4>
                                <p class="text-yellow-600 dark:text-yellow-400">Investment Manager</p>
                                <div class="flex mt-2">
                                    <span class="text-yellow-600 dark:text-yellow-400">★★★★★</span>
                                </div>
                            </div>
                        </div>
                        <p class="text-gray-700 dark:text-gray-300 leading-relaxed mb-4">
                            "The risk management features are outstanding. I can copy trades while maintaining full control over my risk parameters. Absolutely game-changing!"
                        </p>
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-gray-600 dark:text-gray-400">Risk level: Low</span>
                            <span class="text-green-600 dark:text-green-400">+18.3% ROI</span>
                        </div>
                    </div>
                </div>

                <div class="group relative bg-gray-50 dark:bg-gray-800/50 backdrop-blur-sm rounded-3xl p-8 border border-gray-200 dark:border-gray-700/50 hover:border-yellow-400/30 transition-all duration-300 hover:transform hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-r from-yellow-400/5 to-orange-500/5 rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="relative z-10">
                        <div class="flex items-center mb-6">
                            <div class="w-16 h-16 bg-gradient-to-r from-yellow-400 to-orange-500 rounded-full flex items-center justify-center text-white font-bold mr-4 text-xl">
                                RK
                            </div>
                            <div>
                                <h4 class="text-xl font-bold text-gray-900 dark:text-white">Robert Kim</h4>
                                <p class="text-yellow-600 dark:text-yellow-400">Day Trader</p>
                                <div class="flex mt-2">
                                    <span class="text-yellow-600 dark:text-yellow-400">★★★★★</span>
                                </div>
                            </div>
                        </div>
                        <p class="text-gray-700 dark:text-gray-300 leading-relaxed mb-4">
                            "I went from losing money to consistent profits in just 2 weeks. The AI-powered risk management is worth every penny."
                        </p>
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-gray-600 dark:text-gray-400">Member since: 3 months</span>
                            <span class="text-green-600 dark:text-green-400">+67% total return</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

                <!-- Final CTA Section -->
    <section class="py-24 bg-white dark:bg-gradient-to-br dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 relative overflow-hidden transition-colors duration-300">
        <!-- Background Effects -->
        <div class="absolute inset-0">
            <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-r from-yellow-400/5 via-transparent to-orange-500/5"></div>
            <div class="absolute top-20 left-20 w-96 h-96 bg-yellow-400/10 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute bottom-20 right-20 w-80 h-80 bg-orange-500/10 rounded-full blur-3xl animate-pulse delay-1000"></div>
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="bg-gray-50 dark:bg-gray-800/50 backdrop-blur-sm rounded-3xl p-12 border border-gray-200 dark:border-gray-700/50 transition-colors duration-300">
                <h2 class="text-4xl md:text-6xl font-bold text-gray-900 dark:text-white mb-6">
                    Ready to <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 to-orange-500">Start Copy Trading</span>?
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-300 mb-8 max-w-3xl mx-auto">
                    Join <span class="text-yellow-600 dark:text-yellow-400 font-semibold">30+ traders</span> who are already profiting from automated copy trading
                </p>
                
                <!-- Trust Badges -->
                <div class="flex justify-center items-center space-x-8 mb-8">
                    <div class="flex items-center space-x-2">
                        <svg class="w-6 h-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                        <span class="text-gray-700 dark:text-gray-300">Bank-Level Security</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <svg class="w-6 h-6 text-yellow-600 dark:text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                        <span class="text-gray-700 dark:text-gray-300">GDPR Compliant</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                        <span class="text-gray-700 dark:text-gray-300">Instant Setup</span>
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row gap-6 justify-center">
                    @guest
                        <a href="{{ route('register') }}" class="group relative bg-gradient-to-r from-yellow-400 to-orange-500 hover:from-yellow-500 hover:to-orange-600 text-white px-12 py-6 rounded-2xl text-xl font-bold transition-all duration-300 transform hover:scale-105 hover:shadow-2xl hover:shadow-yellow-500/25">
                            <span class="relative z-10">Start Today</span>
                            <div class="absolute inset-0 bg-gradient-to-r from-yellow-600 to-orange-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-2xl"></div>
                        </a>
                        <a href="{{ route('login') }}" class="border-2 border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 hover:border-yellow-400 dark:hover:text-yellow-400 px-12 py-6 rounded-2xl text-xl font-semibold transition-all duration-300">
                            Sign In
                        </a>
                    @else
                        <a href="{{ route('dashboard') }}" class="group relative bg-gradient-to-r from-yellow-400 to-orange-500 hover:from-yellow-500 hover:to-orange-600 text-white px-12 py-6 rounded-2xl text-xl font-bold transition-all duration-300 transform hover:scale-105 hover:shadow-2xl hover:shadow-yellow-500/25">
                            <span class="relative z-10">Go to Dashboard</span>
                            <div class="absolute inset-0 bg-gradient-to-r from-yellow-600 to-orange-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-2xl"></div>
                        </a>
                    @endguest
                </div>

                <div class="mt-8 text-gray-600 dark:text-gray-400">
                    <p>No credit card required • Cancel anytime</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Enhanced Footer -->
    <footer class="bg-gray-50 dark:bg-gray-950 border-t border-gray-200 dark:border-gray-800 py-16 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-5 gap-8 mb-12">
                <!-- Brand -->
                <div class="md:col-span-2">
                    <div class="flex items-center space-x-3 mb-6">
                        <div class="w-10 h-10 bg-gradient-to-r from-yellow-400 to-orange-500 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                            </svg>
                        </div>
                        <span class="text-2xl font-bold text-gray-900 dark:text-white">BrytCopyTrading</span>
                    </div>
                    <p class="text-gray-600 dark:text-gray-400 mb-6 leading-relaxed">
                        Professional copy trading platform with <span class="text-yellow-600 dark:text-yellow-400">AI-powered automation</span> for maximum returns.
                    </p>
                    
                    <!-- Social Links -->
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 bg-gray-100 dark:bg-gray-800 rounded-lg flex items-center justify-center text-gray-600 dark:text-gray-400 hover:text-yellow-500 dark:hover:text-yellow-400 hover:bg-gray-200 dark:hover:bg-gray-700 transition-all duration-300">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-100 dark:bg-gray-800 rounded-lg flex items-center justify-center text-gray-600 dark:text-gray-400 hover:text-yellow-500 dark:hover:text-yellow-400 hover:bg-gray-200 dark:hover:bg-gray-700 transition-all duration-300">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-100 dark:bg-gray-800 rounded-lg flex items-center justify-center text-gray-600 dark:text-gray-400 hover:text-yellow-500 dark:hover:text-yellow-400 hover:bg-gray-200 dark:hover:bg-gray-700 transition-all duration-300">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-100 dark:bg-gray-800 rounded-lg flex items-center justify-center text-gray-600 dark:text-gray-400 hover:text-yellow-500 dark:hover:text-yellow-400 hover:bg-gray-200 dark:hover:bg-gray-700 transition-all duration-300">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.174-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.099.12.112.225.085.345-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.402.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.076 2.28-5.892 6.571-5.892 3.439 0 6.116 2.456 6.116 5.731 0 3.424-2.159 6.178-5.159 6.178-1.008 0-1.956-.525-2.281-1.149l-.623 2.378c-.226.869-.835 1.958-1.242 2.621-.937.29-1.931.447-2.96.447-5.521 0-9.99-4.469-9.99-9.989 0-5.52 4.469-9.989 9.99-9.989z"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Product -->
                {{-- <div>
                    <h4 class="text-gray-900 dark:text-white font-semibold mb-6">Product</h4>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-gray-600 dark:text-gray-400 hover:text-yellow-500 dark:hover:text-yellow-400 transition-colors">Features</a></li>
                        <li><a href="#" class="text-gray-600 dark:text-gray-400 hover:text-yellow-500 dark:hover:text-yellow-400 transition-colors">Pricing Plans</a></li>
                        <li><a href="#" class="text-gray-600 dark:text-gray-400 hover:text-yellow-500 dark:hover:text-yellow-400 transition-colors">Security</a></li>
                        <li><a href="#" class="text-gray-600 dark:text-gray-400 hover:text-yellow-500 dark:hover:text-yellow-400 transition-colors">API Documentation</a></li>
                        <li><a href="#" class="text-gray-600 dark:text-gray-400 hover:text-yellow-500 dark:hover:text-yellow-400 transition-colors">Mobile App</a></li>
                    </ul>
                </div>

                <!-- Company -->
                <div>
                    <h4 class="text-gray-900 dark:text-white font-semibold mb-6">Company</h4>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-gray-600 dark:text-gray-400 hover:text-yellow-500 dark:hover:text-yellow-400 transition-colors">About Us</a></li>
                        <li><a href="#" class="text-gray-600 dark:text-gray-400 hover:text-yellow-500 dark:hover:text-yellow-400 transition-colors">Careers</a></li>
                        <li><a href="#" class="text-gray-600 dark:text-gray-400 hover:text-yellow-500 dark:hover:text-yellow-400 transition-colors">Blog</a></li>
                        <li><a href="#" class="text-gray-600 dark:text-gray-400 hover:text-yellow-500 dark:hover:text-yellow-400 transition-colors">Press Kit</a></li>
                        <li><a href="#" class="text-gray-600 dark:text-gray-400 hover:text-yellow-500 dark:hover:text-yellow-400 transition-colors">Contact</a></li>
                    </ul>
                </div>

                <!-- Support -->
                <div>
                    <h4 class="text-gray-900 dark:text-white font-semibold mb-6">Support</h4>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-gray-600 dark:text-gray-400 hover:text-yellow-500 dark:hover:text-yellow-400 transition-colors">Help Center</a></li>
                        <li><a href="#" class="text-gray-600 dark:text-gray-400 hover:text-yellow-500 dark:hover:text-yellow-400 transition-colors">Community</a></li>
                        <li><a href="#" class="text-gray-600 dark:text-gray-400 hover:text-yellow-500 dark:hover:text-yellow-400 transition-colors">Terms of Service</a></li>
                        <li><a href="#" class="text-gray-600 dark:text-gray-400 hover:text-yellow-500 dark:hover:text-yellow-400 transition-colors">Privacy Policy</a></li>
                        <li><a href="#" class="text-gray-600 dark:text-gray-400 hover:text-yellow-500 dark:hover:text-yellow-400 transition-colors">Status Page</a></li>
                    </ul>
                </div> --}}
            </div>

            <!-- Bottom Bar -->
            <div class="border-t border-gray-200 dark:border-gray-800 pt-8">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <div class="text-gray-600 dark:text-gray-400 mb-4 md:mb-0">
                        © {{date('Y')}} BrytCopyTrading. All rights reserved.
                    </div>
                    <div class="flex items-center space-x-6 text-gray-600 dark:text-gray-400">
                        <div class="flex items-center space-x-2">
                            <svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="text-sm">SSL Secured</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                            <span class="text-sm">GDPR Compliant</span>
                        </div>
                        <div class="text-sm">
                            Available in 150+ countries
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- WhatsApp Floating Button -->
    <a href="https://wa.me/256752525709" class="whatsapp-float" target="_blank" style="position: fixed; bottom: 50px; right: 20px; background-color: #25d3b3; color: #FFF; border-radius: 50px; text-align: center; font-size: 30px; box-shadow: 2px 2px 3px #999; z-index: 1000; width: 60px; height: 60px; display: flex; align-items: center; justify-content: center; text-decoration: none;">
      <svg width="30" height="30" viewBox="0 0 24 24" fill="currentColor">
        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.149-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414-.074-.123-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
      </svg>
    </a>

    <script>
        // Dark mode toggle
        function toggleDarkMode() {
            const html = document.documentElement;
            const isDark = html.classList.toggle('dark');
            localStorage.setItem('darkMode', isDark);
        }

        // Initialize dark mode from localStorage or system preference
        function initializeDarkMode() {
            const html = document.documentElement;
            const storedPreference = localStorage.getItem('darkMode');
            
            if (storedPreference === 'true') {
                html.classList.add('dark');
            } else if (storedPreference === 'false') {
                html.classList.remove('dark');
            } else {
                // Use system preference if no stored preference
                const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
                html.classList.toggle('dark', prefersDark);
            }
        }

        // Initialize on page load
        initializeDarkMode();

        // Listen for system theme changes
        window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', (e) => {
            if (localStorage.getItem('darkMode') === null) {
                document.documentElement.classList.toggle('dark', e.matches);
            }
        });

        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth' });
                }
            });
        });

        // Add scroll animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        // Observe all sections
        document.querySelectorAll('section').forEach(section => {
            section.style.opacity = '0';
            section.style.transform = 'translateY(20px)';
            section.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            observer.observe(section);
        });
    </script>
</body>
</html>


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
</body>
</html>

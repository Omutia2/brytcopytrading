<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/dashboard.js'])
    </head>
    <body class="font-sans antialiased h-full bg-gray-100 dark:bg-gray-900">
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute top-20 left-10 w-72 h-72 bg-yellow-400/5 dark:bg-yellow-400/3 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute top-40 right-20 w-96 h-96 bg-orange-500/5 dark:bg-orange-500/3 rounded-full blur-3xl animate-pulse delay-1000"></div>
            <div class="absolute bottom-20 left-1/2 w-80 h-80 bg-yellow-400/5 dark:bg-yellow-400/3 rounded-full blur-3xl animate-pulse delay-2000"></div>
        </div>
        
        <div id="app" class="relative min-h-screen h-full flex">
            <!-- Mobile Menu Button -->
            <div class="lg:hidden fixed top-4 left-3 z-50">
                <button onclick="toggleSidebar()" class="p-2 rounded-lg bg-white dark:bg-gray-800 shadow-lg border border-gray-200 dark:border-gray-700 text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 transition-colors">
                    <svg id="menu-icon" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                    <p id="close-icon" style="display: none;">
                        {{-- <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path> --}}
                    </p>
                </button>
            </div>

            <!-- Sidebar -->
            <aside id="sidebar" class="fixed inset-y-0 left-0 w-64 bg-white dark:bg-gray-800 shadow-lg border-r border-gray-200 dark:border-gray-700 transform -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out z-40 lg:static lg:inset-auto lg:transform-none">
                <x-sidebar />
            </aside>

            <!-- Mobile Overlay -->
            <div id="sidebar-overlay" onclick="toggleSidebar()" class="fixed inset-0 bg-black/50 z-30 lg:hidden hidden"></div>

            <!-- Main Content -->
            <div class="flex-1 flex flex-col lg:ml-0 min-w-0">
                <!-- Navbar -->
                <x-navbar />

                <!-- Dashboard Content -->
                <main class="flex-1 p-4 sm:p-6 overflow-y-auto">
                    <div class="max-w-12xl mx-auto">
                        @yield('content')
                    </div>
                </main>
            </div>
        </div>

        <!-- Dark Mode Toggle Script -->
        <script>
            // Initialize dark mode from localStorage or system preference
            if (localStorage.getItem('darkMode') === 'true' || 
                (!localStorage.getItem('darkMode') && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark');
            }

            // Dark mode toggle function
            function toggleDarkMode() {
                document.documentElement.classList.toggle('dark');
                localStorage.setItem('darkMode', document.documentElement.classList.contains('dark'));
            }

            // Sidebar toggle function
            function toggleSidebar() {
                const sidebar = document.getElementById('sidebar');
                const overlay = document.getElementById('sidebar-overlay');
                const menuIcon = document.getElementById('menu-icon');
                const closeIcon = document.getElementById('close-icon');
                 
                sidebar.classList.toggle('-translate-x-full');
                sidebar.classList.toggle('translate-x-0');
                overlay.classList.toggle('hidden');
                
                // Toggle icons - hide hamburger when sidebar opens
                menuIcon.classList.toggle('hidden');
                closeIcon.classList.toggle('hidden');
            }
        </script>
    </body>
</html>

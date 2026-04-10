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

        <!-- WhatsApp Floating Button -->
    <a href="https://wa.me/256752525709" class="whatsapp-float" target="_blank" style="position: fixed; bottom: 50px; right: 20px; background-color: #25d3b3; color: #FFF; border-radius: 50px; text-align: center; font-size: 30px; box-shadow: 2px 2px 3px #999; z-index: 1000; width: 60px; height: 60px; display: flex; align-items: center; justify-content: center; text-decoration: none;">
      <svg width="30" height="30" viewBox="0 0 24 24" fill="currentColor">
        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.149-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414-.074-.123-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
      </svg>
    </a>
    </body>
</html>

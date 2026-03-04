<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'BBPOM Pontianak') }}</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('images/logo-bpom.png') }}" type="image/png">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="font-sans bg-gray-50 text-gray-900">
    <!-- Top Bar -->
    <div class="bg-navy text-white py-2">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center text-sm">
                <div class="flex items-center space-x-4">
                    <span>🕒 Office Hours: Mon-Fri 8:00 AM - 4:00 PM</span>
                </div>
                <div class="flex items-center space-x-4">
                    <span>📞 Contact: (0561) 123-4567</span>
                    <span>✉️ info@bbpom-pontianak.go.id</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Sticky Navbar -->
    <nav class="bg-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo Placeholder -->
                <div class="flex-shrink-0">
                    <div class="bg-navy text-white px-4 py-2 rounded font-bold text-lg">
                        BBPOM Pontianak
                    </div>
                </div>

                <!-- Navigation Links -->
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <a href="{{ url('/') }}" class="text-gray-900 hover:text-navy px-3 py-2 rounded-md text-sm font-medium transition duration-150">Beranda</a>
                        <a href="#" class="text-gray-900 hover:text-navy px-3 py-2 rounded-md text-sm font-medium transition duration-150">Tracking</a>
                        <a href="#" class="text-gray-900 hover:text-navy px-3 py-2 rounded-md text-sm font-medium transition duration-150">Tentang</a>
                    </div>
                </div>

                <!-- Mobile menu button -->
                <div class="md:hidden">
                    <button type="button" class="bg-navy inline-flex items-center justify-center p-2 rounded-md text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu -->
        <div class="md:hidden" id="mobile-menu">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3 bg-gray-50">
                <a href="#" class="text-gray-900 hover:text-navy block px-3 py-2 rounded-md text-base font-medium">Home</a>
                <a href="#" class="text-gray-900 hover:text-navy block px-3 py-2 rounded-md text-base font-medium">Services</a>
                <a href="#" class="text-gray-900 hover:text-navy block px-3 py-2 rounded-md text-base font-medium">Tracking</a>
                <a href="#" class="text-gray-900 hover:text-navy block px-3 py-2 rounded-md text-base font-medium">About</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="flex-1">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-navy text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Address -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">Address</h3>
                    <p class="text-sm">
                        Badan Pengawas Obat dan Makanan<br>
                        Pontianak, Kalimantan Barat<br>
                        Indonesia
                    </p>
                </div>

                <!-- Quick Links -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="hover:text-gray-300 transition duration-150">Home</a></li>
                        <li><a href="#" class="hover:text-gray-300 transition duration-150">Services</a></li>
                        <li><a href="#" class="hover:text-gray-300 transition duration-150">Tracking</a></li>
                        <li><a href="#" class="hover:text-gray-300 transition duration-150">About</a></li>
                        <li><a href="#" class="hover:text-gray-300 transition duration-150">Contact</a></li>
                    </ul>
                </div>

                <!-- Social Media -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">Social Media</h3>
                    <div class="flex space-x-4">
                        <a href="#" class="text-white hover:text-gray-300 transition duration-150">
                            <span class="sr-only">Facebook</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                        </a>
                        <a href="#" class="text-white hover:text-gray-300 transition duration-150">
                            <span class="sr-only">Twitter</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                            </svg>
                        </a>
                        <a href="#" class="text-white hover:text-gray-300 transition duration-150">
                            <span class="sr-only">Instagram</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12.017 0C8.396 0 7.996.014 6.79.067 5.584.12 4.775.302 4.082.566c-.726.282-1.34.639-1.955 1.254C1.512 2.435 1.155 3.05.873 3.776c-.264.693-.446 1.502-.5 2.708C.314 7.69.3 8.09.3 11.711c0 3.621.014 4.021.067 5.227.054 1.206.236 2.015.5 2.708.218.726.575 1.34 1.19 1.955.615.615 1.23.972 1.955 1.254.693.264 1.502.446 2.708.5C7.996 23.686 8.396 23.7 12.017 23.7c3.621 0 4.021-.014 5.227-.067 1.206-.054 2.015-.236 2.708-.5.726-.282 1.34-.639 1.955-1.254.615-.615.972-1.23 1.254-1.955.264-.693.446-1.502.5-2.708.053-1.206.067-1.606.067-5.227 0-3.621-.014-4.021-.067-5.227-.054-1.206-.236-2.015-.5-2.708-.282-.726-.639-1.34-1.254-1.955-.615-.615-1.23-.972-1.955-1.254-.693-.264-1.502-.446-2.708-.5C16.038.314 15.638.3 12.017.3c-3.621 0-4.021.014-5.227.067-1.206.054-2.015.236-2.708.5-.726.282-1.34.639-1.955 1.254C1.512 2.435 1.155 3.05.873 3.776c-.264.693-.446 1.502-.5 2.708C.314 7.69.3 8.09.3 11.711c0 3.621.014 4.021.067 5.227.054 1.206.236 2.015.5 2.708.218.726.575 1.34 1.19 1.955.615.615 1.23.972 1.955 1.254.693.264 1.502.446 2.708.5C7.996 23.686 8.396 23.7 12.017 23.7c3.621 0 4.021-.014 5.227-.067 1.206-.054 2.015-.236 2.708-.5.726-.282 1.34-.639 1.955-1.254.615-.615.972-1.23 1.254-1.955.264-.693.446-1.502.5-2.708.053-1.206.067-1.606.067-5.227 0-3.621-.014-4.021-.067-5.227-.054-1.206-.236-2.015-.5-2.708-.282-.726-.639-1.34-1.254-1.955-.615-.615-1.23-.972-1.955-1.254-.693-.264-1.502-.446-2.708-.5C16.038.314 15.638.3 12.017.3zM12.017 5.838a6.163 6.163 0 100 12.326 6.163 6.163 0 000-12.326zM12.017 16.889a4.722 4.722 0 110-9.444 4.722 4.722 0 010 9.444zM19.63 5.196a1.44 1.44 0 11-2.88 0 1.44 1.44 0 012.88 0z"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Google Maps Placeholder -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">Location</h3>
                    <div class="bg-gray-300 h-32 rounded flex items-center justify-center text-gray-600">
                        <span>Google Maps Embed Placeholder</span>
                    </div>
                </div>
            </div>

            <div class="mt-8 pt-8 border-t border-gray-700 text-center text-sm">
                <p>&copy; 2025 BBPOM Pontianak. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>

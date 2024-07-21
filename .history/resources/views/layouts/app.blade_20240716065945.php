<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $metaTitle ?: 'The Nashihun Blog' }}</title>
    <meta name="author" content="TheNashihunBlog">
    <meta name="description" content="{{ $metaDescription }}">
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('head')
</head>

<body class="bg-gray-50 font-family-karla">
    <header>
        <div class="container hidden px-6 py-8 mx-auto sm:block">
            <div class="flex flex-col">
                <a href="{{ route('home') }}" class="flex text-4xl font-bold">
                    <h1>KalibawangMu</h1>
                    <img src="path/to/logo.png" alt="Brand Logo" class="w-8 h-8 mr-2">
                </a>
                <p>Media Resmi PCM Dekso Kapanewon Kalibawang</p>
            </div>
        </div>
    </header>

    <!-- Topic Nav -->
    <nav class="w-full text-white shadow-lg bg-gradient-to-r from-blue-950 via-blue-950 to-green-800"
        x-data="{ openMobileMenu: false }">
        <div class="container flex items-center justify-between px-6 py-4 mx-auto">
            <!-- Hamburger Menu for Mobile -->
            <button @click="openMobileMenu = !openMobileMenu" class="focus:outline-none md:hidden">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path :class="{ 'hidden': openMobileMenu, 'block': !openMobileMenu }" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                    <path :class="{ 'block': openMobileMenu, 'hidden': !openMobileMenu }" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>

            <!-- Logo and Title -->
            <div class="flex flex-col items-start sm:flex-row sm:space-x-4">
                <a href="{{ route('home') }}" class="flex items-center text-xl font-bold md:text-base">
                    <h1 class="block mr-2 md:hidden">KalibawangMu</h1>
                </a>
                <p class="block text-sm md:text-base md:hidden">Media Resmi PCM Dekso Kapanewon Kalibawang</p>
            </div>

            <!-- Navigation Links for Desktop -->
            <div class="items-center hidden py-2 space-x-1 md:flex">
                <div class="flex items-center justify-center ">
                    <a href="{{ route('home') }}"
                        class="px-2 py-2 transition transform rounded-md shadow-lg hover:bg-white hover:text-blue-900 hover:font-semibold hover:scale-105">Home</a>
                    @foreach ($categories as $category)
                        <a href="{{ route('by-category', $category) }}"
                            class="px-2 py-2 transition transform rounded-md shadow-lg hover:bg-white hover:text-blue-900 hover:font-semibold hover:scale-105">{{ $category->title }}</a>
                    @endforeach
                    <a href="{{ route('about-us') }}"
                        class="px-2 py-2 transition transform rounded-md shadow-lg hover:bg-white hover:text-blue-900 hover:font-semibold hover:scale-105">About
                        Us</a>
                </div>
                <div class="flex items-center space-x-2">
                    <a href="{{ route('login') }}"
                        class="block px-2 py-2 font-semibold text-blue-100 transition rounded-md hover:bg-white hover:text-blue-900">Login</a>
                    <a href="{{ route('register') }}"
                        class="block px-2 py-2 font-semibold text-blue-100 transition rounded-md hover:bg-white hover:text-blue-900">Register</a>
                </div>
            </div>

        </div>

        <!-- Mobile Menu -->
        <div class="container mx-auto">
            <!-- Overlay for Mobile Menu -->
            <div x-show="openMobileMenu" @click="openMobileMenu = false"
                x-transition:enter="transition ease-out duration-300"
                x-transition:leave="transition ease-in duration-300"
                class="fixed inset-0 z-20 bg-black bg-opacity-50 md:hidden"></div>

            <!-- Mobile Navigation Links -->
            <div x-show="openMobileMenu" x-transition:enter="transition ease-out duration-300"
                x-transition:leave="transition ease-in duration-300"
                class="fixed inset-y-0 left-0 z-30 w-3/4 h-full p-6 bg-gradient-to-r from-blue-950 via-blue-950 to-green-900 md:hidden">
                <!-- Close Button -->
                <button @click="openMobileMenu = false" class="mb-4 text-blue-100 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>

                <!-- Search Bar -->
                <div class="mb-6">
                    <input type="text" placeholder="Search..."
                        class="w-full px-4 py-2 rounded-md text-blue-950 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                </div>

                <!-- Navigation Links For Mobile -->
                <div class="space-y-4">
                    <a href="{{ route('home') }}"
                        class="block px-4 py-2 font-semibold text-blue-100 transition rounded-md hover:bg-white hover:text-blue-900">Home</a>
                    @foreach ($categories as $category)
                        <a href="{{ route('by-category', $category) }}"
                            class="block px-4 py-2 font-semibold text-blue-100 transition rounded-md hover:bg-white hover:text-blue-900">{{ $category->title }}</a>
                    @endforeach
                    <a href="{{ route('about-us') }}"
                        class="block px-4 py-2 font-semibold text-blue-100 transition rounded-md hover:bg-white hover:text-blue-900">About
                        Us</a>
                    <div>
                        <a href="{{ route('login') }}"
                            class="block px-4 py-2 font-semibold text-blue-100 transition rounded-md hover:bg-white hover:text-blue-900">Login</a>
                        <a href="{{ route('register') }}"
                            class="block px-4 py-2 font-semibold text-blue-100 transition rounded-md hover:bg-white hover:text-blue-900">Register</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>


    <div class="container py-6 mx-auto mt-8">
        {{ $slot }}
    </div>

    <footer class="w-full pb-12 bg-white border-t">
        <div class="container flex flex-col items-center w-full mx-auto">
            <div class="py-6 uppercase">&copy; myblog.com</div>
        </div>
    </footer>

    @livewireScripts
    @stack('scripts')
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.x.x/dist/alpine.min.js" defer></script>
</body>

</html>

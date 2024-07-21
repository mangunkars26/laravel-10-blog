<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $metaTitle ?: 'TheCodeholic Blog' }}</title>
    <meta name="author" content="TheCodeholic">
    <meta name="description" content="{{ $metaDescription }}">

    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');
    </style>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
    @livewireStyles

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-200">
    <!-- Topbar -->
    <div class="w-full py-0 bg-gray-100 text-xs flex items-center justify-between px-4">
        <!-- Hijri Date -->
        <div id="hijri-date" class="flex items-center">
            <!-- Hijri date will be inserted here -->
        </div>

        <!-- Social Media Icons -->
        <div class="flex space-x-4 justify-end items-end text-white">
            <a href="https://facebook.com" target="_blank" fill="current" class="text-gray-600 text-base ">
                <i class="fab fa-facebook-square"></i>
            </a>
            <a href="https://instagram.com" target="_blank" fill="current" class="text-gray-600 text-base ">
                <i class="fab fa-instagram"></i>
            </a>
            <a href="https://youtube.com" target="_blank" fill="current" class="text-gray-600 text-base ">
                <i class="fab fa-youtube"></i>
            </a>
        </div>

        <!-- Admin Icon -->
        <div class="flex justify-end items-end">
            @auth
            <!-- Settings Dropdown -->
            <div class="text-gray-400 hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">

                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-100 bg-green-850 focus:outline-none transition ease-in-out duration-150">
                            <div class="mx-2 text-gray-400">
                                <i class="fas fa-user"></i>
                            </div>
                            <div class="text-gray-400">{{ Auth::user()->name }}</div>

                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                    this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
            @else
            <a href="{{ route('login') }}" class="hover:bg-white hover:text-blue-900 hover:font-semibold rounded py-2 px-4 mx-2">Login</a>
            @endauth
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize hijri-date using AlAdhan API or any other Hijri date library
            const hijriDateElement = document.getElementById('hijri-date');

            // Using an example date (you can replace this with dynamic date fetching)
            const exampleHijriDate = "10 Dhul-Hijjah 1443 AH"; // Example date
            const exampleDay = "Friday"; // Example day

            hijriDateElement.textContent = `${exampleDay}, ${exampleHijriDate}`;
        });
    </script>
    <nav class="w-full py-0 shadow-lg bg-gradient-to-r from-blue-950 via-blue-950 to-green-800" x-data="{ openMobileMenu: false, showSearch: false }">
        <div class="w-full container mx-auto flex flex-wrap items-center justify-between text-sm mt-0 px-4 py-2">
            <!-- Logo and Title -->
            <div class="flex items-center">
                <!-- Hamburger Menu for Mobile -->
                <button @click="openMobileMenu = !openMobileMenu" class="focus:outline-none md:hidden text-base text-white mr-2">
                    <i class="fas fa-bars"></i>
                </button>
                <a href="{{ route('home') }}" class="text-xl font-bold text-white">
                    <span class="ml-2">Kalibawang Mu</span>
                </a>
            </div>

            <!-- Search Icon for mobile and desktop -->
            <div class="flex items-center ml-auto">
                <button @click="showSearch = !showSearch" class="text-white text-base focus:outline-none md:ml-4">
                    <i class="fas fa-search"></i>
                </button>
            </div>

            <!-- Navigation Links for Desktop -->
            <div class="hidden md:flex items-center space-x-4 text-white uppercase ml-4">
                <a href="{{ route('home') }}" class="px-2 py-2 transition transform rounded-md hover:bg-white hover:text-blue-900 hover:font-semibold">Home</a>
                @foreach ($categories as $category)
                <a href="{{ route('by-category', $category) }}" class="px-2 py-2 transition transform rounded-md hover:bg-white hover:text-blue-900 hover:font-semibold">{{ $category->title }}</a>
                @endforeach
                <a href="{{ route('about-us') }}" class="px-2 py-2 transition transform rounded-md hover:bg-white hover:text-blue-900 hover:font-semibold">About
                    Us</a>
            </div>
        </div>

        <!-- Search Bar for Mobile and Desktop -->
        <div x-show="showSearch" @click.away="showSearch = false" class="absolute inset-x-0 top-16 p-4 flex items-center justify-center md:justify-end" x-cloak>
            <div class="flex items-center w-full max-w-4xl">
                <input type="text" placeholder="Cari..." class="w-full p-2 border text-gray-700 border-gray-300 rounded-sm focus:outline-none focus:ring-1 focus:ring-blue-500">
                <button @click="showSearch = false" class="ml-2 focus:outline-none">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div class="container mx-auto md:hidden">
            <!-- Overlay for Mobile Menu -->
            <div x-show="openMobileMenu" @click="openMobileMenu = false" x-transition:enter="transition ease-out duration-300" x-transition:leave="transition ease-in duration-300" class="fixed inset-0 z-20 bg-black bg-opacity-50">
            </div>

            <!-- Mobile Navigation Links -->
            <div x-show="openMobileMenu" x-transition:enter="transition ease-out duration-300" x-transition:leave="transition ease-in duration-300" class="fixed inset-y-0 left-0 z-30 w-1/2 h-full p-2 bg-gray-200">
                <!-- Close Button -->
                <button @click="openMobileMenu = false" class="mb-4 text-blue-900 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
                <!-- Navigation Links For Mobile -->
                <div class="space-y-4">
                    <a href="{{ route('home') }}" class="block px-4 py-2 font-semibold text-gray-600 transition rounded-md hover:bg-white hover:text-gray-900">Home</a>
                    @foreach ($categories as $category)
                    <a href="{{ route('by-category', $category) }}" class="block px-4 py-2 font-semibold text-gray-600 transition rounded-md hover:bg-white hover:text-gray-900">{{ $category->title }}</a>
                    @endforeach
                    <a href="{{ route('about-us') }}" class="block px-4 py-2 font-semibold text-gray-600 transition rounded-md hover:bg-white hover:text-gray-900">About
                        Us</a>
                </div>
                <div class="container mx-auto px-4 flex flex-shrink">
                    @auth
                    <div class="flex sm:items-center sm:ml-6">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button class="hover:bg-blue-600 hover:text-white flex items-center rounded py-2 px-4 mx-2">
                                    <div>{{ Auth::user()->name }}</div>
                                    <div class="ml-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a 1 0 01-1.414 0l-4-4a 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>
                            <x-slot name="content">
                                <x-dropdown-link :href="route('profile.edit')">
                                    {{ __('Profile') }}
                                </x-dropdown-link>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                    @else
                    <a href="{{ route('login') }}" class="text-gray-700 text-sm rounded py-2 px-4 mx-2">Login</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <div class="container mx-auto py-6">

        {{ $slot }}

    </div>

    <footer class="w-full border-t bg-white pb-12">
        <div class="w-full container mx-auto flex flex-col items-center">
            <div class="uppercase py-6">
                &copy;
                myblog.com
            </div>
        </div>
    </footer>

    @livewireScripts
</body>

</html>
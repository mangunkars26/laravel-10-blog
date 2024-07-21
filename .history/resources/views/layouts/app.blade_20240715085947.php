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
</head>

<body class="bg-gray-50 font-family-karla">
    {{-- <!-- Enhanced Text Header -->
    <header class="bg-white">
        <div class="container px-6 py-6 mx-auto">
            <div class="text-left">
                <a href="{{ route('home') }}"
                    class="text-5xl font-bold text-blue-900 uppercase transition duration-300">
                    KalibawangMu
                </a>
                <p class="mt-4 text-lg text-white">
                    {{ \App\Models\TextWidget::getTitle('header') }}
                </p>
            </div>
        </div>
    </header> --}}

    <!-- Topic Nav -->
    <!-- Navbar with Alpine.js for mobile dropdown -->
    <nav class="fixed top-0 left-0 z-10 w-full text-white shadow-lg bg-gradient-to-r from-blue-900 via-blue-700 to-green-600"
        x-data="{ openMobileMenu: false }">
        <div class="container px-6 py-8 mx-auto fixed-top">
            <div class="flex items-center justify-between">
                <!-- Brand Logo and Name -->
                <div class="flex flex-col ">
                    <a href="{{ route('home') }}" class="flex items-center text-4xl font-bold">
                        <h1>KalibawangMu</h1>
                        {{-- <img src="path/to/logo.png" alt="Brand Logo" class="w-8 h-8 mr-2"> --}}
                    </a>
                    <p>Media Resmi PCM Dekso Kapanewon Kalibawang</p>
                </div>
                <!-- Navigation Links for Desktop -->
                <div class="hidden space-x-6 md:flex">
                    <a href="{{ route('home') }}"
                        class="px-4 py-2 transition duration-300 rounded-md hover:bg-white hover:text-blue-900 hover:font-semibold">Home</a>
                    @foreach ($categories as $category)
                        <a href="{{ route('by-category', $category) }}"
                            class="px-4 py-2 transition duration-300 rounded-md hover:bg-white hover:text-blue-900 hover:font-semibold">{{ $category->title }}</a>
                    @endforeach
                    <a href="{{ route('about-us') }}"
                        class="px-4 py-2 transition duration-300 rounded-md hover:bg-white hover:text-blue-900 hover:font-semibold">About
                        Us</a>
                </div>
                <!-- Hamburger Menu for Mobile -->
                <div class="flex md:hidden">
                    <button @click="openMobileMenu = !openMobileMenu" class="focus:outline-none">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path :class="{ 'hidden': openMobileMenu, 'block': !openMobileMenu }" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                            <path :class="{ 'block': openMobileMenu, 'hidden': !openMobileMenu }" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>
            <!-- Mobile Navigation Links -->
            <div x-show="openMobileMenu" class="mt-4 md:hidden">
                <a href="{{ route('home') }}"
                    class="relative inline-block px-4 py-2 font-semibold text-blue-900 transition duration-300 rounded-md hover:text-lg hover:font-semibold">
                    Home
                    <span class="absolute inset-0 transition-opacity bg-white opacity-0 hover:opacity-100"></span>
                </a>

                @foreach ($categories as $category)
                    <a href="{{ route('by-category', $category) }}"
                        class="block px-4 py-2 font-semibold transition duration-300 rounded-md hover:bg-white hover:text-blue-900 hover:text-lg hover:font-semibold">About
                @endforeach
                <a href="{{ route('about-us') }}"
                    class="block px-4 py-2 font-semibold transition duration-300 rounded-md hover:bg-white hover:text-blue-900 hover:text-lg hover:font-semibold">About
                    Us</a>
            </div>
        </div>
    </nav>

    <!-- Include Alpine.js -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.x.x/dist/alpine.min.js" defer></script>



    <div class="container py-6 mx-auto">

        {{ $slot }}

    </div>

    <footer class="w-full pb-12 bg-white border-t">
        <div class="container flex flex-col items-center w-full mx-auto">
            <div class="py-6 uppercase">&copy; myblog.com</div>
        </div>
    </footer>

    @livewireScripts
</body>
<script src="https://cdn.jsdelivr.net/npm/alpinejs@2.x.x/dist/alpine.min.js" defer></script>


</html>

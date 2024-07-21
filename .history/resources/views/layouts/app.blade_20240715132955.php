<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $metaTitle ?: 'The Nashihun Blog' }}</title>
    <meta name="author" content="TheNashihunBlog">
    <meta name="description" content="{{ $metaDescription }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 font-family-karla">
    <header>
        <div class="container justify-center hidden px-6 py-8 mx-auto lg:py-10 sm:block">
            <div class="flex flex-col">
                <a href="{{ route('home') }}" class="flex items-center text-4xl font-bold">
                    <h1 class="mr-2">KalibawangMu</h1>
                    <img src="path/to/logo.png" alt="Brand Logo" class="w-8 h-8">
                </a>
                <p class="text-sm">Media Resmi PCM Dekso Kapanewon Kalibawang</p>
            </div>
        </div>
    </header>
    <nav class="left-0 z-10 w-full text-white shadow-lg bg-gradient-to-r from-blue-950 via-blue-950 to-green-800"
        x-data="{ openMobileMenu: false }">
        <div class="container px-6 py-4 mx-auto">
            <div class="flex items-center justify-between">
                <!-- Hamburger Menu for Mobile -->
                <button @click="openMobileMenu = !openMobileMenu" class="flex focus:outline-none sm:hidden">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path :class="{ 'hidden': openMobileMenu, 'block': !openMobileMenu }" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                        <path :class="{ 'block': openMobileMenu, 'hidden': !openMobileMenu }" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
                <a href="{{ route('home') }}" class="flex items-center text-xl font-bold">
                    <h1 class="mr-2">KalibawangMu</h1>
                </a>
                <div class="items-center hidden space-x-6 md:flex">
                    <a href="{{ route('home') }}" class="nav-link">Home</a>
                    @foreach ($categories as $category)
                        <a href="{{ route('by-category', $category) }}" class="nav-link">{{ $category->title }}</a>
                    @endforeach
                    <a href="{{ route('about-us') }}" class="nav-link">About Us</a>
                </div>
            </div>
        </div>
        <!-- Mobile Menu -->
        <div class="container mx-auto">
            <div x-show="openMobileMenu" @click="openMobileMenu = false"
                class="fixed inset-0 z-20 bg-black bg-opacity-50 md:hidden"></div>
            <div x-show="openMobileMenu"
                class="fixed inset-y-0 left-0 z-30 w-3/4 p-6 bg-gradient-to-r from-blue-950 via-blue-950 to-green-900 md:hidden">
                <button @click="openMobileMenu = false" class="mb-4 text-blue-100 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
                <input type="text" placeholder="Search..."
                    class="w-full px-4 py-2 rounded-md text-blue-950 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <div class="space-y-4">
                    <a href="{{ route('home') }}" class="block nav-link">Home</a>
                    @foreach ($categories as $category)
                        <a href="{{ route('by-category', $category) }}"
                            class="block nav-link">{{ $category->title }}</a>
                    @endforeach
                    <a href="{{ route('about-us') }}" class="block nav-link">About Us</a>
                </div>
            </div>
        </div>
    </nav>
    <div class="container py-6 mx-auto mt-12">
        {{ $slot }}
    </div>
    <footer class="w-full pb-12 bg-white border-t">
        <div class="container flex items-center justify-center w-full py-6 mx-auto">
            <div class="uppercase">&copy; myblog.com</div>
        </div>
    </footer>
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.x.x/dist/alpine.min.js" defer></script>
</body>

</html>

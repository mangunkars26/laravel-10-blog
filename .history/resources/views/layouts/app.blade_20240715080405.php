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
    <!-- Text Header -->
    <header class="container w-full p-4 mx-auto">
        <div class="flex flex-col items-center py-12">
            <a class="text-5xl font-bold text-gray-800 uppercase hover:text-gray-700" href="{{ route('home') }}">
                KalibawangMu
            </a>
            <p class="text-lg text-gray-600">
                {{ \App\Models\TextWidget::getTitle('header') }}
            </p>
        </div>
    </header>
    <!-- Topic Nav -->
    <nav class="bg-gradient-to-r from-blue-500 to-purple-600 text-white shadow-lg">
        <div class="container mx-auto px-6 py-3">
            <div class="flex items-center justify-between">
                <!-- Brand Logo and Name -->
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="text-2xl font-bold flex items-center">
                        <img src="path/to/logo.png" alt="Brand Logo" class="w-8 h-8 mr-2">
                        BrandName
                    </a>
                </div>
                <!-- Navigation Links for Desktop -->
                <div class="hidden md:flex space-x-6">
                    <a href="{{ route('home') }}"
                        class="px-4 py-2 rounded-md hover:bg-white hover:text-blue-500 transition duration-300">Home</a>
                    @foreach ($categories as $category)
                        <a href="{{ route('by-category', $category) }}"
                            class="px-4 py-2 rounded-md hover:bg-white hover:text-blue-500 transition duration-300">{{ $category->title }}</a>
                    @endforeach
                    <a href="{{ route('about-us') }}"
                        class="px-4 py-2 rounded-md hover:bg-white hover:text-blue-500 transition duration-300">About
                        Us</a>
                </div>
                <!-- Hamburger Menu for Mobile -->
                <div class="flex md:hidden">
                    <button @click="open = !open" class="focus:outline-none">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path :class="open ? 'hidden' : 'block'" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                            <path :class="open ? 'block' : 'hidden'" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>
            <!-- Mobile Navigation Links -->
            <div :class="open ? 'block' : 'hidden'" class="md:hidden mt-4">
                <a href="{{ route('home') }}"
                    class="block px-4 py-2 rounded-md hover:bg-white hover:text-blue-500 transition duration-300">Home</a>
                @foreach ($categories as $category)
                    <a href="{{ route('by-category', $category) }}"
                        class="block px-4 py-2 rounded-md hover:bg-white hover:text-blue-500 transition duration-300">{{ $category->title }}</a>
                @endforeach
                <a href="{{ route('about-us') }}"
                    class="block px-4 py-2 rounded-md hover:bg-white hover:text-blue-500 transition duration-300">About
                    Us</a>
            </div>
        </div>
    </nav>



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
<script></script>

</html>

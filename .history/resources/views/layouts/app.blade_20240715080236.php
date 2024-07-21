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
    <nav class="bg-white shadow-lg">
        <div class="container mx-auto px-6 py-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <a href="{{ route('home') }}"
                        class="text-xl font-bold text-gray-800 hover:text-gray-700">BrandName</a>
                </div>
                <div class="hidden md:flex space-x-4">
                    <a href="{{ route('home') }}"
                        class="px-4 py-2 rounded text-gray-700 hover:bg-blue-600 hover:text-white transition duration-300">Home</a>
                    @foreach ($categories as $category)
                        <a href="{{ route('by-category', $category) }}"
                            class="px-4 py-2 rounded text-gray-700 hover:bg-blue-600 hover:text-white transition duration-300">{{ $category->title }}</a>
                    @endforeach
                    <a href="{{ route('about-us') }}"
                        class="px-4 py-2 rounded text-gray-700 hover:bg-blue-600 hover:text-white transition duration-300">About
                        Us</a>
                </div>
                <div class="flex md:hidden">
                    <button @click="open = !open" class="text-gray-700 focus:outline-none">
                        <svg class="w-6 h-6" fill="none" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                            <path x-show="!open" d="M4 6h16M4 12h16m-7 6h7"></path>
                            <path x-show="open" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>
            <div x-show="open" class="md:hidden">
                <a href="{{ route('home') }}"
                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-600 hover:text-white transition duration-300">Home</a>
                @foreach ($categories as $category)
                    <a href="{{ route('by-category', $category) }}"
                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-600 hover:text-white transition duration-300">{{ $category->title }}</a>
                @endforeach
                <a href="{{ route('about-us') }}"
                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-600 hover:text-white transition duration-300">About
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

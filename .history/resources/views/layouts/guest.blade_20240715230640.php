<x-app-layout>
    <div class="flex flex-col items-center min-h-screen pt-6 bg-gray-100 sm:pt-0 sm:justify-center">

        <div>

        </div>

        <div class="w-full px-6 py-4 mt-6 overflow-hidden bg-white shadow-md sm:max-w-md sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>

</x-app-layout>

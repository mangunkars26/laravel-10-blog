<!-- home.blade.php -->
<x-app-layout :meta-title="$category->title" meta-description="By category description">
    {{-- <x-navbar /> --}}

    <!-- Posts Section -->
    <section class="flex flex-col items-center w-full px-3 md:w-2/3">

        @foreach ($posts as $post)
            <x-post-item :post="$post">
            </x-post-item>
        @endforeach

        {{ $posts->onEachSide(1)->links() }}
    </section>
    <x-sidebar />
</x-app-layout>

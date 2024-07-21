<!-- home.blade.php -->
<x-app-layout meta-description="Web pribadi milik Nashihun Amin untuk kursus bahasa Arab">
    <x-navbar />
    <x-sidebar />
    <!-- Posts Section -->
    <section class="flex flex-col items-center w-full px-3 md:w-2/3">

        @foreach ($posts as $post)
            <x-post-item :post="$post">
            </x-post-item>
        @endforeach

        {{ $posts->onEachSide(1)->links() }}
    </section>
    <x-footer />
</x-app-layout>

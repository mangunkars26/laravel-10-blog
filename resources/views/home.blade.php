<!-- home.blade.php -->
<x-app-layout meta-description="Web pribadi milik Nashihun Amin untuk kursus bahasa Arab">
    <x-navbar />
    <!-- Main Container -->

    {{-- w-full md:w-2/3 flex flex-col px-3 --}}
    <div class="container mx-auto flex flex-col md:flex-row mt-4 px-3">
        <!-- Posts Section -->
        <section class="w-full md:w-2/3 md:pr-6">
            @foreach ($posts as $post)
            <x-post-item :post="$post">
            </x-post-item>
            @endforeach

            {{ $posts->onEachSide(1)->links() }}
        </section>
        <!-- Sidebar Section -->
        <aside class="w-full md:flex-row flex  md:w-1/3 mt-8 md:mt-0">
            <x-sidebar />
        </aside>
    </div>
</x-app-layout>
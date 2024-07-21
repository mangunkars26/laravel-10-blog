<x-main-header />
<x-navbar />
<x-app-layout :meta-title="$post->meta_title ?: $post->title" :meta-description="$post->meta_description">
    <!-- Post Section -->
    <section class="w-full md:w-2/3 flex flex-col items-center px-3">
        <article class="flex flex-col shadow my-4">
            <!-- Article Image -->
            <a href="#" class="hover:opacity-75">
                <img class="" src="{{ asset('storage/' . $post->thumbnail) }}" alt="thumbnail">
            </a>
            <div class="bg-white flex flex-col justify-start p-6">

                <div class="flex gap-4">
                    @foreach ($post->categories as $category)
                        <a href="#"
                            class="text-blue-700 text-sm font-bold uppercase pb-4">{{ $category->title }}</a>
                    @endforeach
                </div>
                <h1 class="text-3xl font-bold hover:text-gray-700 pb-4">
                    {{ $post->title }}
                </h1>
                <div class="flex flex-col mb-4">

                    <p href="#" class="text-sm pb-2 font-bold">
                        Oleh <a href="#" class="font-bold hover:text-gray-800">{{ $post->user->name }}</a>
                    </p>
                    <p> Diposting
                        {{ $post->getFormattedDate('j F Y H:i') }}</p>
                </div>
                <div class="mt-4 text-xl leading-relaxed">
                    {!! $post->body !!}
                </div>
            </div>
        </article>

        <div class="w-full flex pt-6">
            <div class="w-1/2">
                @if ($prev)
                    <a href="{{ route('view', $prev) }}"
                        class="block w-full bg-white shadow hover:shadow-md text-left p-6">
                        <p class="text-lg text-blue-800 font-bold flex items-center">
                            <i class="fas fa-arrow-left pr-1"></i>
                            Previous
                        </p>
                        <p class="pt-2">{{ \Illuminate\Support\Str::words($prev->title, 5) }}</p>
                    </a>
                @endif
            </div>
            <div class="w-1/2">
                @if ($next)
                    <a href="{{ route('view', $next) }}"
                        class="block w-full bg-white shadow hover:shadow-md text-right p-6">
                        <p class="text-lg text-blue-800 font-bold flex items-center justify-end">Next
                            <i class="fas fa-arrow-right pl-1"></i>
                        </p>
                        <p class="pt-2">
                            {{ \Illuminate\Support\Str::words($next->title, 5) }}
                        </p>
                    </a>
                @endif
            </div>
        </div>

        <!--user-->
        <div class="w-full flex flex-col text-center md:text-left md:flex-row shadow bg-white mt-10 mb-10 ml-12 p-6">
            <div class="w-full md:w-1/5 flex justify-center md:justify-start pb-4">
                <img src="{{ asset('storage/' . $post->user->image) }}" class="rounded-full shadow h-16 w-16">
            </div>
            <div class="flex-1 flex flex-col justify-center md:justify-start">
                <p class="font-semibold text-2xl">{{ $post->user->name }}</p>
                <p class="pt-2">{{ $post->user->bio }}</p>
                <div class="flex items-center justify-center md:justify-start text-2xl no-underline text-blue-800 pt-4">
                    <a class="" href="#">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a class="pl-4" href="#">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="pl-4" href="#">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="pl-4" href="#">
                        <i class="fab fa-linkedin"></i>
                    </a>
                </div>
            </div>
        </div>

    </section>
    <x-sidebar />
</x-app-layout>

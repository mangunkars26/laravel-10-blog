<x-navbar />
<x-app-layout :meta-title="$post->meta_title ?: $post->title" :meta-description="$post->meta_description">
    <!-- Post Section -->
    <section class="flex flex-col items-center w-full p-4 px-3 mx-auto ml-0 md:w-2/3">
        <article class="flex flex-col my-4 shadow">
            <!-- Article Image -->
            <a href="#" class="hover:opacity-75">
                <img class="" src="{{ asset('storage/' . $post->thumbnail) }}" alt="thumbnail">
            </a>
            <div class="flex flex-col justify-start p-6 bg-white">

                <div class="flex gap-4">
                    @foreach ($post->categories as $category)
                        <a href="#"
                            class="pb-4 text-sm font-bold text-blue-700 uppercase">{{ $category->title }}</a>
                    @endforeach
                </div>
                <h1 class="pb-4 text-3xl font-bold hover:text-gray-700">
                    {{ $post->title }}
                </h1>
                <div class="flex flex-col mb-4">

                    <p href="#" class="pb-2 text-sm font-bold">
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

        <div class="flex w-full pt-6">
            <div class="w-1/2">
                @if ($prev)
                    <a href="{{ route('view', $prev) }}"
                        class="block w-full p-6 text-left bg-white shadow hover:shadow-md">
                        <p class="flex items-center text-lg font-bold text-blue-800">
                            <i class="pr-1 fas fa-arrow-left"></i>
                            Previous
                        </p>
                        <p class="pt-2">{{ \Illuminate\Support\Str::words($prev->title, 5) }}</p>
                    </a>
                @endif
            </div>
            <div class="w-1/2">
                @if ($next)
                    <a href="{{ route('view', $next) }}"
                        class="block w-full p-6 text-right bg-white shadow hover:shadow-md">
                        <p class="flex items-center justify-end text-lg font-bold text-blue-800">Next
                            <i class="pl-1 fas fa-arrow-right"></i>
                        </p>
                        <p class="pt-2">
                            {{ \Illuminate\Support\Str::words($next->title, 5) }}
                        </p>
                    </a>
                @endif
            </div>
        </div>

        <!--user-->
        <div class="flex flex-col w-full p-6 mt-10 mb-10 ml-12 text-center bg-white shadow md:text-left md:flex-row">
            <div class="flex justify-center w-full pb-4 md:w-1/5 md:justify-start">
                <img src="{{ asset('storage/' . $post->user->image) }}" class="w-16 h-16 rounded-full shadow">
            </div>
            <div class="flex flex-col justify-center flex-1 md:justify-start">
                <p class="text-2xl font-semibold">{{ $post->user->name }}</p>
                <p class="pt-2">{{ $post->user->bio }}</p>
                <div class="flex items-center justify-center pt-4 text-2xl text-blue-800 no-underline md:justify-start">
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

@extends('layouts.blog-layout')

@section('header')
    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.js"></script>
@endsection

@section('content')
    <section class="grid md:grid-cols-2 lg:grid-cols-3 gap-5 mb-5 masonry invisible">
        @foreach($posts as $post)
            <div class="grid-item p-3 relative w-full lg:w-1/3 md:w-1/2 ">
                <div class="relative rounded-lg overflow-hidden shadow-sm shadow-orange-600/20 dark:shadow-black/40 bg-stone-100 dark:bg-slate-800 hover:shadow-lg hover:shadow-orange-700/10 dark:hover:shadow-black/50">
                    <a href="{{ $post->url }}" class="absolute inset-0 cursor-default"></a>
                    <div class="pointer-events-none">
                        <div class="aspect-w-gw aspect-h-gh">
                            <img class="inset-0 bg-red-500 w-full object-cover" src="{{ $post->image }}"/>
                        </div>

                        <div class="w-full p-3">
                            <p class="text-2xl font-bold font-mono">{{ $post->title }} {{$loop->index}}</p>
                            <p>{{ $post->description }}</p>
                        </div>
                    </div>

                </div>
            </div>
        @endforeach
    </section>

    <script>
        var elem = document.querySelector('.masonry');
        var msnry = new Masonry( elem, {
            // options
            itemSelector: '.grid-item',
            transitionDuration: 0,
            initLayout: false
        });
        msnry.on('layoutComplete', function () {
            elem.classList.remove('invisible')
        })
        msnry.layout()
    </script>

    @if ($posts->hasPages())
        <section class="my-8 relative z-50 bg-stone-200 dark:bg-slate-900">
            <hr class="mx-auto w-16 border-stone-300 dark:border-slate-700">
            <div class="pt-4">
                {{ $posts->links() }}
            </div>
        </section>
    @endif
@endsection
@extends('layouts.blog-layout')

@section('header')
    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.js"></script>
@endsection

@section('content')
    <section class="grid md:grid-cols-2 lg:grid-cols-3 gap-5 mb-5 masonry invisible">
        @foreach($posts as $post)
            @component('components.post', [
                "url" => $post->url,
                "image" => $post->image,
                "title" => $post->title,
                "subtitle" => $post->subtitle,
                "description" => $post->description
            ])@endcomponent
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
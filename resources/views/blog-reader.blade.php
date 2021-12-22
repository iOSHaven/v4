@extends('layouts.blog-layout')

@section('header')
    <link rel="stylesheet" href="{{ mix('/css/markdown.css') }}">
    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.js"></script>
@endsection

@section('content')

    <section class="markdown max-w-prose mx-auto">
        {!! $post->html !!}
    </section>

    <div class="fb-comments" data-href="/blog/{{ $post->uid }}/comments" data-width="100%" data-numposts="10" data-lazy="true"></div>

@endsection
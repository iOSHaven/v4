@extends('layouts.blog-layout')

@section('header')
    <link rel="stylesheet" href="{{ mix('/css/markdown.css') }}">
    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.js"></script>
@endsection

@section('content')
    <section class="markdown max-w-prose mx-auto">
        {!! $post->html !!}
    </section>

@endsection
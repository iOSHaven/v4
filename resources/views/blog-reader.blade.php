@extends('layouts.blog-layout')

@section('header')
    <link rel="stylesheet" href="{{ mix('/css/markdown.css') }}">
    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.js"></script>
@endsection

@section('search-engine')
    <meta name="keywords" content="{{ $post->tags ?? "iphone,jailbreak,sideload,hack,crack,signed,download,ipa,free" }}">
    <meta name="robots" content="index, follow">
    <meta name="web_author" content="iOS Haven">
    <meta name="language" content="English">
    <title>{{ $post->title }} | IPA Insider {{ now()->year }}</title>
@endsection

@section('content')

    <img class="inset-0 bg-red-500 w-full object-cover -mt-8 mb-12"
         srcset="{{ $post->getBannerSrcsetAttribute() }}"
         src="{{ $post->banner }}"/>

    <section class="markdown max-w-prose mx-auto">
        {!! $post->html !!}
    </section>

    <div class="fb-comments" data-href="/blog/{{ $post->uid }}/comments" data-width="100%" data-numposts="10" data-lazy="true"></div>

@endsection
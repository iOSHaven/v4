@extends('layouts.blog-layout')

@php
    $title = "$post->title | IPA Insider ".now()->year;
@endphp

@section('header')
    <link rel="stylesheet" href="{{ mix('/css/markdown.css') }}">
    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.js"></script>
@endsection

@section('twitter')
    @include('seo.twitter-og', [
        "title" => $title,
        "description" => $post->description,
        "image" => $post->picture,
        "imageSize" => "summary_large_image"
    ])
@endsection

@section('search-engine')
    <meta name="keywords" content="{{ $post->tags ?? "iphone,jailbreak,sideload,hack,crack,signed,download,ipa,free" }}">
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <meta name="web_author" content="iOS Haven">
    <meta name="language" content="English">
    <link rel="canonical" href="{{url()->current()}}">
    <title>{{ $title }}</title>
@endsection

@section('content')

    <div class="max-w-prose mx-auto">
        <img class="inset-0 bg-red-500 w-full object-cover -mt-8 mb-12"
             srcset="{{ $post->getBannerSrcsetAttribute() }}"
             src="{{ $post->banner }}"/>

        <h1 class="uppercase font-bold text-5xl">{{$post->title}}</h1>
        @if(!empty($post->subtitle))
            <h2 class="mt-2 uppercase text-2xl opacity-[0.6]">{{ $post->subtitle }}</h2>
        @endif

        <section class="mt-8">
            @foreach($post->getKeywords() as $keyword)
                <a class="mr-1 underline text-emerald-500 font-bold hover:text-emerald-700" href="{{ route('blog.tag', ["tag" => $keyword]) }}">#{{$keyword}}</a>
            @endforeach
        </section>

        <section class="markdown mx-auto mt-8">
            {!! $post->html !!}
        </section>

        <div class="fb-comments" data-href="/blog/{{ $post->uid }}/comments" data-width="100%" data-numposts="10" data-lazy="true"></div>
    </div>



@endsection
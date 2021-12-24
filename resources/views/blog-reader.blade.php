@extends('layouts.blog-layout')

@php
    $title = "$post->title | IPA Insider ".now()->year;
@endphp

@section('header')
    <link rel="stylesheet" href="{{ mix('/css/markdown.css') }}">
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4649450952406116"
            crossorigin="anonymous"></script>
    <script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5aeb628d96e6fc00110b2f1a&product=inline-share-buttons' async='async'></script>
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
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "NewsArticle",
      "headline": "{{ $post->title }}",
      "image": @json($post->getScaledImages(3)),
      "datePublished": "{{ $post->created_at->toIso8601String() }}",
      "dateModified": "{{ $post->updated_at->toIso8601String() }}",
      "author": [{
            "@type": "Organization",
            "name": "iOS Haven"
        },{
          "@type": "Person",
          "name": "John Doe",
          "url": "http://example.com/profile/johndoe123"
      }]
    }
    </script>

@endsection

@section('content')

    <article class="max-w-prose mx-auto">
        <header>
            <img class="inset-0 bg-red-500 w-full object-cover -mt-8 mb-12"
                 srcset="{{ $post->getBannerSrcsetAttribute() }}"
                 src="{{ $post->banner }}"/>

            <h1 class="uppercase font-bold text-5xl">{{$post->title}}</h1>
            @if(!empty($post->subtitle))
                <h2 class="mt-2 uppercase text-2xl opacity-[0.6]">{{ $post->subtitle }}</h2>
            @endif

            <section class="mt-2">
                @foreach($post->getKeywords() as $keyword)
                    <a class="mr-1 underline text-emerald-500 font-bold hover:text-emerald-700" href="{{ route('blog.tag', ["tag" => $keyword]) }}">#{{$keyword}}</a>
                @endforeach
            </section>
            <!-- ShareThis BEGIN -->
            <div class="sharethis-inline-share-buttons mt-6"></div>
            <!-- ShareThis END -->

        </header>

        <section class="markdown mx-auto mt-8">
{{--            {!! $post->html !!}--}}
            @php
                $chunks = array_filter(explode("\n", $post->markdown));
            @endphp

            @unless($post->ad_free)
                @foreach($chunks as $chunk)
                    {!! \Illuminate\Mail\Markdown::parse($chunk) !!}
                    @if($loop->iteration % (count($chunks) / 3) == 0)
                        @include('ads.google-blog')
                    @endif
                @endforeach
            @else
                {!! \Illuminate\Mail\Markdown::parse($post->markdown) !!}
            @endunless
        </section>

        <p class="text-xl font-bold underline uppercase">Share now & comment!</p>
        <!-- ShareThis BEGIN -->
        <div class="sharethis-inline-share-buttons my-4"></div>
        <!-- ShareThis END -->
        <section class="fb-comments w-full" data-href="{{ url()->current() }}" data-width="100%" data-numposts="10" data-lazy="true"></section>
    </article>

@endsection

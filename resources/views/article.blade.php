@extends('layouts.redesign', ["title" => "Today", "hide_nav" => false ])

@section('twitter')
    <meta property="og:title" content="{{ $article->title }}">
    <meta property="og:type" content="article">
    <meta property="og:url" content="{{ url("/today". $article->slug) }}">
    <meta property="og:description" content="{{ $article->content }}">
    <meta property="og:image" content="{{ url($article->image) }}">
    <meta property="twitter:site:id" content="715729557769166848">
@endsection

@section('content')

<div class="sm:w-2/3 px-1 py-2 grid-item">
    <div class="shadow-md overflow-hidden" style="border-radius: 0.7rem;">
        <div>
            <div class="w-full flex" style="height: 200px;">
                <img class="w-full object-cover" src="{{ $article->image }}" width="600" height="400" alt="">
            </div>
            
            <div class="py-3 sm:px-0 px-3 {{theme('bg-white')}}">
                <div class="text-xs -mt-1 flex items-center">
                    @if ($article->user)
                    <span class="flex items-center">
                        <img class="rounded-full mr-2" src="https://www.gravatar.com/avatar/{{ md5($article->user->email) }}?s=100" width="25" alt="">
                        {{ $article->user->username }}
                        <span class="mx-2">|</span>
                        </span>
                    @endif
                    {{ $article->created_at->diffForHumans() }} 
                </div>
                <div class="{{theme('text-black')}} text-3xl font-bold mt-1" style="line-height: 1.9rem;letter-spacing: -0.04rem;">{{ $article->title }}</div>
                <div class="class text-sm mt-1 {{theme('text-gray-600')}}">{{ $article->subtitle }}</div>
                <div class="mt-8 markdown {{theme('text-black')}}">
                    {!! $article->markdown !!}
                </div>
            </div>
        </div>
        
    </div>
</div>

@endsection


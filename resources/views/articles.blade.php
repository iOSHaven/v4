@extends('layouts.redesign', ["title" => $pageTitle ?? null ])

@section('header')
{{-- <meta name="page" content="{{ $apps->currentPage() }}"> --}}

{{-- <script defer src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script> --}}
@endsection

@section('content')

{{-- <button class="share font-bold text-lg rounded-full text-sm px-10 py-3 {{ theme("bg-black", "text-white") }}">
Share</button> --}}
<div class="grid" data-masonry='{ "itemSelector": ".grid-item", "columnWidth": ".grid-sizer", "percentPosition": true }'>
    <div class="grid-sizer md:w-1/3 sm:w-1/2"></div>
    @foreach($articles as $article)
        <div class="md:w-1/3 sm:w-1/2 px-1 py-2 grid-item">
            <div class="shadow-md overflow-hidden" style="border-radius: 0.7rem;">
                <a href="/today/{{$article->slug}}" class="internal-link">
                    <div class="pointer-events-none">
                        <div class="w-full flex" style="height: 200px;">
                            <img class="w-full object-cover" src="{{ $article->image }}" width="600" height="400" alt="">
                        </div>
                        
                        <div class="p-3 {{theme('bg-white')}}">
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
                        </div>
                    </div>
                    
                </a>
            </div>
        </div>
    @endforeach

    <div class="text-center text-xl mt-8 block">No more articles</div>
</div>


@endsection


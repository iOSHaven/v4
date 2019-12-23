@extends('layouts.redesign', ["title" => $pageTitle ?? null ])

@section('header')
<meta name="page" content="{{ $apps->currentPage() }}">
@endsection

@section('content')

    <div class="container">
      <div class="row" id="apps">
          @foreach($apps as $app)
            @component('components.applayout', ["app" => $app])@endcomponent
            @if($loop->iteration == 3)
            
                @component('components.ad')@endcomponent
                
            @endif
          @endforeach
      </div>
    </div>

    @if($apps->hasMorePages())
    <div id="loadmoreapps" class="text-center mt-5 mb-4" style="width: 100%;">
      <button class="font-bold text-lg rounded-full text-sm px-10 py-3 {{ theme("bg-black", "text-white") }}"
      onclick="loadMoreApps(this)"
      data-template="/tl/app">
      Load more...</button>
    </div>
    @endif

@endsection


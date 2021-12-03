@extends('layouts.redesign', ["title" => $pageTitle ?? null ])

@section('header')
<meta name="page" content="{{ $apps->currentPage() }}">
@endsection

@section('content')

<div class="container">
  <div class="row" id="apps">

    <!-- <div class="relative bg-yellow-light rounded-full pl-1 pr-3">
          <div class="flex items-center mb-3">
            <a href="/giveaway" class="absolute top-0 left-0 right-0 bottom-0"></a>
            <div class="flex py-1 pointer-events-none flex-grow rounded-full">
              <img style="width:45px; height:45px;" class="rounded-full" src="https://storage.ihvn.dev/providers/ed85446169d8767546bac065a1ea1b2d94e134ddf41e7309887f5f9a7e896a87.jpeg" width="45" height="45">
              <div class="pl-3 w-full relative">
                <div class="text-white-dark font-bold">Holiday Giveaway!</div>
                <div class="leading-none text-sm text-white-dark">$600+ of prizes!</div>
              </div>
            </div>
            <div class="-ml-4">
              <i class="fal fa-chevron-right fa-2x {{ theme('text-gray-400') }}"></i>
            </div>
          </div>
        </div>  -->

    @if($agent->isMobile())
    @component('ads.google-mobile-optimized')@endcomponent
    @endif

    @foreach($apps as $model)
    @if(class_basename($model) == 'App')
    @component('components.applayout', ["app" => $model])@endcomponent
    @else
    @component('components.shortcut', ["shortcut" => $model])@endcomponent
    @endif




    @if($apps->currentPage() <= 3) @if($agent->isMobile())
      @if ($loop->iteration == 7)
      @component('ads.google-in-feed') @endcomponent
      @endif
      @elseif($loop->iteration == 3)
      @component('ads.google-in-feed') @endcomponent
      @endif
      @endif

      @endforeach
  </div>
</div>

@component('ads.google-footer')@endcomponent

@if($apps->hasMorePages())
<div id="loadmoreapps" class="text-center mt-5 mb-4" style="width: 100%;">
  <button class="font-bold text-lg rounded-full text-sm px-10 py-3 {{ theme("bg-black", "text-white") }}" onclick="loadMoreApps(this)" data-template="/tl/app">
    Load more...</button>
</div>
@endif

@endsection
@extends('layouts.redesign', ["title" => $pageTitle ?? null ])

@section('header')
<meta name="page" content="{{ $shortcuts->currentPage() }}">
@endsection

@section('content')

<div class="flex items-center justify-between">
  <div class="text-4xl">Shortcuts</div>
  <a href="/nova/resources/shortcuts/new" class='flex items-center font-bold rounded text-sm px-5 py-1 bg-blue-500 text-white dark:text-black'>
    <span class="mr-2">Create</span>
    <i class="fas fa-plus"></i>
  </a>
</div>

<p class="mb-8">Siri Shortcuts deliver a quick way to get things done with your apps with just a tap or by asking Siri. The
  Shortcuts app enables
  you to create personal shortcuts with multiple steps from your favorite apps. Start from hundreds of
  examples in the Gallery or
  drag and drop to create your own.</p>
<div class="container">
  <div class="row" id="shortcuts">
    @foreach($shortcuts as $shortcut)
    @component('components.shortcut', ["shortcut" => $shortcut])@endcomponent
    @if($loop->iteration == 3)

{{--    @component('ads.google-in-feed')@endcomponent--}}

    @endif
    @endforeach
  </div>
</div>


{{--@component('ads.google-footer')@endcomponent--}}

@if($shortcuts->hasMorePages())
<div id="loadmoreshortcuts" class="text-center mt-5 mb-4" style="width: 100%;">
  <button class="font-bold text-lg rounded-full text-sm px-10 py-3 bg-black dark:bg-white text-white dark:text-black" onclick="loadMoreApps(this, 'shortcuts')" data-template="/tl/shortcut">
    Load more...</button>
</div>
@endif

@endsection
@extends('layouts.redesign', ["title" => $pageTitle ?? null ])

@section('header')
<meta name="page" content="{{ $shortcuts->currentPage() }}">
@endsection

@section('content')

    <div class="container">
      <div class="row" id="shortcuts">
          @foreach($shortcuts as $shortcut)
            @component('components.shortcut', ["shortcut" => $shortcut])@endcomponent
            @if($loop->iteration == 3)
            
                @component('components.ad')@endcomponent
                
            @endif
          @endforeach
      </div>
    </div>

    @if($shortcuts->hasMorePages())
    <div id="loadmoreshortcuts" class="text-center mt-5 mb-4" style="width: 100%;">
      <button class="font-bold text-lg rounded-full text-sm px-10 py-3 {{ theme("bg-black", "text-white") }}"
      onclick="loadMoreApps(this, 'shortcuts')"
      data-template="/tl/shortcut">
      Load more...</button>
    </div>
    @endif

@endsection

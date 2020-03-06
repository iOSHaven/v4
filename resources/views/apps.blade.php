@extends('layouts.redesign', ["title" => $pageTitle ?? null ])


@section('content')

    <div class="container">
      <div class="row" id="apps">
          @foreach($apps as $model)
            @if(class_basename($model) == 'App')
              @component('components.applayout', ["app" => $model])@endcomponent
            @else
              @component('components.shortcut', ["shortcut" => $model])@endcomponent
            @endif
            {{-- @if($loop->iteration == 3)
            
                @component('components.ad')@endcomponent
                
            @endif --}}
          @endforeach
      </div>
    </div>

    <div class="text-center text-xl mt-8 block">No more apps</div>
    {{-- @if($apps->hasMorePages())
    <div id="loadmoreapps" class="text-center mt-5 mb-4" style="width: 100%;">
      <button class="font-bold text-lg rounded-full text-sm px-10 py-3 {{ theme("bg-black", "text-white") }}"
      onclick="loadMoreApps(this)"
      data-template="/tl/app">
      Load more...</button>
    </div>
    @endif --}}

@endsection


@section('footer')
<script>
  window.initInfiniteScroll('apps', {{ $apps->currentPage() }}, {{ $apps->lastPage() }})
</script>
@endsection
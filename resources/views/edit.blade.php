@extends('layouts.redesign', ["hide_ads" => true, "hide_footer" => true, "hide_meta" => true])

@section("header")
  <link rel="stylesheet" href="/css/scoped.css">
@endsection


@section('content')

{{-- <div id="dashboard">
    <app-dashboard uid="{{$app->uid}}"></app-dashboard>
</div> --}}

{{-- <div class="container">
  <div class="row">
    <div class="col-12 my-3">
      <form action="/apps" method="get" autocomplete="off">
        <div class="autocomplete">
            <input name="q" type="text" class="p-3 autocomplete" id="appsearch" placeholder="Search apps..." data-fetch="/apps/getJson" data-template="/tl/app-search-edit" data-result="result">
            <div class="autocomplete-results" id="result"></div>
        </div>
      </form>
    </div>
  </div>
</div> --}}

<div id="search-results" class="mt-3">
  <div class="fixed flex items-center justify-start relative rounded-full {{ theme('bg-gray-100') }}">
      <i class="far fa-search absolute p-3"></i>
      <input type="text" placeholder="Search" class="border-0 w-full pl-10 py-2 bg-transparent" v-model="searchinput">
  </div>
  
  <search-results theme="{{ theme() }}" :phpdata="{{ $apps }}"></search-results>
</div>

<div class="container pt-4">
  <div class="flex flex-wrap mb-4">
    <div class="w-full">
      <div class="h3"><a href="/app/{{ $app->uid }}" class="font-display">{{ $app->name }}</a></div>
    </div>
    <div class="w-1/6">
      <img class="rounded-lg w-full" src="{{ url($app->icon) }}" alt="icon">
    </div>
    <div class="w-5/6">
      {{-- <img class="w-full" src="{{ url($app->banner) }}" alt="banner"> --}}
      <label for="save" class="py-1 px-3 bg-blue-light text-white-light rounded-full   inline-block">Save Changes</label>
      <label for="remove" class="py-1 px-3 bg-red-light text-white-light rounded-full   inline-block">Remove App</label>
    </div>

  </div>
  <div class="flex flex-wrap">
    <form action="/app/update" method="post" class="flex flex-wrap w-full">
      {{ csrf_field() }}
      <input type="hidden" name="uid" value="{{ $app->uid }}">
      <div class="w-1/2 mb-3" >
        <label for="" class="block">App name</label>
        <input type="text" class="p-3 border w-full" maxlength="255" placeholder="String..." data-lpignore="true" value="{{ $app->name }}" name="name">
      </div>

      <div class="w-1/2 mb-3">
        <label for="" class="block">App Version</label>
        <input type="text" class="p-3 border w-full" maxlength="12" placeholder="String..." data-lpignore="true" value="{{ $app->version }}" name="version">
      </div>

      <div class="w-1/2 mb-3">
        <label for="" class="block">App Size (1000000 = 1MB)</label>
        <input type="text" class="p-3 border w-full" maxlength="20" placeholder="Number..." data-lpignore="true" value="{{ $app->size }}" name="size">
      </div>

      <div class="w-1/2 mb-3">
        <label for="" class="block">IPA Link</label>
        <input type="text" class="p-3 border w-full" maxlength="65000" placeholder="URL..." data-lpignore="true" value="{{ $app->unsigned }}" name="unsigned">
      </div>

      <div class="w-1/2 mb-3">
        <label for="" class="block">Signed Link</label>
        <input type="text" class="p-3 border w-full" maxlength="65000" placeholder="ITMS URL..." data-lpignore="true" value="{{ $app->signed }}" name="signed">
      </div>

      <div class="w-1/2 mb-3">
        <label for="" class="block">App Icon</label>
        <input type="text" class="p-3 border w-full" maxlength="255" placeholder="URL..." data-lpignore="true" value="{{ $app->icon }}" name="icon">
      </div>

      <div class="w-1/2 mb-3">
        <label for="" class="block">App Banner</label>
        <input type="text" class="p-3 border w-full" maxlength="255" placeholder="URL..." data-lpignore="true" value="{{ $app->banner }}" name="banner">
      </div>

      <div class="w-1/2 mb-3">
        <label for="" class="block">Short Description</label>
        <input type="text" class="p-3 border w-full" maxlength="18" placeholder="String..." data-lpignore="true" value="{{ $app->short }}" name="short">
      </div>

      <div class="w-full mb-3">
        <label for="" class="block">Full Description</label>
        <textarea rows="8" class="p-3 col-12 border w-full" maxlength="65000" placeholder="Markdown..." name="description"> {{ $app->description }}</textarea>
      </div>

      <div class="w-full mb-3">
        <label for="" class="block">Tags</label>
        <input type="text" class="p-3  border w-full" maxlength="255" placeholder="<String>..." data-lpignore="true" value="{{ $app->tags }}" name="tags">
      </div>

      <button type="submit" class="hidden" id="save"></button>
    </form>

    <form class="" action="/app/remove" method="post">
      {{ csrf_field() }}
      <button type="submit" class="hidden" id="remove" name="uid" value="{{ $app->uid }}"></button>
    </form>


  </div>
</div>



@endsection

@section('footer')
<script src="{{ asset('/js/app.js') }}"></script>
<script src="{{ asset('/js/dashboard.js') }}"></script>
@endsection

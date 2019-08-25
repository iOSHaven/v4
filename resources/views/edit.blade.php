@extends('layouts.redesign', ["hide_ads" => true, "hide_footer" => true, "hide_meta" => true])

@section("header")
  {{-- <link rel="stylesheet" href="/css/scoped.css"> --}}
  <style>
    body {
      /* margin-bottom: 0px !important; */
      background-color: #ebebf0 !important;
      overflow: scroll;
    }
  </style>
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
  <div class="fixed flex items-center justify-start relative rounded-full bg-white-light ">
      <i class="far fa-search absolute p-3"></i>
      <input type="text" placeholder="Search" class="w-full pl-10 py-2 border border-gray-300-light" v-model="searchinput">
  </div>
  
  <search-results theme="{{ theme() }}" :phpdata="{{ $apps }}"></search-results>
</div>


<div class="flex flex-wrap my-4">
    
    <div style="width: 60px">
      <img class="rounded-lg w-full" src="{{ url($app->icon) }}" alt="icon">
    </div>
    <div class="flex-grow ml-3">
      <div class="w-full">
        <div class="h3"><a href="/app/{{ $app->uid }}" class="font-semibold">{{ $app->name }}</a></div>
      </div>
      {{-- <img class="w-full" src="{{ url($app->banner) }}" alt="banner"> --}}
      {{-- <label for="mirrors" class="py-1 px-3 bg-blue-light text-white-light rounded-full   inline-block">Save Changes</label> --}}
      <label for="save" class="py-1 px-3 bg-blue-light text-white-light rounded-full   inline-block">Save Changes</label>
      <label for="remove" class="py-1 px-3 bg-red-light text-white-light rounded-full   inline-block">Remove App</label>
    </div>

  </div>

<input class="hidden" type="radio" name="_tab" id="tab1">
<input class="hidden" type="radio" name="_tab" id="tab2">
<input class="hidden" type="radio" name="_tab" id="tab3" checked>

<ul class="flex border-b bg-gray-100-light mt-3 border-gray-300-light">
  <li class="mr-1 tab1">
    <label for="tab1" class="bg-gray-100-light inline-block py-2 px-4 text-gray-600 hover:text-blue-light font-semibold" href="#">Information</label>
  </li>
  <li class="mr-1 tab2">
    <label for="tab2" class="bg-gray-100-light inline-block py-2 px-4 text-gray-600 hover:text-blue-light font-semibold" href="#">Details</label>
  </li>
  <li class="mr-1 tab3">
    <label for="tab3" class="bg-gray-100-light inline-block py-2 px-4 text-gray-600 hover:text-blue-light font-semibold" href="#">Mirrors</label>
  </li>
</ul>



<section class="p-3 bg-white-light border-b border-l border-r rounded-b border-gray-300-light">
    <form action="/app/update" method="post">
      @csrf
  <div class="hidden tab1">
    
      <div class="flex flex-wrap">
            
            <input type="hidden" name="uid" value="{{ $app->uid }}">
            <div class="w-1/2 mb-3" >
              <label for="" class="block">App name</label>
              <input type="text" class="px-3 py-1 border w-full border-gray-200-light" maxlength="255" placeholder="String..." data-lpignore="true" value="{{ $app->name }}" name="name">
            </div>
      
            
      
            <div class="w-1/2 mb-3">
              <label for="" class="block">App Size (1000000 = 1MB)</label>
              <input type="text" class="px-3 py-1 border-t border-b border-r border-gray-200-light w-full" maxlength="20" placeholder="Number..." data-lpignore="true" value="{{ $app->size }}" name="size">
            </div>
      
            
      
            <div class="w-1/2 mb-3">
              <label for="" class="block">App Icon</label>
              <input type="text" class="px-3 py-1 border w-full border-gray-200-light" maxlength="255" placeholder="URL..." data-lpignore="true" value="{{ $app->icon }}" name="icon">
            </div>
      
            <div class="w-1/2 mb-3 hidden">
              <label for="" class="block">App Banner</label>
              <input type="text" class="px-3 py-1 border-t border-b border-r border-gray-200-light w-full" maxlength="255" placeholder="URL..." data-lpignore="true" value="{{ $app->banner }}" name="banner">
            </div>
      
            <div class="w-1/2 mb-3">
              <label for="" class="block">Short Description</label>
              <input type="text" class="px-3 py-1 border-t border-b border-r border-gray-200-light w-full" maxlength="18" placeholder="String..." data-lpignore="true" value="{{ $app->short }}" name="short">
            </div>
      
            <div class="w-full mb-3">
              <label for="" class="block">Full Description</label>
              <textarea rows="8" class="px-3 py-1 border w-full border-gray-200-light" maxlength="65000" placeholder="Markdown..." name="description"> {{ $app->description }}</textarea>
            </div>
      
            
      
            <button type="submit" class="hidden" id="save"></button>
          
      
          
        </div>


  </div>

  <div class="hidden tab2">
      <div class="flex flex-wrap">
          <div class="w-1/2 mb-3">
            <label for="" class="block">App Version</label>
            <input type="text" class="px-3 py-1 border w-full border-gray-200-light" maxlength="12" placeholder="String..." data-lpignore="true" value="{{ $app->version }}" name="version">
          </div>
          <div class="w-1/2 mb-3">
            <label for="" class="block">IPA Link</label>
            <input type="text" class="px-3 py-1 border-t border-b border-r border-gray-200-light w-full" maxlength="65000" placeholder="URL..." data-lpignore="true" value="{{ $app->unsigned }}" name="unsigned">
          </div>
    
          <div class="w-1/2 mb-3">
            <label for="" class="block">Signed Link</label>
            @if($app->firstMirror())
            <div class="px-3 py-1 border w-full border-gray-200-light bg-red-light text-white-light">See 'Mirrors' tab</div>
            @else
            <input type="text" class="px-3 py-1 border w-full border-gray-200-light" maxlength="65000" placeholder="ITMS URL..." data-lpignore="true" value="{{ $app->signed }}" name="signed">
            @endif
          </div>
          <div class="w-full mb-3">
            <label for="" class="block">Tags</label>
            <input type="text" class="px-3 py-1 border w-full border-gray-200-light" maxlength="255" placeholder="<String>..." data-lpignore="true" value="{{ $app->tags }}" name="tags">
          </div>
      </div>
  </div>
  <div class="hidden tab3">
      @foreach($providers as $provider)
        @php
          $mirror = $app->mirrors->where('provider_id', $provider->id)->first();
        @endphp
        @component('components.form.input', [
          "label" => $provider->name . " signed url",
          "name" => "mirror-" . $provider->id,
          "type" => "text",
          "icon" => "fab fa-app-store-ios",
          "value" => $mirror->install_link ?? ""
        ])@endcomponent
      @endforeach
  </div>
</form>
</section>



<form class="" action="/app/remove" method="post">
  {{ csrf_field() }}
  <button type="submit" class="hidden" id="remove" name="uid" value="{{ $app->uid }}"></button>
</form>

@endsection

@section('footer')
<script src="{{ asset('/js/app.js') }}"></script>
<script src="{{ asset('/js/dashboard.js') }}"></script>
@endsection

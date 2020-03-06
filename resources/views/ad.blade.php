@extends('layouts.redesign', ["title" => "Installing", "hide_nav" => false, "hide_ads" => true, "back_link" => url("/apps")])

{{-- @php
dd(url($model->url))
@endphp --}}

@section('header')
    <title>{{ $app->name }}</title>
    {{-- <meta http-equiv="refresh" content="1; url={{ $url }}"> --}}
    {!! $ad->get("popunder") !!}
@endsection

@section('content')






<section>
  <div class="container text-center">
    <h3 class="mt-0 text-3xl font-display">{{ $app->name }}</h3>
    

      <img src="{{ url($app->icon) }}" width="77" height="77" class="d-block mx-auto mb-3" style="height:77px; border-radius: 1.3rem">

      <div class="text-xl mx-auto">Provided By:</div>
      
      <div class="inline-block rounded-lg border py-3 pl-3 pr-8 mb-8 {{ theme('border-gray-100') }}">
        <div class="flex items-center">
          @component('components.tinyProviderIcon', ["provider" => $model->provider, "size" => 40])@endcomponent
          <div>
            <div>{{ $model->provider->name }}</div>
            @if($model->working)
            <div class="text-green-light font-bold text-sm">
                <span class="mr-1">Working</span>
                <i class="fas fa-check-circle"></i>
            </div>
            @else
            <div class="text-red-light font-bold text-sm">
                <span class="mr-1">Revoked</span>
                <i class="fas fa-times-octagon"></i>
            </div>
            @endif
          </div>
          
        </div>
      </div>
      
      @component('components.banner')@endcomponent

      <div>
            <a href="{{ $url }}" class='mx-1 mb-16 flex items-center justify-center font-bold rounded-full text-sm px-8 py-5 {{ theme('bg-blue', 'text-white') }}'>
                <i class="fas fa-download mr-3 fa-lg"></i>
                @if($type == "itms")
                INSTALL
                @else
                DOWNLOAD
                @endif
                <i class="fas fa-download ml-3 fa-lg"></i>

            </a>
      </div>
      
      
      @if($type == "itms")
        <h3 class="mt-0 text-2xl font-display">How to install</h4>
        <i class="fas fa-arrow-down fa-2x"></i>
        <img class="d-block mx-auto" src="/tutorial-images/UsingSignedAppStep1.png" alt="" width="200">
        <img class="d-block mx-auto" src="/tutorial-images/UsingSignedAppStep2.png" alt="" width="200">
        <img class="d-block mx-auto mb-3" src="/tutorial-images/UsingSignedAppStep3.png" alt="" width="200">
        <h3 class="font-display">Settings > General > Profiles & Device Management > [ Select Certificate ]</h3>
        <img class="d-block mx-auto mb-3" src="/tutorial-images/UsingSignedAppStep4.png" alt="" width="200">
        <img class="d-block mx-auto" src="/tutorial-images/UsingSignedAppStep5.png" alt="" width="200">
      @endif
    </div>
</section>




@endsection
@extends('layouts.redesign', ["title" => "Installing", "hide_nav" => true, "hide_ads" => true, "back_link" => url("/apps")])

@section('header')
    <title>{{ $app->name }}</title>
    <meta http-equiv="refresh" content="1; url={{ $url }}">
    {!! $ad->get() !!}
@endsection

@section('content')






<section>
  <div class="container text-center">
    <h3 class="mt-0 text-3xl font-display">{{ $app->name }}</h3>
    

      <img src="{{ url($app->icon) }}" width="77" height="77" class="d-block mx-auto mb-10" style="height:77px; border-radius: 1.3rem">
      {{-- <p>Trying to install {{ $app->name}}. Please remain calm.</p>   --}}
      {{-- <br> --}}
      {{-- <img src="/SVG/yoga.svg" alt="" class="d-block mx-auto mb-10" width="50"> --}}

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
      
      {{-- <br> --}}
      
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
@extends('layouts.redesign', ["title" => "Merch", "hide_nav" => true, "hide_ads" => true, "back_link" => url("/apps")])

{{-- @php
dd(url($model->url))
@endphp --}}

@php
    $url = "https://memes33.com/collections/ios-haven"
@endphp

@section('header')
    <title>Redirecting...</title>
    <meta http-equiv="refresh" content="0; url={{ $url }}">
@endsection

@section('content')






<section>
  <div class="container text-center">
    <h3 class="mt-0 text-3xl font-display">Redirecting...</h3>
    
      

      <div>
            <a href="{{ $url }}" class='mx-1 mb-16 flex items-center justify-center font-bold rounded-full text-sm px-8 py-5 bg-blue-500 text-white dark:text-black'>
                <i class="fas fa-tshirt mr-3 fa-lg"></i>
                Launch
                <i class="fas fa-tshirt ml-3 fa-lg"></i>
            </a>
      </div>
      
    </div>
</section>




@endsection
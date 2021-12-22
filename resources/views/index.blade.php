@extends('layouts.redesign', ["hide_nav" => true, "hide_ads" => true, "hide_back" => true])

@section('header')
<link rel="stylesheet" href="{{ mix('/css/markdown.css') }}">
@endsection

@section('page')
<section class="text-xl px-3 h-full bg-white dark:bg-black">

  <div class="mx-auto w-full text-center" style="max-width: 700px">
    <h1 class="mb-1 block text-6xl text-black dark:text-white">iOS Haven</h1>
    <p class="-mt-4 mb-12">The app store for the people</p>
    <div class="mb-12">
      <script type='text/javascript' src='https://ko-fi.com/widgets/widget_2.js'></script>
      <script type='text/javascript'>
        kofiwidget2.init('Support Us on Ko-fi', '#29abe0', 'A0A83N15F');
        kofiwidget2.draw();
      </script>
    </div>

    @component('ads.google-home-page')@endcomponent

    <div class="flex items-center justify-center">
      <a href="/apps" class='btn-da mb-4 flex items-center justify-center mx-1 font-bold rounded-full text-sm px-5 py-2 text-white-light  bg-indigo-500'>
        <i class="fas fa-rocket mr-3 fa-lg"></i>
        LAUNCH
      </a>
    </div>
    <div class="flex items-center justify-center mb-4">
      <a href="/install?theme=dark" class='hide-webapp mx-1 flex items-center justify-center font-bold rounded-full text-sm px-5 py-2 bg-black dark:bg-white text-white dark:text-black'>
        <i class="fas fa-moon-stars mr-3 fa-lg"></i>
        INSTALL
      </a>
      <a href="/install?theme=light" class='hide-webapp mx-1 flex items-center justify-center font-bold rounded-full text-sm px-5 py-2 text-black-light bg-yellow-500'>
        <i class="fas fa-sun mr-3 fa-lg"></i>
        INSTALL
      </a>
    </div>

    <div class="flex items-center justify-center">
      <a href="{{ url('/themes')}}" class='hide-webapp mx-1 mb-12 flex items-center justify-center font-bold rounded-full text-sm px-5 py-2 bg-green-500 text-black dark:text-white'>
        <i class="fas fa-palette mr-3 fa-lg"></i>
        iOS 14 Themes
      </a>
    </div>

    <div class="flex items-center justify-center">
      <a href="altstore://source?url={{ url('/altstore/apps.json')}}" class='hide-webapp mx-1 mb-16 flex items-center justify-center font-bold rounded-full text-sm px-5 py-2 bg-pink-500 text-black dark:text-white'>
        <i class="fas fa-mobile-alt mr-3 fa-lg"></i>
        Open in ALTSTORE
      </a>
    </div>




    <img src="/img/iphonex.png" class="w-full">
  </div>

</section>

<section class="text-xl px-3 h-full bg-indigo-500" style="margin-top: -6%; padding-top: 15%; padding-bottom: 10%">

  <div class="mx-auto w-full text-center" style="max-width: 700px">
    <h1 class="mb-5 block text-6xl text-white-light">Features</h1>
    <div class="flex items-center justify-around">

      <div class="w-1/5">
        <div class="circle bg-pink-500">
          <div class="circle-image">
            <img src="/SVG/digital.svg" class="w-full" alt="">
          </div>
        </div>
      </div>

      <div class="w-1/5">
        <div class="circle bg-pink-500">
          <div class="circle-image">
            <img src="/SVG/dark.svg" class="w-full" alt="">
          </div>
        </div>
      </div>

      <div class="w-1/5">
        <div class="circle bg-pink-500">
          <div class="circle-image">
            <img src="/SVG/free.svg" class="w-full" alt="">
          </div>
        </div>
      </div>


    </div>


    <div class="flex items-center justify-around text-white-light mt-8">

      <div class="px-1 w-1/5">
        <p>1000+ Apps</p>
      </div>

      <div class="px-1 w-1/5">
        <p>Dark Mode</p>
      </div>

      <div class="px-1 w-1/5">
        <p>100% Free</p>
      </div>


    </div>
  </div>

</section>

<section>
  <div class="mx-auto w-full text-justify px-3" style="max-width: 700px">
    {{-- <h1 class="mb-5 block text-6xl text-white-light">About Us</h1> --}}
    @include('layouts.about')
  </div>
</section>


{{-- <section class="bg-blue" style="margin-top: -3px">
    <div class="container device-wrapper show-gt-tablet-portrait">
        <img src="/SVG/devices.png" class="device-img" alt="">
    </div>
    <div class="container text-white">
      <h1 class="col-tablet-portrait-7 text-shadow">An IOS Modding Hub</h1>
      <p class="col-tablet-portrait-7 mb-5">Our goal is to introduce people to the sideload and jailbreak IOS communities. We offer tools to get started, links you should visit, and hundreds of popular apps ready for download.</p>
      @if(Auth::guest())
        <a href="/login" class="btn btn-red">Login</a>
        <a href="/register" class="btn btn-white text-dark">Signup</a>
      @else
        <a href="/user/settings" class="btn btn-white text-dark">Dashboard</a>
      @endif
    </div>
    <canvas id="waves" class="bg-white"></canvas>
  </section>

  @include('layouts.about') --}}

@endsection


{{-- <script
src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
integrity="sha256-3edrmyuQ0w65f8gfBsqowzjJe2iM6n0nKciPUp8y+7E="
crossorigin="anonymous"></script>
<script src="/js/waves.js"></script> --}}
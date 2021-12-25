@extends('layouts.redesign', ["hide_nav" => true, "hide_ads" => true, "hide_back" => true])

@section('header')
<link rel="stylesheet" href="{{ mix('/css/markdown.css') }}">
<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.js"></script>
@endsection

@section('page')




{{--  <section class="text-xl p-3 bg-sky-500 mb-12 markdown">--}}
{{--    <h1 class="mb-1 block text-6xl text-black dark:text-white">iOS Haven</h1>--}}
{{--    <p class="mt-2">The Community Driven App Store</p>--}}
{{--  </section>--}}
{{--<section class="text-xl px-3 h-full bg-white dark:bg-black">--}}

{{--  <div class="mx-auto w-full text-center" style="max-width: 700px">--}}
{{--    <div class="mb-12">--}}
{{--      <script type='text/javascript' src='https://ko-fi.com/widgets/widget_2.js'></script>--}}
{{--      <script type='text/javascript'>--}}
{{--        kofiwidget2.init('Support Us on Ko-fi', '#29abe0', 'A0A83N15F');--}}
{{--        kofiwidget2.draw();--}}
{{--      </script>--}}
{{--    </div>--}}



{{--    <div class="flex items-center justify-center">--}}
{{--      <a href="/apps" class='btn-da mb-4 flex items-center justify-center mx-1 font-bold rounded-full text-sm px-5 py-2 text-white-light  bg-indigo-500'>--}}
{{--        <i class="fas fa-rocket mr-3 fa-lg"></i>--}}
{{--        LAUNCH--}}
{{--      </a>--}}
{{--    </div>--}}
{{--    <div class="flex items-center justify-center mb-4">--}}
{{--      <a href="/install?theme=dark" class='hide-webapp mx-1 flex items-center justify-center font-bold rounded-full text-sm px-5 py-2 bg-black dark:bg-white text-white dark:text-black'>--}}
{{--        <i class="fas fa-moon-stars mr-3 fa-lg"></i>--}}
{{--        INSTALL--}}
{{--      </a>--}}
{{--      <a href="/install?theme=light" class='hide-webapp mx-1 flex items-center justify-center font-bold rounded-full text-sm px-5 py-2 text-black-light bg-yellow-500'>--}}
{{--        <i class="fas fa-sun mr-3 fa-lg"></i>--}}
{{--        INSTALL--}}
{{--      </a>--}}
{{--    </div>--}}

{{--    <div class="flex items-center justify-center">--}}
{{--      <a href="{{ url('/themes')}}" class='hide-webapp mx-1 mb-12 flex items-center justify-center font-bold rounded-full text-sm px-5 py-2 bg-green-500 text-black dark:text-white'>--}}
{{--        <i class="fas fa-palette mr-3 fa-lg"></i>--}}
{{--        iOS 14 Themes--}}
{{--      </a>--}}
{{--    </div>--}}

{{--    <div class="flex items-center justify-center">--}}
{{--      <a href="altstore://source?url={{ url('/altstore/apps.json')}}" class='hide-webapp mx-1 mb-16 flex items-center justify-center font-bold rounded-full text-sm px-5 py-2 bg-pink-500 text-black dark:text-white'>--}}
{{--        <i class="fas fa-mobile-alt mr-3 fa-lg"></i>--}}
{{--        Open in ALTSTORE--}}
{{--      </a>--}}
{{--    </div>--}}




{{--    <img src="/img/iphonex.png" class="w-full">--}}
{{--  </div>--}}

{{--</section>--}}

{{--<section class="text-xl px-3 h-full bg-emerald-500" style="margin-top: -6%; padding-top: 15%; padding-bottom: 10%">--}}

{{--  <div class="mx-auto w-full text-center" style="max-width: 700px">--}}
{{--    <h1 class="mb-5 block text-6xl text-white-light">Features</h1>--}}
{{--    <div class="flex items-center justify-around">--}}

{{--      <div class="w-1/5">--}}
{{--        <div class="circle bg-pink-500">--}}
{{--          <div class="circle-image">--}}
{{--            <img src="/SVG/digital.svg" class="w-full" alt="">--}}
{{--          </div>--}}
{{--        </div>--}}
{{--      </div>--}}

{{--      <div class="w-1/5">--}}
{{--        <div class="circle bg-pink-500">--}}
{{--          <div class="circle-image">--}}
{{--            <img src="/SVG/dark.svg" class="w-full" alt="">--}}
{{--          </div>--}}
{{--        </div>--}}
{{--      </div>--}}

{{--      <div class="w-1/5">--}}
{{--        <div class="circle bg-pink-500">--}}
{{--          <div class="circle-image">--}}
{{--            <img src="/SVG/free.svg" class="w-full" alt="">--}}
{{--          </div>--}}
{{--        </div>--}}
{{--      </div>--}}


{{--    </div>--}}


{{--    <div class="flex items-center justify-around text-white-light mt-8">--}}

{{--      <div class="px-1 w-1/5">--}}
{{--        <p>1000+ Apps</p>--}}
{{--      </div>--}}

{{--      <div class="px-1 w-1/5">--}}
{{--        <p>Dark Mode</p>--}}
{{--      </div>--}}

{{--      <div class="px-1 w-1/5">--}}
{{--        <p>100% Free</p>--}}
{{--      </div>--}}


{{--    </div>--}}
{{--  </div>--}}

{{--</section>--}}

<main class="mx-auto lg:max-w-screen-lg max-w-prose selection:bg-red-500 selection:text-white px-3">

<section class="text-center mt-4 mb-8 select-none block">
  <h1 class="uppercase font-bold text-3xl mt-2 hover:underline hover:decoration-2 hover:decoration-red-500">iOS Haven</h1>
  <h2 class="uppercase">Power User Community</h2>
  <div class="flex items-center justify-center mb-4 mt-4">
    <a href="/install?theme=dark" class='hide-webapp mx-1 flex items-center justify-center font-bold rounded-md text-sm px-5 py-1 bg-black dark:bg-white text-white dark:text-black'>
      <i class="fas fa-moon-stars mr-3 fa-lg"></i>
      INSTALL
    </a>
    <a href="/install?theme=light" class='hide-webapp mx-1 flex items-center justify-center font-bold rounded-md text-sm px-5 py-1 text-black-light bg-yellow-500'>
      <i class="fas fa-sun mr-3 fa-lg"></i>
      INSTALL
    </a>
  </div>
  <hr class="mx-auto w-16 border-stone-300 dark:border-slate-700 my-4">
  @yield('blog-header')
</section>



<section class="grid md:grid-cols-2 lg:grid-cols-3 gap-5 mb-5 masonry2 invisible">
  {{--  @foreach($posts as $post)--}}
  @component('components.post', [
      "url" => "/apps",
      "image" => "https://images.unsplash.com/photo-1611162617213-7d7a39e9b1d7",
      "title" => "2000+ Apps",
      "subtitle" => "Tweaked, Modded, and Covert Apps"
  ])@endcomponent

  @component('components.post', [
      "url" => "/games",
      "image" => "https://images.unsplash.com/photo-1587573089283-f14c65841f75",
      "title" => "Gaming Collection",
      "subtitle" => "Tweaked, Hacked, and Free Games"
  ])@endcomponent

  @component('components.post', [
      "url" => "/themes",
      "image" => "https://images.unsplash.com/photo-1569172122301-bc5008bc09c5",
      "title" => "Fashionable Themes",
      "subtitle" => "Curated Themes for High Fashion"
  ])@endcomponent

  @component('components.post', [
      "url" => "/search",
      "image" => "https://images.unsplash.com/photo-1490127252417-7c393f993ee4",
      "title" => "Powerful Search Engine",
      "subtitle" => "Find More With Less"
  ])@endcomponent

  @component('components.post', [
      "url" => "/blog",
      "image" => "https://images.unsplash.com/photo-1521714161819-15534968fc5f",
      "title" => "Tutorials and News",
      "subtitle" => "Read Community Blog"
  ])@endcomponent

  @component('components.post', [
      "url" => "/shortcuts",
      "image" => "https://imgur.com/PtW5Uxl.png",
      "title" => "Shortcuts",
      "subtitle" => "Browse Apple Shortcuts"
  ])@endcomponent
  {{--  @endforeach--}}
</section>


    @component('ads.google-home-page')@endcomponent

<section class="text-center mt-4 mb-8 select-none block">
{{--  <a href="/blog" class="font-bold text-3xl mt-2 hover:underline hover:decoration-2 hover:decoration-red-500">iPA Insider</a>--}}
  <a href="/blog" class="uppercase hover:underline hover:decoration-2 hover:decoration-red-500">Most Recent Stories</a>
  <hr class="mx-auto w-16 border-stone-300 dark:border-slate-700 my-4">
  @yield('blog-header')
</section>

<section class="grid md:grid-cols-2 lg:grid-cols-3 gap-5 mb-5 masonry1 invisible">
  @foreach($posts as $post)
    @component('components.post', [
        "url" => $post->url,
        "image" => $post->image,
        "title" => $post->title,
        "subtitle" => $post->subtitle,
        "description" => $post->description
    ])@endcomponent
  @endforeach
</section>

<script>
  var elem1 = document.querySelector('.masonry1');
  var msnry1 = new Masonry( elem1, {
    // options
    itemSelector: '.grid-item',
    transitionDuration: 0,
    initLayout: false
  });
  msnry1.on('layoutComplete', function () {
    elem1.classList.remove('invisible')
  })
  msnry1.layout()

  var elem2 = document.querySelector('.masonry2');
  var msnry2 = new Masonry( elem2, {
    // options
    itemSelector: '.grid-item',
    transitionDuration: 0,
    initLayout: false
  });
  msnry2.on('layoutComplete', function () {
    elem2.classList.remove('invisible')
  })
  msnry2.layout()
</script>

<section>
  <div class="mx-auto w-full px-3" style="max-width: 700px">
    {{-- <h1 class="mb-5 block text-6xl text-white-light">About Us</h1> --}}
    @include('layouts.about')
  </div>
</section>

<footer class="text-center my-8 select-none">
  <hr class="mx-auto w-16 border-stone-300 dark:border-slate-700">
  <p class="text-lg font-mono py-5">
    <a href="https://ioshaven.com" class="hover:underline">iOS Haven</a> &copy; {{now()->year}}</p>
</footer>

</main>


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
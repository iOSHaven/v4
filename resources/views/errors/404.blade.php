@extends('layouts.redesign', ["hide_nav" => true, "hide_ads" => true])

@section("content")
<div class="fixed top-0 left-0 right-0 bottom-0 -z-1"></div>
<div class="mx-auto w-full text-center mt-12 px-3" style="max-width: 700px">
        <img src="/SVG/404.svg" alt="" class="w-full mx-auto" style="max-width: 200px">
        <h1 class="font-display text-lg">This page does not exist.</h1>
        <a href="/apps" class='mt-5 mb-8 flex items-center justify-center mx-1 font-bold rounded-full text-sm px-8 py-5 text-white-light {{ theme("bg-indigo") }}'>
            <i class="fas fa-layer-group mr-2 fa-lg"></i>
            Apps
        </a>
</div>
@endsection
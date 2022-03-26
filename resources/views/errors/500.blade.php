@extends('layouts.redesign', ["hide_nav" => true, "hide_ads" => true])

@section("content")
<div class="fixed top-0 left-0 right-0 bottom-0 -z-1"></div>
<div class="mx-auto w-full text-center mt-12 px-3" style="max-width: 700px">
        <img src="/SVG/contact.bug.svg" alt="" class="w-full mx-auto" style="max-width: 200px">
        <h1 class="font-display text-lg">This is not supposed to happen! Please report this bug.</h1>
        <h1 class="font-display text-4xl">500</h1>

        <x-simple-button href="/apps" class="border border-white text-white w-40 mx-auto mt-4">
            <i class="fas fa-layer-group mr-3 fa-lg"></i>
            <span class="uppercase">Apps</span>
        </x-simple-button>

        <hr class="w-40 mx-auto my-6 border border-gray-200 dark:border-gray-800">

        <div class="markdown mt-4 w-96 mx-auto">
            <p>This page appears to be broken!  Please report this problem!  We want to fix this issue as soon as possible!</p>
        </div>

        <x-twitter-button class="w-40 mx-auto py-2 mt-3" text="report" :message='"Hello @ioshavencom, this URL has a 500 error: \n\n" . url()->current()'/>
</div>
@endsection
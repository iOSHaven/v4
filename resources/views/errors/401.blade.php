@extends('layouts.redesign', ["hide_nav" => true, "hide_ads" => true])

@section("content")
<div class="fixed top-0 left-0 right-0 bottom-0 -z-1"></div>
<div class="mx-auto w-full text-center mt-12 px-3" style="max-width: 700px">
    <img src="/SVG/login.svg" alt="" class="w-full mx-auto" style="max-width: 200px">
    <h1 class="font-display text-lg">Please login before you try to view this page.</h1>
    <h1 class="font-display text-4xl">401</h1>

    <x-simple-button href="/login" class="border border-white text-white w-40 mx-auto mt-4">
        <i class="fas fa-sign-in-alt mr-3 fa-lg"></i>
        <span class="uppercase">Login</span>
    </x-simple-button>

    <hr class="w-40 mx-auto my-6 border border-gray-200 dark:border-gray-800">

    <div class="markdown w-96 mx-auto">
        <p>You do not have permission to view this page.  Please try to log in before viewing this page.  If this error is a recurring issue, we would greatly appreciate your assistance on reporting this error.</p>
    </div>

    <x-twitter-button class="w-40 mx-auto mt-6" text="report" :message='"Hello @ioshavencom, this page has a 401 error: \n\n" . url()->current()'/>

</div>
@endsection
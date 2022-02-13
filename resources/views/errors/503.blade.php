@extends('layouts.redesign', ["hide_ads" => true])

@section("content")
<div class="fixed top-0 left-0 right-0 bottom-0 -z-1"></div>
<div class="mx-auto w-full text-center mt-12 px-3" style="max-width: 700px">
        <img src="/SVG/503.svg" alt="" class="w-full mx-auto" style="max-width: 200px">
        <h1 class="font-display text-lg">We're working on our servers. We'll be back shortly.</h1>
        <h1 class="font-display text-4xl">503</h1>


        <hr class="w-40 mx-auto my-6 border border-gray-200 dark:border-gray-800">

        <div class="markdown mt-4 w-96 mx-auto">
                <p>We appear to be working on the server and breaking everything in the process.  Please report this issue to be sure that we are aware of the problem.  We want to fix this site as soon as possible!</p>
        </div>

        <x-twitter-button class="w-40 mx-auto py-2 mt-3" text="report" :message='"Hello @ioshavencom, this URL has a 503 error: \n\n" . url()->current()'/>
        
</div>
@endsection
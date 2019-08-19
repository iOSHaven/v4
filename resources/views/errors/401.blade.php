@extends('layouts.redesign', ["hide_nav" => true])

@section("content")
<div class="fixed top-0 left-0 right-0 bottom-0 -z-1"></div>
<div class="mx-auto w-full text-center mt-12 px-3" style="max-width: 700px">
        <img src="/SVG/login.svg" alt="" class="w-full mx-auto" style="max-width: 200px">
        <h1 class="font-display text-lg">Please login before you try to view this page.</h1>
        <h1 class="font-display text-4xl">401</h1>
        <a href="/login" class='mb-8 flex items-center justify-center mx-1 font-bold rounded-full text-sm px-8 py-5 text-white-light {{ theme("bg-indigo") }}'>
            <i class="fas fa-sign-in-alt mr-3 fa-lg"></i>
            LOGIN
        </a>
</div>
@endsection
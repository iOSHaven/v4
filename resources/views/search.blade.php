@extends('layouts.redesign', ["hide_footer" => true, "title" => "Search"])



@section('content')

<div id="vuescope" class="mt-3">
<div class="fixed flex items-center justify-start relative rounded-full {{ theme('bg-gray-100') }}">
    <i class="far fa-search absolute p-3"></i>
    <input type="text" placeholder="Search" class="border-0 w-full pl-10 py-2 bg-transparent" v-model="searchinput">
</div>

<search-results theme="{{ theme() }}" :phpdata="{{ $apps }}"></search-results>
{{-- <ul class="border-t {{ theme('border-gray-200') }}">
    <!-- Search result -->
    <li href="" class="flex items-center justify-between py-2 border-b {{ theme('border-gray-200') }}">
        <a href="#page" class="flex items-center justify-start overflow-hidden">
            <img class="rounded-lg mr-3" src="https://ioshavenco.s3.us-east-2.amazonaws.com/icons/Zombie+Rollerz.jpg" alt="" height="25" width="25">
            <span class="truncate">Some app title that is longer than most</span>
        </a>
        <div class="flex flex-grow">
            @component('components.button', ["href"=> "#", "bg" => "gray-100", "color" => "blue"]) IPA @endcomponent
            @component('components.button', ["href"=> "#", "bg" => "blue", "color" => "white"]) GET @endcomponent
        </div>
    </li>

    <!-- Search result -->
    <li href="" class="flex items-center justify-between py-2 border-b {{ theme('border-gray-200') }}">
        <a href="#page" class="flex items-center justify-start overflow-hidden">
            <img class="rounded-lg mr-3" src="https://ioshavenco.s3.us-east-2.amazonaws.com/icons/Zombie+Rollerz.jpg" alt="" height="25" width="25">
            <span class="truncate">Some app title that not quite as long</span>
        </a>
        <div class="flex flex-grow">
            @component('components.button', ["href"=> "#", "bg" => "gray-100", "color" => "blue"]) IPA @endcomponent
            @component('components.button', ["href"=> "#", "bg" => "blue", "color" => "white"]) GET @endcomponent
        </div>
    </li>
    
</ul> --}}
</div>


<h1 class="mt-3">Categories</h1>
<div class="flex flex-wrap -mx-1">
    @component('components.category', [
        "title" => "Hacks",
        "icon" => "fas fa-user-secret",
        "link" => "/apps?tags=hack&title=Hacked%20Apps",
        "bg" => "red",
    ])@endcomponent
    @component('components.category', [
        "title" => "Free",
        "icon" => "fas fa-gift",
        "link" => "/apps?tags=free&title=Free%20Apps",
        "bg" => "red",
    ])@endcomponent
    @component('components.category', [
        "title" => "Music",
        "icon" => "fas fa-music",
        "link" => "/apps?tags=music&title=Music%20Apps",
        "bg" => "red",
    ])@endcomponent
    @component('components.category', [
        "title" => "Movie",
        "icon" => "fas fa-popcorn",
        "link" => "/apps?tags=movie&title=Movie%20Apps",
        "bg" => "red",
    ])@endcomponent
    @component('components.category', [
        "title" => "Emulator",
        "icon" => "fas fa-gamepad",
        "link" => "/apps?tags=emulator&title=Emulators",
        "bg" => "red",
    ])@endcomponent
    @component('components.category', [
        "title" => "Jailbreak",
        "icon" => "fas fa-lock-open-alt",
        "link" => "/jailbreaks",
        "bg" => "red",
    ])@endcomponent
</div>




<h1 class="mt-3">Providers</h1>
<div class="flex flex-wrap -mx-1">
        @component('components.category', [
            "title" => "App Valley",
            "icon" => "fab fa-app-store-ios",
            "link" => "/apps?by=app-valley&title=Apps%20from%20App%20Valley",
            "bg" => "green",
        ])@endcomponent
        @component('components.category', [
            "title" => "iOSGods",
            "icon" => "fab fa-app-store-ios",
            "link" => "/apps?by=iosgods&title=Apps%20from%20iOSGods",
            "bg" => "green",
        ])@endcomponent
        @component('components.category', [
            "title" => "Tweakbox",
            "icon" => "fab fa-app-store-ios",
            "link" => "/apps?by=tweakbox&title=Apps%20from%20TweakBox",
            "bg" => "green",
        ])@endcomponent
        @component('components.category', [
            "title" => "Ignition",
            "icon" => "fab fa-app-store-ios",
            "link" => "/apps?by=ignition&title=Apps%20from%20Ignition",
            "bg" => "green",
        ])@endcomponent
        @component('components.category', [
            "title" => "TopStore",
            "icon" => "fab fa-app-store-ios",
            "link" => "/apps?by=topstore&title=Apps%20from%20TopStore",
            "bg" => "green",
        ])@endcomponent


</div>


<h1 class="mt-3">Download Type</h1>
<div class="flex flex-wrap -mx-1">
    @component('components.category', [
        "title" => "Install Now",
        "icon" => "fas fa-cloud-download-alt",
        "link" => "/apps?type=signed",
        "bg" => "blue",
    ])@endcomponent
    @component('components.category', [
        "title" => "IPA Archive",
        "icon" => "fas fa-file-archive",
        "link" => "/apps?type=ipa",
        "bg" => "blue",
    ])@endcomponent
</div>






@endsection

@section('footer')
<script src="{{ mix('/js/app.min.js') }}"></script>
@endsection
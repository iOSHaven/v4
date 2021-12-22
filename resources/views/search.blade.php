@extends('layouts.redesign', ["hide_footer" => true, "title" => "Search"])

@section('header')
@include('ads.prop-push-notifications-with-worker')
@endsection

@section('content')

<div id="vuescope" class="mt-3">
    <div class="fixed flex items-center justify-start relative rounded-full bg-white dark:bg-black">
        <i class="far fa-search absolute p-3"></i>
        <input type="text" placeholder="Search" class="border-0 w-full pl-10 py-2 bg-transparent" v-model="searchinput">
    </div>

    <search-results theme="{{ theme() }}" :phpdata='@json($models)'></search-results>
</div>


<h1 class="mt-3">Categories</h1>
<div class="flex flex-wrap -mx-1">
    @component('components.category', [
    "title" => "Hacks",
    "icon" => "fas fa-user-secret",
    "link" => "/apps?tags=hack&title=Hacked%20Apps",
    "bg" => "red-500",
    ])@endcomponent
    @component('components.category', [
    "title" => "Free",
    "icon" => "fas fa-gift",
    "link" => "/apps?tags=free&title=Free%20Apps",
    "bg" => "red-500",
    ])@endcomponent
    @component('components.category', [
    "title" => "Music",
    "icon" => "fas fa-music",
    "link" => "/apps?tags=music&title=Music%20Apps",
    "bg" => "red-500",
    ])@endcomponent
    @component('components.category', [
    "title" => "Movie",
    "icon" => "fas fa-popcorn",
    "link" => "/apps?tags=movie&title=Movie%20Apps",
    "bg" => "red-500",
    ])@endcomponent
    @component('components.category', [
    "title" => "Emulator",
    "icon" => "fas fa-gamepad",
    "link" => "/apps?tags=emulator&title=Emulators",
    "bg" => "red-500",
    ])@endcomponent
    @component('components.category', [
    "title" => "Jailbreak",
    "icon" => "fas fa-lock-open-alt",
    "link" => "/jailbreaks",
    "bg" => "red-500",
    ])@endcomponent
</div>

@component('ads.google-header')@endcomponent


<h1 class="mt-3">Providers</h1>
<div class="flex flex-wrap -mx-1">
    @foreach($providers as $provider)
    <div class="w-1/2 p-1 ">
        <a href="/apps?by={{ $provider->name }}&title=Apps by {{ $provider->name }}" class="flex shadow rounded-lg p-2 bg-white dark:bg-black">
            <div class="flex items-center">
                @component('components.tinyProviderIcon', ["provider" => $provider, "size" => 30])@endcomponent
                <div class="ml-1 text-sm">
                    <div>{{ $provider->name }}</div>
                    @unless($provider->revoked)
                    <div class="text-emerald-500 font-bold text-sm">
                        <span class="mr-1">Working</span>
                        <i class="fas fa-check-circle"></i>
                    </div>
                    @else
                    <div class="text-red-500 font-bold text-sm">
                        <span class="mr-1">Revoked</span>
                        <i class="fas fa-times-octagon"></i>
                    </div>
                    @endif
                </div>
            </div>
        </a>

    </div>
    @endforeach
</div>


<h1 class="mt-3">Download Type</h1>
<div class="flex flex-wrap -mx-1">
    @component('components.category', [
    "title" => "Install Now",
    "icon" => "fas fa-cloud-download-alt",
    "link" => "/apps?type=signed&working=true",
    "bg" => "blue-500",
    ])@endcomponent
    @component('components.category', [
    "title" => "IPA Archive",
    "icon" => "fas fa-file-archive",
    "link" => "/apps?type=ipa&working=true",
    "bg" => "blue-500",
    ])@endcomponent
</div>






@endsection

@section('footer')
<script src="{{ mix('/js/app.min.js') }}"></script>
@endsection
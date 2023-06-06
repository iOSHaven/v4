@extends('layouts.redesign', ["hide_footer" => true, "title" => __("strings.Search")])

<!-- @section('header')
{{--@include('ads.prop-push-notifications-with-worker')--}}
@endsection -->
    @vite(['resources/assets/js/app.js'])
@push('styles')

@endpush


@section('content')

<form action="/search" method="get">
    <div class="mt-3">
        <div class="fixed flex items-center justify-start relative rounded-full bg-white dark:bg-black">
            <i class="far fa-search absolute p-3"></i>
            <input type="text" name="q" placeholder="Search"
                   @unless(empty($search)) value="{{ $search }}" @endunless
                   class="border-0 w-full pl-10 py-2 bg-transparent">
{{--            <i class="far fa-paper-plane-top absolute p-3 right-0"></i>--}}
            <div class="absolute flex items-center right-5">
                <button type="button" class="mr-3" onclick="this.form.q.value = ''">
                    <i class="f7-icons text-lg text-gray-700">xmark_circle</i>
                </button>
                <button type="submit">
                    <i class="f7-icons text-lg text-gray-700">paperplane_fill</i>
                </button>
            </div>

        </div>
    </div>
</form>

@unless(count($apps) + count($shortcuts))
    <p class="mx-auto text-center">No results found</p>
@endunless

@if(count($apps))
    <h1 class="mt-3">{{ __("strings.Apps") }}</h1>
    <ul class="flex flex-wrap -mx-1 divide-y divide-gray-200">
        @foreach($apps as $app)
            <li class="flex items-center justify-between w-full md:w-1/2 lg:w-1/3 px-3">
                <a href="/apps/{{$app->uid}}" class="w-full flex items-center justify-start overflow-hidden py-3">
                    <img src="{{ $app->image }}" alt="" class="rounded-lg w-[40px] h-[40px] mr-3">
                    <div>{{ $app->name }}</div>
                </a>
                <div class="-ml-4">
                    <i class="f7-icons">chevron_right</i>
                </div>
            </li>
        @endforeach
    </ul>
@endif

@if(count($shortcuts))
    <h1 class="mt-3">{{ __("strings.Shortcuts") }}</h1>
    <ul class="flex flex-wrap -mx-1 divide-y divide-gray-200">
        @foreach($shortcuts as $shorcut)
            <li class="flex items-center justify-between w-full md:w-1/2 lg:w-1/3 px-3">
                <a href="/shortcuts/{{$shorcut->uid}}" class="w-full flex items-center justify-start overflow-hidden py-3">
                    <img src="{{ $shorcut->icon }}" alt="" class="rounded-lg w-[40px] h-[40px] mr-3">
                    <div>{{ $shorcut->name }}</div>
                </a>
                <div class="-ml-4">
                    <i class="f7-icons">chevron_right</i>
                </div>
            </li>
        @endforeach
    </ul>
@endif


<h1 class="mt-3">{{ __("strings.Categories") }}</h1>
<div class="flex flex-wrap -mx-1">
    @component('components.category', [
    "title" => __("strings.Hacks"),
    "icon" => "fas fa-user-secret",
    "link" => "/apps?tags=hack&title=Hacked%20Apps",
    "bg" => "red-500",
    ])@endcomponent
    @component('components.category', [
    "title" => __("strings.Free"),
    "icon" => "fas fa-gift",
    "link" => "/apps?tags=free&title=Free%20Apps",
    "bg" => "red-500",
    ])@endcomponent
    @component('components.category', [
    "title" => __("strings.Music"),
    "icon" => "fas fa-music",
    "link" => "/apps?tags=music&title=Music%20Apps",
    "bg" => "red-500",
    ])@endcomponent
    @component('components.category', [
    "title" => __("strings.Movies"),
    "icon" => "fas fa-popcorn",
    "link" => "/apps?tags=movie&title=Movie%20Apps",
    "bg" => "red-500",
    ])@endcomponent
    @component('components.category', [
    "title" => __("strings.Emulators"),
    "icon" => "fas fa-gamepad",
    "link" => "/apps?tags=emulator&title=Emulators",
    "bg" => "red-500",
    ])@endcomponent
    @component('components.category', [
    "title" => __("strings.Jailbreaks"),
    "icon" => "fas fa-lock-open-alt",
    "link" => "/jailbreaks",
    "bg" => "red-500",
    ])@endcomponent
</div>

{{--@component('ads.google-header')@endcomponent--}}
{{--@component('ads.social-bar')@endcomponent--}}


<h1 class="mt-3">{{ __("strings.Providers") }}</h1>
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
                        <span class="mr-1">{{ __("strings.Working") }}</span>
                        <i class="fas fa-check-circle"></i>
                    </div>
                    @else
                    <div class="text-red-500 font-bold text-sm">
                        <span class="mr-1">{{ __("strings.Revoked") }}</span>
                        <i class="fas fa-times-octagon"></i>
                    </div>
                    @endif
                </div>
            </div>
        </a>

    </div>
    @endforeach
</div>


<h1 class="mt-3">{{ __("strings.Type of Download") }}</h1>
<div class="flex flex-wrap -mx-1">
    @component('components.category', [
    "title" => __("strings.Direct Install"),
    "icon" => "fas fa-cloud-download-alt",
    "link" => "/apps?type=signed&working=true",
    "bg" => "blue-500",
    ])@endcomponent
    @component('components.category', [
    "title" => __("strings.IPA Archive"),
    "icon" => "fas fa-file-archive",
    "link" => "/apps?type=ipa&working=true",
    "bg" => "blue-500",
    ])@endcomponent
</div>






@endsection

@section('footer')
<script src="{{ mix('/js/app.min.js') }}"></script>
@endsection
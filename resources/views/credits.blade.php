@extends('layouts.redesign')

@section('header')
    <link rel="stylesheet" href="{{ mix('/css/markdown.css') }}">
@endsection

@section('content')

<div>
  <div class="markdown">
    <h3>Developers</h3>
  </div>

  <ul class="divide-y border border-neutral-200 dark:border-neutral-800 divide-inherit rounded-sm">
    <li class="flex items-center justify-center p-3">
      <div class="w-2/3">
        <div class="font-bold">Zeb</div>
        <div class="text-sm">Risk Taker, Networking/Reach, & Software Engineer</div>
      </div>
      <div class="w-1/3 text-right">
        <a href="https://twitter.com/wizardzeb" target="_blank"><i class="fab fa-twitter fa-lg"></i></a>
      </div>
    </li>
    <li class="flex items-center justify-center p-3">
      <div class="w-2/3">
        <div class="font-bold">Zack</div>
        <div class="text-sm">Anchor/Presenter, Brand Awareness, & Professional Support</div>
      </div>
      <div class="w-1/3 text-right">
       <a href="https://twitter.com/_ZackBz" target="_blank"><i class="fab fa-twitter fa-lg"></i></a>
      </div>
    </li>
    <li class="flex items-center justify-center p-3">
      <div class="w-2/3">
        <div class="font-bold">Smile</div>
        <div class="text-sm">Shortcut Innovator, Japanese Translator, & Student Helper</div>
      </div>
      <div class="w-1/3 text-right">
       <a href="https://twitter.com/Smiledayo_" target="_blank"><i class="fab fa-twitter fa-lg"></i></a>
      </div>
    </li>
    <li class="flex items-center justify-center p-3">
      <div class="w-2/3">
        <div class="font-bold">Nerk</div>
        <div class="text-sm">Game Guru & Free Spirit</div>
      </div>
      <div class="w-1/3 text-right">
       <a href="https://discord.gg/kK4TJBf" target="_blank"><i class="fab fa-discord fa-lg"></i></a>
      </div>
    </li>
  </ul>
</div>

<?php
  $app_providers = [
    [
      "name" => "AppValley",
      "links" => [
        "fal fa-globe" => "https://app-valley.vip/"
      ]
    ],
    [
      "name" => "TweakBox",
      "links" => [
        "fal fa-globe" => "https://www.tweakboxapp.com/"
      ]
    ],
    [
      "name" => "SideloadBox",
      "links" => [
        "fal fa-globe" => "https://sideload.tweakboxapp.com/"
      ]
    ],
    [
      "name" => "iOS Gods",
      "links" => [
        "fal fa-globe" => "https://iosgods.com"
      ]
    ],
    [
      "name" => "Ignition",
      "links" => [
        "fal fa-globe" => "https://ignition.fun/"
      ]
    ],
  ];
?>

<div class="">
  <div class="markdown">
    <h3>App Providers</h3>
  </div>

  <ul class="divide-y border border-neutral-200 dark:border-neutral-800 divide-inherit rounded-sm">
    @foreach(\App\Provider::get() as $provider)
{{--      @dump($provider)--}}
    <li class="flex items-center justify-center p-3">
      <div class="w-2/3 flex items-center">
          <x-tinyProviderIcon :src="$provider->avatar" class="mr-2"></x-tinyProviderIcon>
          <div>{{ $provider->name }}</div>
      </div>
      <div class="w-1/3 text-right">
{{--        @foreach($provider["links"] as $icon => $link)--}}
          <a href="{{ $provider->website }}" target="_blank"><i class="fal fa-globe fa-lg"></i></a>
{{--        @endforeach--}}
      </div>
    </li>
    @endforeach
  </ul>
</div>



@endsection

@extends('layouts.redesign')

@section('header')
    <link rel="stylesheet" href="{{ mix('/css/markdown.css') }}">
@endsection

@section('content')

<div class="markdown">
  <h3>Developers</h3>
  <ul>
    <li class="flex items-center justify-center my-1">
      <div class="w-2/3">Zeb - Software Engineer</div>
      <div class="w-1/3 text-right">
        <!-- <a href="https://www.reddit.com/user/zebthewizard/" target="_blank"><i class="fab fa-reddit"></i></a> -->
        <a href="https://twitter.com/wizardzeb" target="_blank"><i class="fab fa-twitter fa-lg"></i></a>
      </div>
    </li>
    <li class="flex items-center justify-center my-1">
      <div class="w-2/3">Zack - Site Maintainer
      </div>
      <div class="w-1/3 text-right">
       <a href="https://twitter.com/_ZackBz" target="_blank"><i class="fab fa-twitter fa-lg"></i></a>
      </div>
    </li>
    <li class="flex items-center justify-center my-1">
      <div class="w-2/3">Nick - Nerk
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

<div class="markdown">
  <h3>App Providers</h3>
  <ul>
    @foreach($app_providers as $provider)
    <li class="flex items-center justify-center my-1">
      <div class="w-2/3">{{ $provider["name"] }}</div>
      <div class="w-1/3 text-right">
        @foreach($provider["links"] as $icon => $link)
          <a href="{{ $link }}" target="_blank"><i class="{{ $icon }} fa-lg"></i></a>
        @endforeach
      </div>
    </li>
    @endforeach
  </ul>
</div>



@endsection
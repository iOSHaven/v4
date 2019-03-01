@extends('layouts.redesign')
@section('content')

<div class="container">
  <div class="h3 m-0">Developers</div>
  <ul class="p-0 m-0">
    <li class="flex-cc text my-1">
      <div class="col-8">Zeb - Software Engineer</div>
      <div class="col-4 text-right">
        <!-- <a href="https://www.reddit.com/user/zebthewizard/" target="_blank"><i class="fab fa-reddit"></i></a> -->
        <a href="https://twitter.com/wizardzeb" target="_blank"><i class="fab fa-twitter"></i></a>
      </div>
    </li>
    <li class="flex-cc text my-1">
      <div class="col-8">Zack - Site Maintainer
      </div>
      <div class="col-4 text-right">
       <a href="https://twitter.com/_ZackBz" target="_blank"><i class="fab fa-twitter"></i></a>
      </div>
    </li>
  </ul>
</div>

<?php 
  $app_providers = [
    [
      "name" => "Emus4",
      "links" => [
        "fal fa-globe" => "https://www.iinstaller.net/"
      ]
    ],
    [
      "name" => "IraqStore",
      "links" => [
        "fal fa-globe" => "https://ir4q.store"
      ]
    ],
    [
      "name" => "AppValley",
      "links" => [
        "fal fa-globe" => "https://appvalley.vip"
      ]
    ],
    [
      "name" => "Hassan Abdullah",
      "links" => [
        "fab fa-twitter" => "https:?/twittter.com/kakaswr22"
      ]
    ],
    [
      "name" => "TweakBox",
      "links" => [
        "fal fa-globe" => "https://tweakboxapp.com"
      ]
    ],
    [
      "name" => "IOS Gods",
      "links" => [
        "fal fa-globe" => "https://iosgods.com"
      ]
    ],
    [
      "name" => "TweakBox",
      "links" => [
        "fal fa-globe" => "https://tweakboxapp.com"
      ]
    ],
  ];
?>

<div class="container">
  <div class="h3 mt-4 mb-0">App Providers</div>
  <ul class="p-0 m-0">
    @foreach($app_providers as $provider)
    <li class="flex-cc text my-1">
      <div class="col-8">{{ $provider["name"] }}</div>
      <div class="col-4 text-right">
        @foreach($provider["links"] as $icon => $link)
          <a href="{{ $link }}" target="_blank"><i class="{{ $icon }}"></i></a>
        @endforeach
      </div>
    </li>
    @endforeach
  </ul>
</div>



<!-- 
<li class="flex-cc">
  <div class="col-8"></div>
  <div class="col-4">
    
  </div>
</li>




<ul class="fancy bigger socials">
        <li>Emus4<a href="https://twitter.com/Emus4you" target="_blank"><i class="fab fa-twitter"></i></a></li>
        <li>IraqStore<a href="https://ir4q.store" target="_blank"><i class="fal fa-globe"></i></a></li>
        <li>AppValley<a href="https://twitter.com/appvalley_vip" target="_blank"><i class="fab fa-twitter"></i></a></li>
        <li>Hassan Abdullah<a href="https://twitter.com/kakaswr22" target="_blank"><i class="fab fa-twitter"></i></a></li>
        <li>TweakBoxApp<a href="https://twitter.com/TweakBoxApp" target="_blank"><i class="fab fa-twitter"></i></a></li>
        <li>iOSGods<a href="https://iosgods.com/" target="_blank"><i class="fal fa-globe"></i></a></li>
        <li>CetaceanNation<a href="https://twitter.com/CetaceanNation" target="_blank"><i class="fab fa-twitter"></i></a></li>
      </ul>
   -->
<!-- <div class="wrapper markdown">
  <div class="heading">
      iOS Haven Staff
  </div>
      <ul class="fancy bigger socials">
        <li>Zeb - Developer <span>
          <a href="https://www.reddit.com/user/zebthewizard/" target="_blank"><i class="fab fa-reddit"></i></a>
          <a href="https://twitter.com/gfxrrr" target="_blank"><i class="fab fa-twitter"></i></a>
        </span></li>
        <li>Zack - Developer<a href="https://twitter.com/_ZackBz" target="_blank"><i class="fab fa-twitter"></i></a></li>
        <li>343 - Discord Moderator</li>
      </ul>

    <div class="heading">
      App Developers
    </div>
    <ul class="fancy bigger socials">
      <li>UnlimApps | ++ Tweaks<a href="https://twitter.com/unlimapps" target="_blank"><i class="fab fa-twitter"></i></a></li>
      <li>Majd Alfhaily | IG Rocket &amp; Cercube<a href="https://twitter.com/freemanrepo" target="_blank"><i class="fab fa-twitter"></i></a></li>
      <li>CokePokes | Phantom for Snapchat<a href="https://twitter.com/CokePokes" target="_blank"><i class="fab fa-twitter"></i></a></li>
      <li>Othman Alomiry | Snapchat SCOthman<a href="https://twitter.com/OthmanAl3miry" target="_blank"><i class="fab fa-twitter"></i></a></li>
      <li>Pokego++ | Pokego++<a href="https://pokego2.com/" target="_blank"><i class="fal fa-globe"></i></a></li>
      <li>Bobby Movie &amp; Bobby Music<a href="https://twitter.com/bobbymovie" target="_blank"><i class="fab fa-twitter"></i></a></li>
      <li>Playbox | CinemaBox PB<a href="https://twitter.com/playbox_hd" target="_blank"><i class="fab fa-twitter"></i></a></li>
      <li>Popcorn Time | Popcorn Time<a href="https://popcorn-time.to/" target="_blank"><i class="fal fa-globe"></i></a> </li>
      <li>EveryCord | EveryCord<a href="https://twitter.com/everycord" target="_blank"><i class="fab fa-twitter"></i></a></li>
      <li>F.lux | F.lux<a href="https://justgetflux.com/" target="_blank"><i class="fal fa-globe"></i></a></li>
      <li>Ivano Bilenchi | iCleaner<a href="https://ib-soft.net/" target="_blank"><i class="fal fa-globe"></i></a></li>
      <li>iDarkmode | iDarkmode<a href="https://twitter.com/idarkmode" target="_blank"><i class="fab fa-twitter"></i></a></li>
      <li>MasonD3V | iTD App<a href="https://twitter.com/MasonD3V" target="_blank"><i class="fab fa-twitter"></i></a></li>
      <li>AppleAddict | App Drawer<a href="https://twitter.com/AplAddict" target="_blank"><i class="fab fa-twitter"></i></a></li>
      <li>SwiftlyDesign | App Drawer<a href="https://twitter.com/SwiftlyDesign" target="_blank"><i class="fab fa-twitter"></i></a></li>
    </ul>

    <div class="heading">
      App Providers
    </div>
    <div>
      <ul class="fancy bigger socials">
        <li>Emus4<a href="https://twitter.com/Emus4you" target="_blank"><i class="fab fa-twitter"></i></a></li>
        <li>IraqStore<a href="https://ir4q.store" target="_blank"><i class="fal fa-globe"></i></a></li>
        <li>AppValley<a href="https://twitter.com/appvalley_vip" target="_blank"><i class="fab fa-twitter"></i></a></li>
        <li>Hassan Abdullah<a href="https://twitter.com/kakaswr22" target="_blank"><i class="fab fa-twitter"></i></a></li>
        <li>TweakBoxApp<a href="https://twitter.com/TweakBoxApp" target="_blank"><i class="fab fa-twitter"></i></a></li>
        <li>iOSGods<a href="https://iosgods.com/" target="_blank"><i class="fal fa-globe"></i></a></li>
        <li>CetaceanNation<a href="https://twitter.com/CetaceanNation" target="_blank"><i class="fab fa-twitter"></i></a></li>
      </ul>
    </div>

    <div class="heading">
      Jailbreak Developers
    </div>
    <div>
      <ul class="fancy bigger socials">
        <li>qwertyoruiopz | yalu102 <a href="https://twitter.com/qwertyoruiopz" target="_blank"><i class="fab fa-twitter"></i></a></li>
        <li>Ian Beer | extra_recipe</li>
      </ul>
    </div>

</div> -->

@endsection

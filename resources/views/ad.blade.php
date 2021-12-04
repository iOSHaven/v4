@extends('layouts.redesign', ["title" => "Downloading $app->name ...", "hide_nav" => true, "hide_ads" => true, "back_link" => url("/apps")])

{{-- @php
dd(url($model->url))
@endphp --}}

@section('header')
<meta http-equiv="refresh" content="2; url={{ $url }}">
@endsection

@section('twitter')
<meta property="og:title" content="iOS Haven - Downloading {{ $app->name }} from {{$model->provider->name}}...">
<meta property="og:type" content="article">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:description" content="Downloading {{ $app->name}} from {{$model->provider->name}} now! This app will complete downloading soon. Ensure that you use tutorials or contact us for help installing.">
<meta property="og:image" content="{{ url($app->icon) }}">
<meta property="twitter:site:id" content="715729557769166848">
@endsection

@section('description')
<meta name="description" content="Downloading {{ $app->name}} from {{$model->provider->name}} now! This app will complete downloading soon. Ensure that you use tutorials or contact us for help installing.">
@endsection
@section('content')






<section>
  <div class="container text-center">
    <h3 class="mt-0 text-3xl font-display">{{ $app->name }}</h3>


    <img src="{{ url($app->icon) }}" width="77" height="77" class="d-block mx-auto mb-3" style="height:77px; border-radius: 1.3rem">

    <div class="text-xl mx-auto">Provided By:</div>

    <div class="inline-block rounded-lg border py-3 pl-3 pr-8 mb-3 {{ theme('border-gray-100') }}">
      <div class="flex items-center">
        @component('components.tinyProviderIcon', ["provider" => $model->provider, "size" => 40])@endcomponent
        <div>
          <div>{{ $model->provider->name }}</div>
          @if($model->working)
          <div class="text-green-light font-bold text-sm">
            <span class="mr-1">Working</span>
            <i class="fas fa-check-circle"></i>
          </div>
          @else
          <div class="text-red-light font-bold text-sm">
            <span class="mr-1">Revoked</span>
            <i class="fas fa-times-octagon"></i>
          </div>
          @endif
        </div>

      </div>
    </div>

    {{-- @component('components.banner')@endcomponent --}}

    @component('ads.google-header')@endcomponent


    @php
    function twitterGood($app, $model) {
    return urlencode("I just installed $app->name from ". $model->provider->name . " and it is working! " . url("/app/".$app->uid) . " #ihvn_working");
    }

    function twitterBad($app, $model) {
    return urlencode("$app->name from ". $model->provider->name . " is broken! #ihvn_broken");
    }

    function twitterNeutral($app, $model) {
    return urlencode("Get $app->name from ". $model->provider->name . "! " . url("/app/".$app->uid));
    }
    @endphp

    <div class="w-full mb-8">
      <!-- Baseline Reactions -->
      <div class="baseline__reactions" data-cb="if (window.$baseline.weight > 0) {document.getElementById('twitter-button').href='https://twitter.com/intent/tweet?text={{ twitterGood($app, $model) }}';}else{document.getElementById('twitter-button').href='https://twitter.com/intent/tweet?text={{ twitterBad($app, $model) }}';}" data-team="29a12e05-29fe-41f6-8293-86cac4712b8d" data-tag="{{ $model->provider->name }}">
      </div>
      <script async src="https://baseline.smeltlab.com/js/embed.js" charset="utf-8"></script>
      <!-- End of Baseline Reactions -->
    </div>


    <div>
      <a id="twitter-button" target="_blank" href="https://twitter.com/intent/tweet?text={{ twitterNeutral($app, $model) }}" class='mx-1 mb-16 flex items-center justify-center font-bold rounded-full text-sm px-8 py-5 {{ theme('bg-blue', 'text-white') }}'>
        <i class="fab fa-twitter mr-3 fa-lg"></i>
        TWEET
        <i class="fab fa-twitter ml-3 fa-lg"></i>

      </a>


    </div>

    <div>
      <a href="{{ $url }}" class='mx-1 mb-16 flex items-center justify-center font-bold rounded-full text-sm px-8 py-5 {{ theme('bg-green', 'text-white') }}'>
        <i class="fas fa-download mr-3 fa-lg"></i>
        @if($type == "itms")
        INSTALL
        @else
        DOWNLOAD
        @endif
        <i class="fas fa-download ml-3 fa-lg"></i>

      </a>
    </div>


    <!-- @if($type == "itms")
    <h3 class="mt-0 text-2xl font-display">How to install</h3>
      <i class="fas fa-arrow-down fa-2x"></i>
      <img class="d-block mx-auto" src="/tutorial-images/UsingSignedAppStep1.png" alt="" width="200">
      <img class="d-block mx-auto" src="/tutorial-images/UsingSignedAppStep2.png" alt="" width="200">
      <img class="d-block mx-auto mb-3" src="/tutorial-images/UsingSignedAppStep3.png" alt="" width="200">
      <h3 class="font-display">Settings > General > Profiles & Device Management > [ Select Certificate ]</h3>
      <img class="d-block mx-auto mb-3" src="/tutorial-images/UsingSignedAppStep4.png" alt="" width="200">
      <img class="d-block mx-auto" src="/tutorial-images/UsingSignedAppStep5.png" alt="" width="200">
    @endif -->

    <div class="text-left text-leading text-xl">
      <h1 class="text-4xl font-display mt-4">Are you unable to install an app?</h1>
      <p class="my-3">Read more! This quick tutorial will help you get the most out of games, apps, shortcuts, and other iOS features. This tutorial is insurance that you can buy into.</p>
      <h2 class="text-2xl font-display mt-4">Decide between install or download</h2>
      <p class="my-3">What is the difference between installing and downloading apps?</p>
      <p class="my-3">Apps are entirely user submitted which means some apps can be directly installed to your iOS device (ITMS) while other apps require a computer (IPA).</p>
      <h3 class="text-xl font-display mt-4">ITMS</h3>
      <p class="my-3">ITMS apps require a trusted enterprise certificate. When a trusted certificate cannot be located, apps are considered to be "unsigned" or "revoked".</p>
      <p class="my-3">"Unsigned" apps are apps that are waiting to be signed by a certificate. Any certificate will work for personal apps but public apps must be enterprise.</p>
      <p class="my-3">"Revoked" apps are apps that were signed but the certificate is no longer trusted. This means you must find another certificate.</p>
      <h3 class="text-xl font-display mt-4">IPA</h3>
      <p class="my-3">IPA apps are "unsigned" meaning they can be used freely. However, you will need a computer or a server to sign IPA files.</p>
      <p class="my-3">Our fiends AppValley, iOS Gods, TutuBox, AltStore, and Scarlet all provide ways to sign IPA files. However, nobody has search capabilities and support like we do. We are here to help you find what you need.</p>
      <h2 class="text-2xl font-display mt-4">Direct Installation</h2>
      <p class="my-3">Sometimes signed apps will ask you to open in "iTunes". This is a bug, so tap "Open" to continue.</p>
      <img class="d-block mx-auto" src="/tutorial-images/UsingSignedAppStep1.png" alt="" width="200">
      <p class="my-3">Next, a popup will ask to install the app you selected. Press "Install".</p>
      <img class="d-block mx-auto" src="/tutorial-images/UsingSignedAppStep2.png" alt="" width="200">
      <p class="my-3">Once downloaded, locate the app on you phone. If it works, there is nothing else to do. Otherwise, you may see a message like the following.</p>
      <img class="d-block mx-auto mb-3" src="/tutorial-images/UsingSignedAppStep3.png" alt="" width="200">
      <h3 class="text-xl font-display mt-4">How do I trust a certificate?</h3>
      <p class="my-3">If you see the previous message, you need to trust the certificate in your settings. Navigate to <strong>SETTINGS > GENERAL > PROFILES & DEVICE MANAGEMENT</strong>. Selected a certificate and you should see a screen like the following.</p>
      <img class="d-block mx-auto mb-3" src="/tutorial-images/UsingSignedAppStep4.png" alt="" width="200">
      <p class="my-3">Verify the certificate is for the app you just downloaded. Then press "Trust". Now you can open your app, congratulations!!</p>
      <img class="d-block mx-auto" src="/tutorial-images/UsingSignedAppStep5.png" alt="" width="200">
      <h2 class="text-2xl font-display mt-4">Side-loading</h2>
      <p class="my-3">The techniques for side-loading change occasionally. Use AltStore, Cydia Impactor, or Scarlet first. If the problem persists, contact us on Twitter @ioshavencom.</p>
    </div>

  </div>
</section>




@endsection
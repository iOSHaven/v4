<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="has-navbar-fixed-top">
<head>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-106909262-1"></script>
    <script>window.dataLayer = window.dataLayer || [];function gtag(){dataLayer.push(arguments);}gtag('js', new Date());gtag('config', 'UA-106909262-1');</script>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="application-name" content="IOS Haven">
    <meta name="theme-color" content="#ffffff">
    <meta name="description" content="Get all your iPhone app needs straight from the web.  Including IPAs, signed apps, Apple developer betas, and jailbreaks.">
    <meta name="keywords" content="iphone,jailbreak,hack,crack,signed,download,ipa,free">
    <meta name="robots" content="index, follow">
    <meta name="web_author" content="iOS Development Team">
    <meta name="language" content="English">

    <!-- Apple specific -->
    <meta name="apple-mobile-web-app-title" content="iOS Haven">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">



   <!-- iPad retina portrait 1536x2008 -->
   <link href="/defaults/launch/2048x2732.png"
        media="(device-width: 768px) and (device-height: 1024px)
               and (-webkit-device-pixel-ratio: 2)
               and (orientation: portrait)"
        rel="apple-touch-startup-image">

    <!-- iPad retina portrait 1536x2008 -->
    <link href="/defaults/launch/1536x2008.png"
         media="(device-width: 768px) and (device-height: 1024px)
                and (-webkit-device-pixel-ratio: 2)
                and (orientation: portrait)"
         rel="apple-touch-startup-image">


   <!-- iPad retina landscape 1496x2048 -->
   <link href="/defaults/launch/1496x2048.png"
         media="(device-width: 768px) and (device-height: 1024px)
                and (-webkit-device-pixel-ratio: 2)
                and (orientation: landscape)"
         rel="apple-touch-startup-image">

   <!-- iPad non-retina portrait 768x1004 -->
   <link href="/defaults/launch/768x1004.png"
         media="(device-width: 768px) and (device-height: 1024px)
                and (-webkit-device-pixel-ratio: 1)
                and (orientation: portrait)"
         rel="apple-touch-startup-image">

   <!-- iPad non-retina landscape 748x1024 -->
   <link href="/defaults/launch/748x1024.png"
         media="(device-width: 768px) and (device-height: 1024px)
                and (-webkit-device-pixel-ratio: 1)
                and (orientation: landscape)"
         rel="apple-touch-startup-image">

   <!-- iPhone 6 Plus portrait retina 1242x2148 -->
   <link href="/defaults/launch/1242x2148.png"
         media="(device-width: 414px) and (device-height: 736px)
                and (-webkit-device-pixel-ratio: 3)
                and (orientation: portrait)"
         rel="apple-touch-startup-image">

   <!-- iPhone 6 Plus landscape retina 1182x2208 -->
   <link href="/defaults/launch/1182x2208.png"
         media="(device-width: 414px) and (device-height: 736px)
                and (-webkit-device-pixel-ratio: 3)
                and (orientation: landscape)"
         rel="apple-touch-startup-image">

   <!-- iPhone 6 portrait retina 750x1294 -->
   <link href="/defaults/launch/750x1294.png"
         media="(device-width: 375px) and (device-height: 667px)
                and (-webkit-device-pixel-ratio: 2)"
         rel="apple-touch-startup-image">

   <!-- iPhone 5 SE retina 640x1136 -->
   <link href="/defaults/launch/640x1136.png"
         media="(device-width: 320px) and (device-height: 568px)
                and (-webkit-device-pixel-ratio: 2)"
         rel="apple-touch-startup-image">

   <!-- iPhone 5 retina 640x1096 -->
   <link href="/defaults/launch/640x1096.png"
         media="(device-width: 320px) and (device-height: 568px)
                and (-webkit-device-pixel-ratio: 2)"
         rel="apple-touch-startup-image">

   <!-- iPhone < 5 retina 640x920 -->
   <link href="/defaults/launch/640x920.png"
         media="(device-width: 320px) and (device-height: 480px)
                and (-webkit-device-pixel-ratio: 2)"
         rel="apple-touch-startup-image">

   <!-- iPhone < 5 non-retina 320x460 -->
   <link href="/defaults/launch/320x460.png"
         media="(device-width: 320px) and (device-height: 480px)
                and (-webkit-device-pixel-ratio: 1)"
         rel="apple-touch-startup-image">



    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta property="og:title" content="{{ config('app.name', 'Laravel') }}">
    <meta property="og:type"  content="article">
    <meta property="og:url"   content="{{ $url ?? url('/') }}">
    <meta property="og:description"  content="DOWNLOAD IPAS, SIGNED APPS, APPLE DEVELOPER BETAS, AND JAILBREAKS.">
    <meta property="og:image"  content="/ios-banner.png">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <!-- <link rel="stylesheet" href="/fa/css/fontawesome-pro-brands.css">
    <link rel="stylesheet" href="/fa/css/fontawesome-pro-solid.css">
    <link rel="stylesheet" href="/fa/css/fontawesome-pro-light.css">
    <link rel="stylesheet" href="/fa/css/fontawesome-pro-regular.css">
    <link rel="stylesheet" href="/fa/css/fontawesome-pro-core.css"> -->
    <!-- <script defer src="https://pro.fontawesome.com/releases/v5.2.0/js/all.js" integrity="sha384-yBZ34R8uZDBb7pIwm+whKmsCiRDZXCW1vPPn/3Gz0xm4E95frfRNrOmAUfGbSGqN" crossorigin="anonymous"></script> -->
    <link rel="apple-touch-icon" href="/favicons/apple-touch-icon.png?v=QEMYzE9pb35555" sizes="180x180">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicons/favicon-32x32.png?v=QEMYzE9pb35555">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicons/favicon-16x16.png?v=QEMYzE9pb35555">
    <link rel="manifest" href="/favicons/manifest.json?v=QEMYzE9pb35555">
    <link rel="mask-icon" href="/favicons/safari-pinned-tab.svg?v=QEMYzE9pb35555" color="#e81e1e">
    <link rel="shortcut icon" href="/favicons/favicon.ico?v=QEMYzE9pb35555">

    <link href="{{ asset('css/normalize.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css">
    <link href="{{ asset('css/app.css') }}?v=0.1" rel="stylesheet">
    <link href="{{ asset('css/scoped.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">

    <!-- Adsense -->
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <!-- Reddit Conversion Pixel -->
    <script>
    var now=Date.now();var i=new Image();i.src="https://alb.reddit.com/snoo.gif?q=CAAHAAABAAoACQAAAAmui0GsAA==&s=tmLAxiUDMEJKMclLiZGzuUt9BH8_1Z3ptx3Bh1LlzNs=&ts="+now;
    </script>
    <noscript>
    <img height="1" width="1" style="display:none"
    src="https://alb.reddit.com/snoo.gif?q=CAAHAAABAAoACQAAAAmui0GsAA==&s=tmLAxiUDMEJKMclLiZGzuUt9BH8_1Z3ptx3Bh1LlzNs="/>
    </noscript>
    <!-- DO NOT MODIFY -->
    <!-- End Reddit Conversion Pixel -->

    <!-- Extend the head -->
    @yield('head')

</head>
<body>
    <div id="app">
        @include('layouts.sidebar')

        @yield('content')
    </div>

    @include('layouts.footer')
    <!-- Scripts -->
    <script type="text/javascript" src="{{ asset('js/app.js') }}?v=0.1"></script>
    <script>
         (adsbygoogle = window.adsbygoogle || []).push({
              google_ad_client: "ca-pub-4649450952406116",
              enable_page_level_ads: true
         });
    </script>
</body>
</html>

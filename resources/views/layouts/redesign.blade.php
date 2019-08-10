<!DOCTYPE html>
<html lang="en">
<head>

    <title>{{ config('app.name', 'IOS Haven') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @if(empty($hide_meta))
      <!-- Global site tag (gtag.js) - Google Analytics -->
      <script async src="https://www.googletagmanager.com/gtag/js?id=UA-106909262-1"></script>
      <script>window.dataLayer = window.dataLayer || [];function gtag(){dataLayer.push(arguments);}gtag('js', new Date());gtag('config', 'UA-106909262-1');</script>

      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, minimal-ui, viewport-fit=cover">
      <meta name="apple-mobile-web-app-capable" content="yes">
      <meta name="apple-mobile-web-app-status-bar-style" content="default">

      <meta name="application-name" content="IOS Haven">
      <meta name="theme-color" content="#ffffff">
      <meta name="description" content="We introduce people to the sideload and jailbreak IOS communities. We offer tools to get started, links you should visit, and hundreds of popular apps ready for download.">
      <meta name="keywords" content="iphone,jailbreak,sideload,hack,crack,signed,download,ipa,free">
      <meta name="robots" content="index, follow">
      <meta name="web_author" content="IOS Haven Development Team">
      <meta name="language" content="English">
      <!-- CSRF Token -->

      <meta property="og:title" content="{{ config('app.name', 'IOS Haven') }}">
      <meta property="og:type"  content="article">
      <meta property="og:url"   content="{{ $url ?? url('/') }}">
      <meta property="og:description"  content="DOWNLOAD IPAS, SIGNED APPS, APPLE DEVELOPER BETAS, AND JAILBREAKS.">
      <meta property="og:image"  content="/ios-banner.png">

      <!-- Apple specific -->
      <meta name="apple-mobile-web-app-title" content="IOS Haven">
      <meta name="apple-mobile-web-app-capable" content="yes">
      <meta name="apple-mobile-web-app-status-bar-style" content="{{ theme() == 'light' ? 'white' : 'black' }}">



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


      <!-- === F A V I C O N S === -->
      <link rel="apple-touch-icon" href="/favicons/apple-touch-icon.png?v=QEMYzE9pb35555" sizes="180x180">
      <link rel="icon" type="image/png" sizes="32x32" href="/favicons/favicon-32x32.png?v=QEMYzE9pb35555">
      <link rel="icon" type="image/png" sizes="16x16" href="/favicons/favicon-16x16.png?v=QEMYzE9pb35555">
      <link rel="manifest" href="/favicons/site.webmanifest?v=QEMYzE9pb35555">
      <link rel="mask-icon" href="/favicons/safari-pinned-tab.svg?v=QEMYzE9pb35555" color="#e81e1e">
      <link rel="shortcut icon" href="/favicons/favicon.ico?v=QEMYzE9pb35555">
    @endif

    <!-- === F O N T S === -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Merriweather:900i|Amiko:400" rel="stylesheet" />
    {{-- <script src="https://kit.fontawesome.com/c888111707.js"></script> --}}

    <!-- === S T Y L E S === -->
    {{-- <link href="{{ mix('/css/normalize.min.css') }}" rel="stylesheet"> --}}
    {{-- <link href="{{ mix('/css/main.min.css') }}" rel="stylesheet"> --}}
    <link href="{{ mix('/css/redesign.min.css') }}" rel="stylesheet">
    @yield('header')


    @if(empty($hide_ads))
       <!-- === A D S E N S E   A D S === -->
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
       <!-- Facebook Pixel Code -->
       <script>
       !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,document,'script','https://connect.facebook.net/en_US/fbevents.js');
       fbq('init', '362444877957386');
       fbq('track', 'PageView');
       @yield('facebook-events')
       </script><noscript><img height="1" width="1" src="https://www.facebook.com/tr?id=362444877957386&ev=PageView&noscript=1"/></noscript><!-- End Facebook Pixel Code -->
    @endif

</head>
<body class="h-full overflow-hidden {{ theme('bg-teal', 'text-gray-600') }}">

<input type="checkbox" id="check-sidebar-left" class="hidden">
<input type="checkbox" id="check-sidebar-right"  class="hidden">
<div id="ptr-target" class="hidden"></div>
<div id='view' class="absolute left-0 right-0 top-0 bottom-0 flex items-start h-full bg-green-light">

  
  <aside class="h-full flex flex-col justify-between {{ theme('bg-white', 'border-gray-200') }}">
    <ul>
      @if(Auth::check())
        <li class="p-3 border-b text-center {{ theme('border-gray-200') }}">
          <img class="rounded-full border mb-3 mx-auto {{ theme('border-gray-200') }}" src="/avatar/zeb" alt="" width="70">
          <strong>{{ Auth::user()->username }}</strong>
          <div class="leading-none">@admin Admin @else Member @endadmin</div>
        </li>
        <li class="p-3 flex items-center justify-between border-b {{ theme('border-gray-200') }}">
          Dark mode
          <div class="leading-none">
            <form action="/user/theme" method="POST">
              @csrf
              <input class="hidden check-toggle" {{ theme() == "dark" ? "checked" : "" }} type="checkbox" id="toggle-theme" onchange="setTimeout(function() {this.form.submit()}.bind(this), 200)">
              <label for="toggle-theme" class="{{ theme('toggle', 'border-gray-200', 'bg-gray-100') }}"></label>
            </form>
          </div>
        </li>
        <li class="p-3 flex items-center justify-between border-b {{ theme('border-gray-200') }}">
          Settings
          <i class="fal fa-chevron-right"></i>
        </li>
        <li class="p-3 flex items-center justify-between border-b {{ theme('border-gray-200') }}">
          Notifications
          <i class="fal fa-chevron-right"></i>
        </li>
        <li class="p-3 flex items-center justify-between border-b {{ theme('border-gray-200') }}">
          Badges
          <i class="fal fa-chevron-right"></i>
        </li>
        <li class="p-3 flex items-center justify-between border-b {{ theme('border-gray-200') }}">
          Password
          <i class="fal fa-chevron-right"></i>
        </li>
      @endif
    </ul>
    <ul>
      @if(Auth::check())
        <form action="/logout" method="post">
          @csrf
          <button type="submit" class="w-full p-3 flex font-bold items-center justify-between border-t {{ theme('text-red', 'bg-white', 'border-gray-200') }}">
            Logout
            <i class="fas fa-sign-out"></i>
          </button>
        </form>
      @endif
    </ul>
  </aside>


  <div class="flex w-screen flex-shrink-0 relative h-full">
    @include('layouts.navigation')
    <main id="app" class="w-full overflow-y-scroll scrolling-touch bg-yellow-light pt-10 pb-16 md:pt-12 md:pb-0">
      <div class="px-3">
          @yield('content')
          @if(empty($hide_footer))
            @include('layouts.footer')
          @endif
      </div>
      
    </main>
  </div>

  <aside class="h-full {{ theme('bg-white', 'border-gray-200') }}">
    <h1 class="border-b text-center py-1 {{ theme('border-gray-200') }}">Other links</h1>
    <ul class="">
      <li class="p-3 flex items-center justify-between border-b {{ theme('border-gray-200') }}">
        Link 1
        <i class="fal fa-chevron-right"></i>
      </li>
      <li class="p-3 flex items-center justify-between border-b {{ theme('border-gray-200') }}">
        Link 2
        <i class="fal fa-chevron-right"></i>
      </li>
      <li class="p-3 flex items-center justify-between border-b {{ theme('border-gray-200') }}">
        Link 3
        <i class="fal fa-chevron-right"></i>
      </li>
      <li class="p-3 flex items-center justify-between border-b {{ theme('border-gray-200') }}">
        Link 4
        <i class="fal fa-chevron-right"></i>
      </li>
      <li class="p-3 flex items-center justify-between border-b {{ theme('border-gray-200') }}">
        Link 5
        <i class="fal fa-chevron-right"></i>
      </li>
      <li class="p-3 flex items-center justify-between border-b {{ theme('border-gray-200') }}">
        Link 6
        <i class="fal fa-chevron-right"></i>
      </li>
    </ul>
  </aside>
</div>




<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
<script src="{{ mix('/js/manifest.min.js') }}"></script>
<script src="{{ mix('/js/vendor.min.js') }}"></script>
<script src="{{ mix('/js/main.min.js') }}"></script>
{{-- <script>


</script> --}}
<script>(function(a,b,c){if(c in b&&b[c]){var d,e=a.location,f=/^(a|html)$/i;a.addEventListener("click",function(a){d=a.target;while(!f.test(d.nodeName))d=d.parentNode;"href"in d&&(d.href.indexOf("http")||~d.href.indexOf(e.host))&&(a.preventDefault(),e.href=d.href)},!1)}})(document,window.navigator,"standalone")</script>

@yield('footer')


</body>
</html>

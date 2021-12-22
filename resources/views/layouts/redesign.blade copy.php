<!DOCTYPE html>
<html lang="en">

<head>

  !<title>{{ config('app.name', 'IOS Haven') }}</title>
  !<meta name="csrf-token" content="{{ csrf_token() }}">

  @if(empty($hide_meta))
      <!-- Global site tag (gtag.js) - Google Analytics -->
      <script async src="https://www.googletagmanager.com/gtag/js?id=UA-106909262-1"></script>
      <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
          dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-106909262-1');
      </script>
  @endif

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, viewport-fit=cover">

  <meta name="application-name" content="IOS Haven">
  <meta name="theme-color" content="{{ theme() === 'light' ? '#ffffff' : '#000000' }}">
  <meta name="description"
    content="We introduce people to the sideload and jailbreak IOS communities. We offer tools to get started, links you should visit, and hundreds of popular apps ready for download.">
  <meta name="keywords" content="iphone,jailbreak,sideload,hack,crack,signed,download,ipa,free">
  <meta name="robots" content="index, follow">
  <meta name="web_author" content="IOS Haven Development Team">
  <meta name="language" content="English">

  {{-- TWITTER OG PROPERTIES --}}
  <meta property="og:title" content="{{ config('app.name', 'IOS Haven') }}">
  <meta property="og:type" content="article">
  <meta property="og:url" content="{{ $url ?? url('/') }}">
  <meta property="og:description" content="DOWNLOAD IPAS, SIGNED APPS, APPLE DEVELOPER BETAS, AND JAILBREAKS.">
  <meta property="og:image" content="/ios-banner.png">

  <!-- Apple specific -->
  <meta name="apple-mobile-web-app-title" content="IOS Haven">
  <meta name="apple-mobile-web-app-capable" content="yes">
  {{-- <meta name="apple-mobile-web-app-status-bar-style" content="black"> --}}
  <link rel="manifest" href="/manifest-{{ theme() }}.json">
  <meta name="apple-mobile-web-app-status-bar-style" content="{{ theme() === 'light' ? 'default' : 'black' }}" id="status-bar-style">
  {{-- <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"> --}}




  


  <!-- === F A V I C O N S === -->
  <link rel="apple-touch-icon" href="/favicons/apple-touch-icon.png?v=QEMYzE9pb35555" sizes="180x180">
  <link rel="icon" type="image/png" sizes="32x32" href="/favicons/favicon-32x32.png?v=QEMYzE9pb35555">
  <link rel="icon" type="image/png" sizes="16x16" href="/favicons/favicon-16x16.png?v=QEMYzE9pb35555">
  <link rel="manifest" href="/favicons/site.webmanifest?v=QEMYzE9pb35555">
  <link rel="mask-icon" href="/favicons/safari-pinned-tab.svg?v=QEMYzE9pb35555" color="#e81e1e">
  <link rel="shortcut icon" href="/favicons/favicon.ico?v=QEMYzE9pb35555">

  <!-- === F O N T S === -->
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Merriweather:900i|Amiko:400" rel="stylesheet" />
  {{-- <script src="https://kit.fontawesome.com/c888111707.js"></script> --}}

  <!-- === S T Y L E S === -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" rel="stylesheet">
  {{-- <link href="{{ mix('/css/main.min.css') }}" rel="stylesheet"> --}}
  <link href="{{ mix('/css/redesign.min.css') }}" rel="stylesheet">
  



  <!-- === A D S E N S E   A D S === -->
  {{-- <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> --}}
  @if(empty($hide_ads))
      <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
  @endif
 


  @if(empty($hide_meta))
      <!-- Reddit Conversion Pixel -->
      <script>
        var now = Date.now();
        var i = new Image();
        i.src =
          "https://alb.reddit.com/snoo.gif?q=CAAHAAABAAoACQAAAAmui0GsAA==&s=tmLAxiUDMEJKMclLiZGzuUt9BH8_1Z3ptx3Bh1LlzNs=&ts=" +
          now;
      </script>
      <noscript>
        <img height="1" width="1" style="display:none"
          src="https://alb.reddit.com/snoo.gif?q=CAAHAAABAAoACQAAAAmui0GsAA==&s=tmLAxiUDMEJKMclLiZGzuUt9BH8_1Z3ptx3Bh1LlzNs=" />
      </noscript>
      <!-- DO NOT MODIFY -->
      <!-- End Reddit Conversion Pixel -->
      <!-- Facebook Pixel Code -->
      <script>
        ! function (f, b, e, v, n, t, s) {
          if (f.fbq) return;
          n = f.fbq = function () {
            n.callMethod ? n.callMethod.apply(n, arguments) : n.queue.push(arguments)
          };
          if (!f._fbq) f._fbq = n;
          n.push = n;
          n.loaded = !0;
          n.version = '2.0';
          n.queue = [];
          t = b.createElement(e);
          t.async = !0;
          t.src = v;
          s = b.getElementsByTagName(e)[0];
          s.parentNode.insertBefore(t, s)
        }(window, document, 'script', 'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '362444877957386');
        fbq('track', 'PageView');
        @yield('facebook-events')
      </script><noscript><img height="1" width="1"
          src="https://www.facebook.com/tr?id=362444877957386&ev=PageView&noscript=1" /></noscript>
      <!-- End Facebook Pixel Code -->
  @endif
  @yield('header')
</head>


  {{-- CHANGE THE BODY BASED IF NAV SHOULD BE HIDDEN --}}
  @if(empty($hide_nav))
      <body class="relative mb-16 bg-white dark:bg-black text-gray-600 dark:text-gray-300" style="margin-top: 33px;">
        @include('layouts.navigation', ["title" => $title ?? null])
  @else
      <body class="m-inset-top relative {{ theme('bg-white', 'text-gray-600') }}">
  @endif


  <input type="checkbox" id="check-sidebar-left" class="hidden">

  <label for="check-sidebar-left" class="fixed z-2 w-full h-full top-0 left-0 scroll-toggler"
    style="background-color: black; opacity: 0.7;"></label>

  @if(empty($hide_nav))
    <aside class="p-inset-top p-inset-bottom z-2 top-0 left-0 fixed h-full flex flex-col justify-between {{ theme('bg-white', 'border-gray-200') }}">
      <ul>
        @if(Auth::check())
        <li class="p-3 border-b text-center {{ theme('border-gray-200') }}">
          <img class="rounded-full border mb-3 mx-auto {{ theme('border-gray-200') }}" src="/avatar/zeb" alt=""
            width="70">
          <strong>{{ Auth::user()->username }}</strong>
          <div class="leading-none">@admin Admin @else Member @endadmin</div>
        </li>
        @admin
        <a href="/dashboard" class="p-3 flex items-center justify-between border-b {{ theme('border-gray-200') }}">
          Dashboard
          <i class="fal fa-chevron-right"></i>
        </a>
        @endadmin
        <a href="/user/settings" class="p-3 flex items-center justify-between border-b {{ theme('border-gray-200') }}">
          Settings
          <i class="fal fa-chevron-right"></i>
        </a>
        <li class="p-3 flex items-center justify-between border-b {{ theme('border-gray-200', 'text-gray-200') }}">
          Notifications
          <i class="fal fa-chevron-right"></i>
        </li>
        <li class="p-3 flex items-center justify-between border-b {{ theme('border-gray-200', 'text-gray-200') }}">
          Badges
          <i class="fal fa-chevron-right"></i>
        </li>
        <a href="/user/password" class="p-3 flex items-center justify-between border-b {{ theme('border-gray-200') }}">
          Password
          <i class="fal fa-chevron-right"></i>
        </a>
        @endif
      </ul>
      <ul>
        @if(Auth::check())
        <form action="/logout" method="post">
          @csrf
          <button type="submit"
            class="w-full p-3 flex font-bold items-center justify-between border-t {{ theme('text-red', 'bg-white', 'border-gray-200') }}">
            Logout
            <i class="fas fa-sign-out"></i>
          </button>
        </form>
        @endif
      </ul>
    </aside>

    <input type="checkbox" id="check-sidebar-right" class="hidden">
    <label for="check-sidebar-right" class="fixed z-2 w-full h-full top-0 left-0 scroll-toggler"
      style="background-color: black; opacity: 0.7;"></label>
    <aside class="p-inset-top p-inset-bottom z-2 top-0 right-0 fixed h-full flex flex-col justify-between {{ theme('bg-white', 'border-gray-200') }}">
        <div>
            <h1 class="border-b text-center py-1 {{ theme('border-gray-200') }}">Other links</h1>
            <ul class="">
              <a href="/contact/index" class="p-3 flex items-center justify-between border-b {{ theme('border-gray-200') }}">
                Contact
                <i class="fal fa-chevron-right"></i>
              </a>
              <a href="/jailbreaks" class="p-3 flex items-center justify-between border-b {{ theme('border-gray-200') }}">
                Jailbreaks
                <i class="fal fa-chevron-right"></i>
              </a>
              <a href="/betas" class="p-3 flex items-center justify-between border-b {{ theme('border-gray-200') }}">
                Betas
                <i class="fal fa-chevron-right"></i>
              </a>
              <a href="/cydia" class="p-3 flex items-center justify-between border-b {{ theme('border-gray-200') }}">
                Cydia Impactor
                <i class="fal fa-chevron-right"></i>
              </a>
              <a href="/aboutUs" class="p-3 flex items-center justify-between border-b {{ theme('border-gray-200') }}">
                About Us
                <i class="fal fa-chevron-right"></i>
              </a>
              <a href="/credits" class="p-3 flex items-center justify-between border-b {{ theme('border-gray-200') }}">
                Credits
                <i class="fal fa-chevron-right"></i>
              </a>
            </ul>
        </div>

        <ul>
          <li class="p-3 flex items-center justify-between border-t {{ theme('border-gray-200') }}">
            Dark mode
            <div class="leading-none">
              <form action="/theme" method="POST">
                @csrf
                <input class="hidden check-toggle" {{ theme() == "dark" ? "checked" : "" }} type="checkbox"
                  id="toggle-theme" onchange="setTimeout(function() {this.form.submit()}.bind(this), 200)">
                <label for="toggle-theme" class="{{ theme('toggle', 'border-gray-200', 'bg-gray-100') }}"></label>
              </form>
            </div>
          </li>
          <li class="p-3 flex items-center justify-between border-t {{ theme('border-gray-200') }}">
              <a href="https://twitter.com/ioshavenco" style="color: #1da1f2;"><i class="fab fa-twitter mx-2 fa-2x"></i></a>
              <a href="https://www.reddit.com/r/iOSHaven/" style="color: #ff4500;"><i class="fab fa-reddit mx-2 fa-2x"></i></a>
              <a href="https://discord.gg/mTbwMyQ" style="color: #7289da;"><i class="fab fa-discord mx-2 fa-2x"></i></a>
              <a href="https://github.com/iOSHaven" style="color: #6cc644;"><i class="fab fa-github mx-2 fa-2x"></i></a>
              <a href="https://www.patreon.com/ioshaven" style="color: #f96854;"><i class="fab fa-patreon mx-2 fa-2x"></i></a>
          </li>
        </ul>
      </aside>
    @endif

      @yield('page')

    <div class="p-3 mx-auto" style="max-width: 960px">
      @if(!empty($hide_nav) && empty($hide_back))
        <button onclick="history.back()" class="m-inset-top p-5">
          <i class="fal fa-chevron-left mr-1"></i>
          {{ session('back_button') ?? "Back" }}
        </button>
      @endif
        
      <!-- @admin
      <div class="w-full p-3 mb-3 flex items-center justify-start {{ theme('bg-red') }}">
          <form action="/app/create" method="post">
            {{ csrf_field() }}
            <button type="submit" class="font-bold rounded-full text-sm mr-1 px-5 py-1 text-blue-500 {{ theme("bg-white") }}">Add App</button>
          </form>
          <a href="/providers/edit" class="font-bold rounded-full text-sm mr-1 px-5 py-1 text-blue-500 {{ theme("bg-white") }}">Manage Providers</a>
          <form action="/app/token" method="post">
            {{ csrf_field() }}
            <button type="submit" class="font-bold rounded-full text-sm mr-1 px-5 py-1 text-blue-500 {{ theme("bg-white") }}">Update Token</button>
          </form>
      </div>
      @endadmin -->

      @yield('content')

      @if($errors->any())
        @foreach($errors->all() as $error)
          @component('components.alert', ["bg" => "red"])
            {{ $error }}
          @endcomponent
        @endforeach
      @endif

      @if(Session::has("success"))
        @component('components.alert', ["bg" => "green"])
          {{ Session::get("success") }}
        @endcomponent
      @endif

      @if(empty($hide_footer))
        {{--@include('layouts.footer')--}}
      @endif
  </div>



  

 
  <script src="{{ mix('/js/manifest.min.js') }}"></script>
  <script src="{{ mix('/js/vendor.min.js') }}"></script>
  <script src="{{ mix('/js/main.min.js') }}"></script>

  @if(empty($hide_ads))
    <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
  @endif

  @yield("footer")

  <script>
    (function (a, b, c) {
      if (c in b && b[c]) {
        var d, e = a.location,
          f = /^(a|html)$/i;
        a.addEventListener("click", function (a) {
          d = a.target;
          while (!f.test(d.nodeName)) d = d.parentNode;
          "href" in d && (d.href.indexOf("http") || ~d.href.indexOf(e.host)) && (a.preventDefault(), e.href = d
            .href)
        }, !1)
      }
    })(document, window.navigator, "standalone")
  </script>

  <script>
  if ('serviceWorker' in navigator) {
    console.log("Will the service worker register?");
    navigator.serviceWorker.register('/service-worker.js')
      .then(function(reg){
        console.log("Yes, it did.");
      }).catch(function(err) {
        console.log("No it didn't. This happened:", err)
    });
  }
  </script>



</body>

</html>

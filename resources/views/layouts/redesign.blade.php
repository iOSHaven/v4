<!DOCTYPE html>
<html lang="en">


<head>

  <meta name="monetization" content="$ilp.uphold.com/qXi9AbDQiGD7">

  {{-- Google Tag Manager --}}
  <script>
    (function(w, d, s, l, i) {
      w[l] = w[l] || [];
      w[l].push({
        'gtm.start': new Date().getTime(),
        event: 'gtm.js'
      });
      var f = d.getElementsByTagName(s)[0],
        j = d.createElement(s),
        dl = l != 'dataLayer' ? '&l=' + l : '';
      j.async = true;
      j.src =
        'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
      f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-PVKPPPZ');
  </script>
  {{-- End Google Tag Manager --}}

  @if(!empty($title))
  <title>{{ config('app.name', 'IOS Haven') }} | {{ $title}}</title>
  @else
  <title>{{ config('app.name', 'IOS Haven') }}</title>
  @endif

  <meta name="csrf-token" content="{{ csrf_token() }}">

  {{-- MOBILE FRIENDLY --}}
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, viewport-fit=cover">

  @yield('description', View::make('seo.description'))
  @yield('search-engine', View::make('seo.search-engine'))
  @yield('twitter', View::make('seo.twitter-og'))




  {{-- WEB APPLICATION FRIENDLY --}}
  <meta name="application-name" content="{{ config('app.name') }}">
  <meta name="theme-color" content="{{ theme() === 'light' ? '#ffffff' : '#000000' }}">
  <meta name="apple-mobile-web-app-title" content="{{ config('app.name') }}">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="{{ theme() === 'light' ? 'default' : 'black' }}" id="status-bar-style">
  <link rel="manifest" href="/manifest-{{ theme() }}.json">

  {{-- SPLASH SCREENS --}}
  @include('layouts.splash')

  {{-- FAVICONS --}}
  <link rel="apple-touch-icon" href="/favicons/apple-touch-icon.png?v=QEMYzE9pb35555" sizes="180x180">
  <link rel="icon" type="image/png" sizes="32x32" href="/favicons/favicon-32x32.png?v=QEMYzE9pb35555">
  <link rel="icon" type="image/png" sizes="16x16" href="/favicons/favicon-16x16.png?v=QEMYzE9pb35555">
  <link rel="manifest" href="/favicons/site.webmanifest?v=QEMYzE9pb35555">
  <link rel="mask-icon" href="/favicons/safari-pinned-tab.svg?v=QEMYzE9pb35555" color="#e81e1e">
  <link rel="shortcut icon" href="/favicons/favicon.ico?v=QEMYzE9pb35555">

  {{-- FONTS --}}
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Merriweather:900i|Amiko:400" rel="stylesheet" />

  {{-- STYLES --}}
  <link href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" rel="stylesheet">
  <link href="{{ mix('/css/redesign.min.css') }}" rel="stylesheet">

  {{-- GOOGLE TAG --}}
  {{-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-106909262-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'UA-106909262-1');
  </script> --}}


  {{-- GOOGLE ADSENSE --}}
  {{-- @if(empty($hide_ads))
      <script data-ad-client="ca-pub-4649450952406116" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
  @endif --}}

  {{-- REDDIT CONVERSION PIXEL --}}
  {{-- <script>var now = Date.now();var i = new Image();i.src="https://alb.reddit.com/snoo.gif?q=CAAHAAABAAoACQAAAAmui0GsAA==&s=tmLAxiUDMEJKMclLiZGzuUt9BH8_1Z3ptx3Bh1LlzNs=&ts=" + now;</script>
  <noscript><img height="1" width="1" style="display:none"src="https://alb.reddit.com/snoo.gif?q=CAAHAAABAAoACQAAAAmui0GsAA==&s=tmLAxiUDMEJKMclLiZGzuUt9BH8_1Z3ptx3Bh1LlzNs=" /></noscript> --}}

  {{-- FACEBOOK CONVERSION CODE --}}
  {{-- <script>! function (f, b, e, v, n, t, s) {if (f.fbq) return;n = f.fbq = function () {n.callMethod ? n.callMethod.apply(n, arguments) : n.queue.push(arguments)};if (!f._fbq) f._fbq = n;n.push = n;n.loaded = !0;n.version = '2.0';n.queue = [];t = b.createElement(e);t.async = !0;t.src = v;s = b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t, s)}(window, document, 'script', 'https://connect.facebook.net/en_US/fbevents.js');fbq('init', '362444877957386');fbq('track', 'PageView');
    @yield('facebook-events')
  </script>
  <noscript><img height="1" width="1"src="https://www.facebook.com/tr?id=362444877957386&ev=PageView&noscript=1" /></noscript>

  <script src="https://cdn.jsdelivr.net/npm/intersection-observer@0.7.0/intersection-observer.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/vanilla-lazyload@17.1.2/dist/lazyload.min.js"></script> --}}


  {{-- PER VIEW HEADER CODE --}}
  @yield('header')
  @include('ads.index')

</head>


{{-- CHANGE THE BODY BASED IF NAV SHOULD BE HIDDEN --}}
@if(empty($hide_nav))

<body class="relative mb-16 bg-gray-100 dark:bg-gray-900 text-gray-600 dark:text-gray-300" style="margin-top: 33px;">
  @include('layouts.navigation', ["title" => $title ?? null])
  @else

  <body class="m-inset-top relative bg-gray-100 dark:bg-gray-900 text-gray-600 dark:text-gray-300">
    @endif

    {{-- ====INSIDE BODY==== --}}

    @yield('topbody')

    <input type="checkbox" id="check-sidebar-left" class="hidden">
    <label for="check-sidebar-left" class="fixed z-2 w-full h-full top-0 left-0 scroll-toggler" style="background-color: black; opacity: 0.7;"></label>


    {{-- NAVIGATION --}}
    @if(empty($hide_nav))

    <aside class="p-inset-top p-inset-bottom z-2 top-0 left-0 fixed h-full flex flex-col justify-between bg-white dark:bg-black border-gray-200 dark:border-gray-800">
      <ul>
        @if(Auth::check())
        <li class="p-3 border-b text-center border-gray-200 dark:border-gray-800">
          <img class="rounded-full border mb-3 mx-auto border-gray-200 dark:border-gray-800" src="https://api.adorable.io/avatars/70/{{ Auth::user()->username }}" alt="" width="70">
          <strong>{{ Auth::user()->username }}</strong>
          <div class="leading-none">@admin Admin @else Member @endadmin</div>
        </li>
        <a href="/dashboard" class="p-3 flex items-center justify-between border-b border-gray-200 dark:border-gray-800">
          Dashboard
          <i class="fal fa-chevron-right"></i>
        </a>
        <li class="p-3 flex items-center justify-between border-b border-gray-200 dark:border-gray-800 text-gray-200 dark:text-gray-800">
          Notifications
          <i class="fal fa-chevron-right"></i>
        </li>
        <li class="p-3 flex items-center justify-between border-b border-gray-200 dark:border-gray-800 text-gray-200 dark:text-gray-800">
          Badges
          <i class="fal fa-chevron-right"></i>
        </li>
        @endif
      </ul>
      <ul>
        @if(Auth::check())
        <form action="/logout" method="post">
          @csrf
          <button type="submit" class="w-full p-3 flex font-bold items-center justify-between border-t text-red-500 bg-white dark:bg-black border-gray-200 dark:border-gray-800">
            Logout
            <i class="fas fa-sign-out"></i>
          </button>
        </form>
        @endif
      </ul>
    </aside>

    <input type="checkbox" id="check-sidebar-right" class="hidden">
    <label for="check-sidebar-right" class="fixed z-2 w-full h-full top-0 left-0 scroll-toggler" style="background-color: black; opacity: 0.7;"></label>
    <aside class="p-inset-top p-inset-bottom z-2 top-0 right-0 fixed h-full flex flex-col justify-between bg-white dark:bg-black border-gray-200 dark:border-gray-800">
      <div>
        <h1 class="border-b text-center py-1 border-gray-200 dark:border-gray-800">Other links</h1>
        <ul class="">
          {{-- <a href="/contact/index" class="p-3 flex items-center justify-between border-b border-gray-200 dark:border-gray-800">
          Contact
          <i class="fal fa-chevron-right"></i>
          </a> --}}
          {{-- <a href="/shop" target="_blank" class="p-3 flex items-center justify-between border-b border-gray-200 dark:border-gray-800">
          <span>Merch
            <strong class="ml-3 text-blue-500">NEW!</strong>
          </span>
          <i class="fal fa-tshirt"></i>
          </a> --}}
          <a href="/shortcuts" class="p-3 flex items-center justify-between border-b border-gray-200 dark:border-gray-800">
            Shortcuts
            <i class="fal fa-chevron-right"></i>
          </a>
          <a href="/jailbreaks" class="p-3 flex items-center justify-between border-b border-gray-200 dark:border-gray-800">
            Jailbreaks
            <i class="fal fa-chevron-right"></i>
          </a>
          <a href="/betas" class="p-3 flex items-center justify-between border-b border-gray-200 dark:border-gray-800">
            Betas
            <i class="fal fa-chevron-right"></i>
          </a>
          <a href="/cydia" class="p-3 flex items-center justify-between border-b border-gray-200 dark:border-gray-800">
            Cydia Impactor
            <i class="fal fa-chevron-right"></i>
          </a>
          <a href="/aboutUs" class="p-3 flex items-center justify-between border-b border-gray-200 dark:border-gray-800">
            About Us
            <i class="fal fa-chevron-right"></i>
          </a>
          <a href="/credits" class="p-3 flex items-center justify-between border-b border-gray-200 dark:border-gray-800">
            Credits
            <i class="fal fa-chevron-right"></i>
          </a>
        </ul>
      </div>

      <ul>
{{--        <li class="p-3 flex items-center justify-between border-t border-gray-200 dark:border-gray-800">--}}
{{--          Dark mode--}}
{{--          <div class="leading-none">--}}
{{--            <form action="/theme" method="POST">--}}
{{--              @csrf--}}
{{--              <input class="hidden check-toggle" {{ theme() == "dark" ? "checked" : "" }} type="checkbox" id="toggle-theme" onchange="setTimeout(function() {this.form.submit()}.bind(this), 200)">--}}
{{--              <label for="toggle-theme" class="border-gray-200 dark:border-gray-800 bg-gray-100 dark:bg-gray-900 {{ theme('toggle') }}"></label>--}}
{{--            </form>--}}
{{--          </div>--}}
{{--        </li>--}}
        <li class="p-3 flex items-center justify-between border-t border-gray-200 dark:border-gray-800">
          <a href="https://twitter.com/ioshavencom" style="color: #1da1f2;"><i class="fab fa-twitter mx-2 fa-2x"></i></a>
          <a href="https://www.reddit.com/r/iOSHaven/" style="color: #ff4500;"><i class="fab fa-reddit mx-2 fa-2x"></i></a>
          <a href="https://discord.gg/mTbwMyQ" style="color: #7289da;"><i class="fab fa-discord mx-2 fa-2x"></i></a>
          <a href="https://github.com/iOSHaven" style="color: #6cc644;"><i class="fab fa-github mx-2 fa-2x"></i></a>
          <a href="https://www.patreon.com/ioshaven" style="color: #f96854;"><i class="fab fa-patreon mx-2 fa-2x"></i></a>
        </li>
      </ul>
    </aside>

    @endif

    {{-- CONTENT SECTION --}}
    @yield('page')


    <div class="p-3 mx-auto overflow-hidden" style="max-width: 960px">
      @if(!empty($hide_nav) && empty($hide_back))
      <button onclick="{{!empty($back_link) ? "window.location = '$back_link'" : "history.back()"}}" class="m-inset-top py-5">
        <i class="fal fa-chevron-left mr-1"></i>
        {{ session('back_button') ?? "Back" }}
      </button>
      @endif

      {{-- @admin
          <div class="w-full p-3 mb-3 flex items-center justify-start {{ theme('bg-red') }}">
      <form action="/app/create" method="post">
        {{ csrf_field() }}
        <button type="submit" class="font-bold rounded-full text-sm mr-1 px-5 py-1 text-blue-500 {{ theme("bg-white") }}">Add App</button>
      </form>
      <a href="/providers/edit" class="font-bold rounded-full text-sm mr-1 px-5 py-1 text-blue-500 {{ theme("bg-white") }}">Manage Providers</a>
      <form action="/app/token" method="post">
        {{ csrf_field() }}
        <button type="submit" class="font-bold rounded-full text-sm mr-1 px-5 py-1 text-blue-500 {{ theme("bg-white") }}">Update Token2</button>
      </form>
      <a href="/logs" class="font-bold rounded-full text-sm mr-1 px-5 py-1 text-blue-500 {{ theme("bg-white") }}">View Logs</a>
    </div>
    @endadmin --}}

    <main class="m-inset-bottom">
      @yield('content')
    </main>


    @if($errors->any())
    @foreach($errors->all() as $error)
    @component('components.alert', ["bg" => "red-500"])
    {{ $error }}
    @endcomponent
    @endforeach
    @endif

    @if(Session::has("success"))
    @component('components.alert', ["bg" => "green-500"])
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
    {{-- <script>
              (adsbygoogle = window.adsbygoogle || []).push({});
          </script> --}}
    @endif



    @yield("footer")



    {{-- SCRIPT FOR LINKS IN STANDALONE APP --}}
    <script>
      (function(a, b, c) {
        if (c in b && b[c]) {
          var d, e = a.location,
            f = /^(a|html)$/i;
          a.addEventListener("click", function(a) {
            d = a.target;
            while (!f.test(d.nodeName)) d = d.parentNode;
            "href" in d && (d.href.indexOf("http") || ~d.href.indexOf(e.host)) && (a.preventDefault(), e.href = d
              .href)
          }, !1)
        }
      })(document, window.navigator, "standalone")
    </script>

    {{-- propeller ad --}}
    <!-- <div id="ioshaven-popunder"></div> -->

    {{-- Google Tag Manager (noscript) --}}
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PVKPPPZ" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    {{-- End Google Tag Manager (noscript) --}}
    {{-- ====END INSIDE BODY==== --}}

    {{-- ==== PROPELLER ADVERTISING TRACKING ==== --}}
    <!-- <script type='text/javascript' src='https://propeller-tracking.com/fv.js?t=99810'></script> -->
  </body>

</html>
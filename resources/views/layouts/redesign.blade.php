<!DOCTYPE html>
<html lang="english">


<head>


  @php
    View::share('title', $title ?? "");
  @endphp

  <meta name="monetization" content="$ilp.uphold.com/qXi9AbDQiGD7">

  @include('includes.google-tag-manager')
  @include('includes.mobile-friendly')

  @yield('description', View::make('seo.description'))
  @yield('search-engine', View::make('seo.search-engine'))
  @yield('twitter', View::make('seo.twitter-og'))

  @include('includes.web-app-friendly')

  @include('includes.splash')
  @include('includes.favicons')
  @include('includes.fonts')
  @include('includes.styles')


  {{-- PER VIEW HEADER CODE --}}
  @yield('header')
  @include('ads.index')

</head>


{{-- CHANGE THE BODY BASED IF NAV SHOULD BE HIDDEN --}}
@if(empty($hide_nav))

<body class="relative mb-16 bg-neutral-100 dark:bg-neutral-900 text-gray-600 dark:text-gray-300" style="margin-top: 33px;">
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
          <img class="rounded-full border mb-3 mx-auto border-gray-200 dark:border-gray-800" src="{{ Auth::user()->gravatar }}" alt="" width="70">
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
          <a href="/themes" target="_blank" class="p-3 flex items-center justify-between border-b border-gray-200 dark:border-gray-800">
          <span>
            <i class="fas fa-paint-brush mr-1"></i>
            Themes
            <strong class="ml-3 text-blue-500">NEW!</strong>
          </span>
          <i class="fas fa-chevron-right"></i>
          </a>
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
{{--          <a href="/cydia" class="p-3 flex items-center justify-between border-b border-gray-200 dark:border-gray-800">--}}
{{--            Cydia Impactor--}}
{{--            <i class="fal fa-chevron-right"></i>--}}
{{--          </a>--}}
          <a href="https://ioshaven.com/shortcut/perm/135" target="_blank" class="p-3 flex items-center justify-between border-b border-gray-200 dark:border-gray-800">
          <span>
            <i class="fas fa-box-heart mr-1"></i>
            Tweak Pack
            <strong class="ml-3 text-blue-500">NEW!</strong>
          </span>
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
    @include('includes.standalone-app')

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
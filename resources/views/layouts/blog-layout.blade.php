<!DOCTYPE html>
<html lang="en" class="bg-stone-200 dark:bg-stone-700 dark:text-stone-200">


<head>

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
  <body class="antialiased ">

  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PVKPPPZ"
                    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->

  <div id="fb-root"></div>
  <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) {return;}
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
{{--  <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v12.0" nonce="IpjA0plZ"></script>--}}


  <main class="mx-auto lg:max-w-screen-lg max-w-prose selection:bg-red-500 selection:text-white px-3">

    <navigation class="text-center mt-4 mb-12 select-none block">
      <a href="/blog" class="font-bold text-3xl mt-2 hover:underline hover:decoration-2 hover:decoration-red-500">IPA Insider</a>
      <p class="uppercase">By iOS Haven</p>
      <hr class="mx-auto w-16 border-stone-300 dark:border-slate-700 my-4">
      @yield('blog-header')
    </navigation>

    @yield('content')

    <footer class="text-center my-8 select-none">
      <hr class="mx-auto w-16 border-stone-300 dark:border-slate-700">
      <p class="text-lg font-mono py-5">
        <a href="https://ioshaven.com" class="hover:underline">iOS Haven</a> &copy; {{now()->year}}</p>
    </footer>
  </main>



{{--    <script src="{{ mix('/js/manifest.min.js') }}"></script>--}}
{{--    <script src="{{ mix('/js/vendor.min.js') }}"></script>--}}
{{--    <script src="{{ mix('/js/main.min.js') }}"></script>--}}
    @yield("footer")
    @include('includes.standalone-app')

  </body>

</html>
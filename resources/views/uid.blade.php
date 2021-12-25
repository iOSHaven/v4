@extends('layouts.redesign', ["title" => $app->name, "hide_nav" => true ])



@section('twitter')
<meta property="og:title" content="iOS Haven - {{ $app->name }}">
<meta property="og:type" content="article">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:description" content="Download {{ $app->name}} now! This app is a {{ $app->short }} and includes the following features: {{$app->description}}">
<meta property="og:image" content="{{ url($app->icon) }}">
<meta property="twitter:site:id" content="715729557769166848">
<script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5aeb628d96e6fc00110b2f1a&product=inline-share-buttons' async='async'></script>
@endsection

@section('description')
<meta name="description" content="Download {{ $app->name}} now! This app is a {{ $app->short }} and includes the following features: {{$app->description}}">
@endsection


@section('topbody')
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v12.0" nonce="IpjA0plZ"></script>
@endsection

@section('content')

<section class="p-0">
  <div class="container">
    <div class="row">
      <div class="col-tablet-portrait-6 px-tablet-portrait">
        <div class="bg-gray-100 dark:bg-gray-900">


          {{-- APPLICATION ICON, TITLE, SHORT, & BUTTONS --}}
          <div class="flex items-start justify-start">
            <img width="60" height="60" src="{{ url($app->icon) }}" alt="" style="border-radius: 1.2rem">
            <div class="ml-3 mt-1 leading-none">
              {{ $app->name }}
              <div class="leading-none">
                <small>{{ $app->short }}</small>
              </div>
              <div class="flex items-center justify-start mt-1">
                @foreach($app->providers as $provider)
                @component('components.tinyProviderIcon', ["provider" => $provider])@endcomponent
                @endforeach
              </div>

              <div class="mt-5">
                @component('components.appButtons', ["app" => $app])@endcomponent
                <div class="mt-4">
{{--                  <a class="twitter-share-button" data-size="large" href="https://twitter.com/intent/tweet?text={{ urlencode("I just installed $app->name from @ioshavencom and it is working!") }}">--}}
{{--                    Tweet</a>--}}
                  <div class="sharethis-inline-share-buttons my-4"></div>
                </div>

              </div>
            </div>
          </div>

          <br>

          @component('ads.google-header')@endcomponent

          @if(env('APP_ENV') == 'production')
          <br>
          @endif




          {{-- APPLICATION FEATURES --}}
          @component('components.collapse', ["title" => "Description", "pre" => true, "show" => true])
          {{ $app->description }}
          @endcomponent


          {{-- APPLICATON STATS --}}
          @if(config('app-analytics.enabled'))
          @component('components.collapse', ["title" => "Stats", "show" => true])
          <div class="flex items-center justify-start">
            @if(config('app-analytics.views'))
            <div class="mr-2 flex items-center justify-start">
              <i class="fad fa-eye mr-2 text-center" style="width: 20px;"></i>
              <span>{{ format_int($app->impressions ?? "0") }}<span>
            </div>
            @endif

            @if(config('app-analytics.downloads') || config('app-analytics.installs') )
            <div class="mr-2 flex items-center justify-start">
              <i class="fad fa-download mr-2 text-center" style="width: 20px;"></i>
              <span>{{ format_int($app->downloads + $app->installs ?? "0") }}<span>
            </div>
            @endif

            @if(config('app-analytics.sizes'))
            <div class="mr-2 flex items-center justify-start">
              <i class="fas fa-database mr-2 text-center" style="width: 20px;"></i>
              <span>{{ format_int($app->size ?? "0b", 'file') }}<span>
            </div>
            @endif
          </div>
          @endcomponent
          @endif


          {{-- APPLICATION ITMS --}}
          @component('components.collapse', ["title" => "Signed Links", "show" => true])
          @foreach($app->itms as $itms)
          @component('components.providerListing', [
          "model" => $itms,
          "showLine" => !$loop->last])
          @endcomponent
          @endforeach
          @endcomponent

          {{-- APPLICATION IPAs --}}
          @component('components.collapse', ["title" => "IPA Links", "show" => true])
          @foreach($app->ipas as $ipas)
          @component('components.providerListing', [
          "model" => $ipas,
          "showLine" => !$loop->last])
          @endcomponent
          @endforeach
          @endcomponent

          <div class="mb-5 show-gt-tablet-portrait"></div>



        </div>
      </div>
      <div class="col-tablet-portrait-6 px-tablet-portrait">
        <div class="h6 display-clear mb-2">
          <strong>Comments</strong>
        </div>

        <div class="fb-comments" data-href="{{ url()->current() }}" data-width="100%" data-numposts="10" data-lazy="true"></div>

      </div>
    </div>
  </div>
</section>







@endsection


@section('footer')
<script>
  autocomplete('appsearch', function(e, target, json) {
    var j = []
    json.forEach(app => {
      var a = Object.assign({}, app)
      var match = a.name.toLowerCase().indexOf(target.value.toLowerCase()) !== -1
      if (match) {
        a.name = a.name.split(new RegExp(target.value, 'i')).join('<span class="auto-complete-match"> ' + target
          .value + '</span>')
        j.push(a)
      }
    })
    j.sort((a, b) => {
      if (a.name < b.name)
        return -1;
      if (a.name > b.name)
        return 1;
      return 0;
    })
    return j.slice(0, 10)
  })
</script>

<script>
  window.twttr = (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0],
      t = window.twttr || {};
    if (d.getElementById(id)) return t;
    js = d.createElement(s);
    js.id = id;
    js.src = "https://platform.twitter.com/widgets.js";
    fjs.parentNode.insertBefore(js, fjs);

    t._e = [];
    t.ready = function(f) {
      t._e.push(f);
    };

    return t;
  }(document, "script", "twitter-wjs"));
</script>
@endsection
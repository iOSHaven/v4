@extends('layouts.redesign', ["title" => $shortcut->name, "hide_nav" => true ])

@section('header')
  <link rel="stylesheet" href="{{ mix('/css/markdown.css') }}">
@endsection


@section('twitter')

  <meta property="og:title" content="iOS Haven Shortcuts - {{ $shortcut->name }}">
  <meta property="og:type" content="article">
  <meta property="og:url" content="{{ url()->current() }}">
  <meta property="og:description" content="Install {{ $shortcut->name}} now and browse other iOS Shortcuts from iOS Haven">
  <meta property="og:image" content="{{ url($shortcut->icon) }}">
  <meta property="twitter:site:id" content="715729557769166848">
  <script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5aeb628d96e6fc00110b2f1a&product=inline-share-buttons' async='async'></script>
@endsection

@section('content')



<section class="p-0 mt-12">
  <div class="container">
    <div class="row">
      <div class="col-tablet-portrait-6 px-tablet-portrait">
        <div class="bg-neutral-100 dark:bg-neutral-900">


          {{-- APPLICATION ICON, TITLE, SHORT, & BUTTONS --}}
          <div class="flex items-start justify-start">
            <img width="60" height="60" src="{{ url($shortcut->icon) }}" alt="" style="border-radius: 1.2rem">
            <div class="ml-3 mt-1 leading-none">
              {{ $shortcut->name }}
              {{-- <div class="leading-none">
                <small>{{ $shortcut->short }}</small>
            </div> --}}
            {{-- <div class="flex items-center justify-start mt-1">
                @foreach($app->providers as $provider)
                  @component('components.tinyProviderIcon', ["provider" => $provider])@endcomponent
                @endforeach
              </div> --}}

            <div class="mt-5">
              <div class="flex items-center flex-wrap -mt-2">
                @component('components.button', [
                "href"=> $shortcut->url,
                "bg" => "blue-500",
                "color" => "white",
                "class" => "mt-2 mr-2"
                ])
                GET
                @endcomponent

                @can('update', $shortcut)
                @component('components.button', [
                "href"=> "/nova/resources/shortcuts/$shortcut->id",
                "bg" => "red-500",
                "color" => "white",
                "class" => "mt-2"
                ])
                EDIT
                @endcomponent
                @endcan

              </div>
              {{-- @component('components.appButtons', ["app" => $app])@endcomponent --}}

              <dv class="mt-4">
                <div class="sharethis-inline-share-buttons my-4"></div>
              </dv>

            </div>
          </div>
        </div>

        <br>

{{--        @component('ads.google-header')@endcomponent--}}

        @if(env('APP_ENV') == 'production')
        <br>
        @endif




        {{-- APPLICATION FEATURES --}}
        @component('components.collapse', ["title" => "Description", "pre" => false, "show" => true])
            <div class="markdown">
              {!! simpleMarkdown($shortcut->description) !!}
            </div>

          @endcomponent


        {{-- APPLICATON STATS --}}
        @if(config('app-analytics.enabled'))
        @component('components.collapse', ["title" => "Stats", "show" => true])
        <div class="flex items-center justify-start">

          @if(config('app-analytics.views'))
          <div class="mr-2 flex items-center justify-start">
            <i class="fad fa-eye mr-2 text-center" style="width: 20px;"></i>
            <span>{{ format_int($shortcut->impressions ?? "0") }}<span>
          </div>
          @endif

          @if(config('app-analytics.downloads'))
          <div class="mr-2 flex items-center justify-start">
            <i class="fad fa-download mr-2 text-center" style="width: 20px;"></i>
            <span>{{ format_int($shortcut->downloads + $shortcut->installs ?? "0") }}<span>
          </div>
          @endif
        </div>
        @endcomponent
        @endif


        {{-- APPLICATION ITMS --}}
        {{-- @component('components.collapse', ["title" => "Signed Links", "show" => true])
              @foreach($app->itms as $itms)
                @component('components.providerListing', [
                  "model" => $itms, 
                  "showLine" => !$loop->last])
                @endcomponent
              @endforeach
          @endcomponent --}}

        {{-- APPLICATION IPAs --}}
        {{-- @component('components.collapse', ["title" => "IPA Links", "show" => true])
              @foreach($app->ipas as $ipas)
                @component('components.providerListing', [
                  "model" => $ipas, 
                  "showLine" => !$loop->last])
                @endcomponent
              @endforeach
          @endcomponent --}}

        <div class="mb-5 show-gt-tablet-portrait"></div>



      </div>
    </div>
    <div class="col-tablet-portrait-6 px-tablet-portrait">
      <div class="h6 display-clear mb-2">
        <strong>Comments</strong>
      </div>

      <div class="fb-comments" data-href="{{ url()->current() }}" data-width="100%" data-numposts="10" data-lazy="true"></div>

      <br>

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
@endsection
@extends('layouts.redesign', ["title" => "Apps"])

@section('header')
<meta name="page" content="{{ $apps->currentPage() }}">
@endsection

@section('facebook-events')
fbq('track', 'Search');
@endsection

@section('content')

{{-- <div class="bg-red-light z-1">
  <!-- v4-top-search -->
  <ins class="adsbygoogle"
       style="display:block; touch-action: none"
       data-ad-client="ca-pub-4649450952406116"
       data-ad-slot="2079757604"
       data-ad-format="auto"
       data-full-width-responsive="true"></ins>
</div> --}}


    {{-- <div class="container">
      <div class="row">
        <div class="col-12 mt-3">
          <form action="/apps" method="get" autocomplete="off">
            <div class="autocomplete">
                <input name="q" value="{{ $q }}" type="text" class="p-3 autocomplete bg-light b-1 b-grey" id="appsearch" placeholder="Search apps..." data-fetch="/apps/getJson" data-template="/tl/app-search" data-result="result">
                <div class="autocomplete-results" id="result"></div>
            </div>
          </form>
        </div>
      </div>
    </div> --}}

    @admin
      <form action="/app/create" method="post" class="mb-3">
        {{ csrf_field() }}
        <button type="submit" class="font-bold rounded-full text-sm px-5 py-1 {{ theme("bg-blue", "text-white") }}">Add App</button>
      </form>
    @endadmin

    <div class="container">
      <div class="row" id="apps">
          @foreach($apps as $app)
            @component('components.applayout', $app->toArray())@endcomponent
            @if($loop->iteration == 7)
              <div class="relative">
                <div class="absolute top-0 left-0 right-0 bottom-0 flex items-center justify-center -z-1 {{ theme('bg-gray-100') }}">
                  Please consider disabling ads.
                </div>
                <!-- v4-search-bottom -->
                <ins class="adsbygoogle"
                     style="display:block"
                     data-ad-client="ca-pub-4649450952406116"
                     data-ad-slot="5262456899"
                     data-ad-format="auto"
                     data-full-width-responsive="true"></ins>
              </div>
            @endif
          {{-- <div class="col-tablet-portrait-4  p-1">
            <div class="app p-2">
                <img class="border-rounded" src="{{ url($app->icon) }}" alt="{{ $app->uid }}-icon" height="60" width="60">
                <a class="content ml-3 text-dark" href="/app/{{ $app->uid }}">
                  <div class="h6 m-0"><strong>{{ $app->name }}</strong></div>
                  <div class="description mt-2">{{ $app->short }}</div>
                </a>
                @admin
                <a href="/app/edit/{{ $app->uid }}" class="text-dark">
                  <i class="fas fa-pencil fa-lg"></i>
                </a>
                @endadmin
            </div>
          </div> --}}

        @endforeach
      </div>
    </div>



    <!-- <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> -->



    @if($apps->hasMorePages())
    <div id="loadmoreapps" class="text-center mt-5 mb-4" style="width: 100%;">
      <button class="font-bold text-lg rounded-full text-sm px-10 py-3 {{ theme("bg-black", "text-white") }}"
      onclick="loadMoreApps(this)"
      data-template="/tl/app">
      Load more...</button>
    </div>
    @endif





@endsection


@section('footer')

{{-- <script id="template-app" text="text/template">

  

</script> --}}

{{-- <script>
    autocomplete('appsearch', function (e, target, json) {
        var j = []
        json.forEach(app => {
            var a = Object.assign({}, app)
            var match = a.name.toLowerCase().indexOf(target.value.toLowerCase()) !== -1
            if (match) {
                a.name = a.name.split(new RegExp(target.value, 'i')).join('<span class="auto-complete-match"> ' + target.value + '</span>')
                j.push(a)
            }
        })
        j.sort((a,b) => {
            if (a.name < b.name)
                return -1;
            if (a.name > b.name)
                return 1;
            return 0;
        })
        return j.slice(0,10)
    })
</script> --}}
@endsection

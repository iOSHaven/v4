@extends('layouts.redesign', ["title" => $pageTitle ?? null ])

@section('header')
<meta name="page" content="{{ $apps->currentPage() }}">
@endsection

@section('facebook-events')
fbq('track', 'Search');
@endsection

@section('content')

    <div class="container">
      <div class="row" id="apps">
          @foreach($apps as $app)
            @component('components.applayout', $app->toArray())@endcomponent
            @if($loop->iteration == 3)
              {{-- <div class="relative">
                <div class="absolute top-0 left-0 right-0 bottom-0 flex items-center justify-center -z-1 {{ theme('bg-gray-100') }}">
                </div>
                <!-- v4-search-bottom -->
                <ins class="adsbygoogle"
                     style="display:block"
                     data-ad-client="ca-pub-4649450952406116"
                     data-ad-slot="5262456899"
                     data-ad-format="auto"
                     data-full-width-responsive="true"></ins>
              </div> --}}
            @endif
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

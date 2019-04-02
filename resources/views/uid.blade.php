@extends('layouts.redesign')


@section('content')


<div class="container">
  <div class="row">
    <div class="col-12 my-3">
      <form action="/apps" method="get" autocomplete="off">
        <div class="autocomplete">
            <input name="q" type="text" class="p-3 autocomplete" id="appsearch" placeholder="Search apps..." data-fetch="/apps/getJson" data-template="/tl/app-search" data-result="result">
            <div class="autocomplete-results" id="result"></div>
        </div>
      </form>
    </div>
    <!-- v4-ad-unit -->
    <ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-4649450952406116"
     data-ad-slot="6346387821"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
  </div>
</div>



<div class="container">
  <div class="row">
    <div class="col-12">
      <img class="col-12" src="{{ url($app->banner) }}" alt="">
    </div>
  </div>
  <div class="row mt-3 mb-5">
    <div class="col-1">
      <img class="col-12" src="{{ url($app->icon) }}" alt="">
    </div>
    <div class="col-11 h3 mb-0 pl-3">
      {{ $app->name }}
    </div>
  </div>

  <div class="row mb-5">
    <div class="col-3 text-center">
      <strong class="display">Downloads</strong>
      <div class="col-12">{{ format_int($app->downloads) }}</div>
    </div>
    <div class="col-3 text-center">
      <strong class="display">Views</strong>
      <div class="col-12">{{ format_int($app->views) }}</div>
    </div>
    <div class="col-3 text-center">
      <strong class="display">Size</strong>
      <div class="col-12">{{ format_int($app->size, "file") }}</div>
    </div>
    <div class="col-3 text-center">
      <strong class="display">Version</strong>
      <div class="col-12">{{ $app->version }}</div>
    </div>
  </div>

  <div class="row">
    @if($app->unsigned)
      <a href="/download/{{$app->uid}}" class="btn btn-dark py-1">Download IPA</a>
    @endif
    @if($app->signed)
      <a href="/install/{{$app->uid}}" class="btn btn-blue ml-3 py-1">Install Now</a>
    @endif
    @admin
      <a href="/app/edit/{{$app->uid}}" class="btn btn-red ml-3 py-1">Edit</a>
    @endadmin
  </div>

  <div class="row">
    <section>
      {!! $app->html !!}
    </section>
  </div>
  <!-- v4-ad-unit -->
  <ins class="adsbygoogle"
   style="display:block"
   data-ad-client="ca-pub-4649450952406116"
   data-ad-slot="6346387821"
   data-ad-format="auto"
   data-full-width-responsive="true"></ins>
  <div class="row">
      @foreach (explode(",", $app->tags) as $tag)
        <a href="/apps/{{$tag}}" class="btn btn-dark py-0 px-1 mr-1 border-none">{{$tag}}</a>
      @endforeach
  </div>

</div>






@endsection


@section('footer')
<script>
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
</script>
@endsection
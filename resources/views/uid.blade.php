@extends('layouts.redesign', ["title" => $app->name, "hide_nav" => true ])


@section('content')



<div class="container">
  <div class="row">
    <div class="col-12 my-3">
      <form action="/apps" method="get" autocomplete="off">
        <div class="autocomplete">
            <input name="q" type="text" class="p-3 autocomplete bg-light b-1 b-grey" id="appsearch" placeholder="Search apps..." data-fetch="/apps/getJson" data-template="/tl/app-search" data-result="result">
            <div class="autocomplete-results" id="result"></div>
        </div>
      </form>
    </div>
  </div>
</div>



<section class="p-0 mt-2">
  <div class="container">
    <div class="row">
      <div class="col-tablet-portrait-6 px-3 px-tablet-portrait">
        <div class="bg-white">


          {{-- APPLICATION ICON, TITLE, SHORT, & BUTTONS --}}
          <div class="flex-lt">
            <img width="60" height="60" src="{{ url($app->icon) }}" alt="">
            <div class="ml-3 title">
                {{ $app->name }}
            <div class="pl-1">
              <small>{{ $app->short }}</small>
              <br>
              <small>v{{ $app->version ?? "0.0.1" }}</small>
            </div>

            <div>
                @if($app->unsigned)
                  <a href="/download/{{$app->uid}}" class="btn-apple">IPA</a>
                @endif
                @if($app->signed)
                  <a href="/install/{{$app->uid}}" class="btn-apple invert">GET</a>
                @endif
                @admin
                  <a href="/app/edit/{{$app->uid}}" class="btn-apple invert bg-red">Edit</a>
                @endadmin
              </div>
            </div>
          </div>


          {{-- ADSENSE BELOW APPLICATION NAME --}}
          <div>
              <!-- v4-top-search -->
              <ins class="adsbygoogle"
                  style="display:block"
                  data-ad-client="ca-pub-4649450952406116"
                  data-ad-slot="2079757604"
                  data-ad-format="auto"
                  data-full-width-responsive="true">
              </ins>
          </div>

          {{-- APPLICATION PREVIEWS FROM ITUNES --}}
          <input id="app-previews-collapse" type="checkbox" class="collapse-check">
          <label for="app-previews-collapse" class="mt-3 mb-2 collapse-label d-block">
            <div class="flex-sbc text-grey">
              <span class="title">Previews</span>
              <i class="fal fa-plus show-closed"></i>
              <i class="fal fa-minus show-open"></i>
            </div>
          </label>
          <div class="text-pre collapse text-grey">Coming soon!</div>
          <hr class="bb-1 b-light">

          {{-- APPLICATION DESCRIPTION FROM ITUNES --}}
          <input id="app-description-collapse" type="checkbox" class="collapse-check">
          <label for="app-description-collapse" class="mt-3 mb-2 collapse-label d-block">
            <div class="flex-sbc text-grey">
              <span class="title">Description</span>
              <i class="fal fa-plus show-closed"></i>
              <i class="fal fa-minus show-open"></i>
            </div>
          </label>
          <div class="text-pre collapse text-grey">Coming soon!</div>
          <hr class="bb-1 b-light">

        
          {{-- APPLICATION FEATURES --}}
          <input id="app-modifications-collapse" type="checkbox" class="collapse-check">
          <label for="app-modifications-collapse" class="mt-3 mb-2 collapse-label d-block">
            <div class="flex-sbc">
              <span class="title">Modifications</span>
              <i class="fal fa-plus show-closed"></i>
              <i class="fal fa-minus show-open"></i>
              
            </div>
          </label>
          <div class="text-pre collapse">{{ $app->description }}</div>
          <hr class="bb-1 b-light">


          {{-- APPLICATION MIRRORS --}}
          <input id="app-mirrors-collapse" type="checkbox" class="collapse-check">
          <label for="app-mirrors-collapse" class="mt-3 mb-2 collapse-label d-block">
            <div class="flex-sbc text-grey">
              <span class="title">Mirrors</span>
              <i class="fal fa-plus show-closed"></i>
              <i class="fal fa-minus show-open"></i>
              
            </div>
          </label>
          <div class="text-pre collapse text-grey">Coming soon!</div>
          <hr class="bb-1 b-light">


          {{-- APPLICATON STATS --}}
          <input id="app-stats-collapse" type="checkbox" class="collapse-check">
          <label for="app-stats-collapse" class="mt-3 mb-2 collapse-label d-block">
            <div class="flex-sbc">
              <span class="title">Stats</span>
              <i class="fal fa-plus show-closed"></i>
              <i class="fal fa-minus show-open"></i>
            </div>
          </label>
          <div class="collapse">
            <div class="flex-lc">
              <div class="mr-2 flex-lc">
                <i class="fad fa-eye mr-2 text-center" style="width: 20px;"></i>
                <span>{{ $app->views_str ?? "0" }}<span>
              </div>
              <div class="mr-2 flex-lc">
                <i class="fad fa-download mr-2 text-center" style="width: 20px;"></i>
                <span>{{ $app->downloads_str ?? "0" }}<span>
              </div>
              <div class="mr-2 flex-lc">
                <i class="fas fa-database mr-2 text-center" style="width: 20px;"></i>
                <span>{{ $app->size_str ?? "0b" }}<span>
              </div>
            </div>
          </div>
          <hr class="bb-1 b-light show-lt-tablet-portrait">
          <div class="mb-5 show-gt-tablet-portrait"></div>

          

        </div>
      </div>
      <div class="col-tablet-portrait-6 px-3 px-tablet-portrait">
        <div class="h6 display-clear mb-2">
            <strong>Comments</strong>
        </div>
        Comments are comming soon. <br>
        <br>
        <br>
        <br>
        <br>
        
      </div>
    </div>
  </div>
</section>

<div class="container">
  {{-- <div class="row">
    <div class="col-12">
      <img class="col-12" src="{{ url($app->banner) }}" alt="">
    </div>
  </div> --}}

    
    
    {{-- <div class="col-11 h5 mb-0 pl-3 text">
      
    </div> --}}
  

  {{-- <div class="row mb-5">
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
  </div> --}}

  {{-- <div class="row">
    @if($app->unsigned)
      <a href="/download/{{$app->uid}}" class="btn btn-dark py-1">Download IPA</a>
    @endif
    
    @admin
      <a href="/app/edit/{{$app->uid}}" class="btn btn-red ml-3 py-1">Edit</a>
    @endadmin
  </div> --}}

  {{-- <div class="row">
    
  </div> --}}
  {{-- <div class="row">
      @foreach (explode(",", $app->tags) as $tag)
        <a href="/apps/{{$tag}}" class="btn btn-dark py-0 px-1 mr-1 border-none">{{$tag}}</a>
      @endforeach
  </div> --}}

  <!-- below-app-description -->
{{-- <ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-4649450952406116"
     data-ad-slot="8049311724"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins> --}}

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
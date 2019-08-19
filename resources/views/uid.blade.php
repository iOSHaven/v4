@extends('layouts.redesign', ["title" => $app->name, "hide_nav" => true ])


@section('content')



<section class="p-0 mt-12">
  <div class="container">
    <div class="row">
      <div class="col-tablet-portrait-6 px-3 px-tablet-portrait">
        <div class="bg-white">


          {{-- APPLICATION ICON, TITLE, SHORT, & BUTTONS --}}
          <div class="flex items-start justify-start">
            <img width="60" height="60" src="{{ url($app->icon) }}" alt="" style="border-radius: 1.2rem">
            <div class="ml-3 mt-1 leading-none">
              {{ $app->name }}
              <div class="leading-none">
                <small>{{ $app->short }}</small>
                <br>
                <small>v{{ $app->version ?? "0.0.1" }}</small>
              </div>

              <div class="mt-5">
                @if($app->unsigned)
                @component('components.button', ["href"=> "/download/$app->uid", "bg" => "gray-100", "color" => "blue"])
                IPA @endcomponent
                @endif
                @if($app->signed)
                @component('components.button', ["href"=> "/install/$app->uid", "bg" => "blue", "color" => "white"])
                GET @endcomponent
                @endif
                @admin
                @component('components.button', ["href"=> "/app/edit/$app->uid", "bg" => "red", "color" => "white"])
                EDIT @endcomponent
                @endadmin
              </div>
            </div>
          </div>


          {{-- ADSENSE BELOW APPLICATION NAME --}}
          {{-- <div>
              <!-- v4-top-search -->
              <ins class="adsbygoogle"
                  style="display:block"
                  data-ad-client="ca-pub-4649450952406116"
                  data-ad-slot="2079757604"
                  data-ad-format="auto"
                  data-full-width-responsive="true">
              </ins>
          </div> --}}
          <br>
          {{-- APPLICATION PREVIEWS FROM ITUNES --}}
          <input id="app-previews-collapse" type="checkbox" class="collapse-check">
          <label for="app-previews-collapse" class="my-2 collapse-label block {{ theme('text-gray-300') }}">
            <div class="flex items-center justify-between">
              <span class="title">Previews</span>
              <i class="fal fa-plus show-closed"></i>
              <i class="fal fa-minus show-open"></i>
            </div>
          </label>
          <div class="text-pre collapse {{ theme('text-gray-300') }}">Coming soon!</div>
          <hr class="border-0 border-b {{ theme('border-gray-200') }}">

          {{-- APPLICATION DESCRIPTION FROM ITUNES --}}
          <input id="app-description-collapse" type="checkbox" class="collapse-check">
          <label for="app-description-collapse" class="my-2 collapse-label block {{ theme('text-gray-300') }}">
            <div class="flex items-center justify-between">
              <span class="title">Description</span>
              <i class="fal fa-plus show-closed"></i>
              <i class="fal fa-minus show-open"></i>
            </div>
          </label>
          <div class="text-pre collapse {{ theme('text-gray-300') }}">Coming soon!</div>
          <hr class="border-0 border-b {{ theme('border-gray-200') }}">


          {{-- APPLICATION FEATURES --}}
          <input id="app-modifications-collapse" type="checkbox" class="collapse-check">
          <label for="app-modifications-collapse" class="my-2 collapse-label block">
            <div class="flex items-center justify-between">
              <span class="title">Modifications</span>
              <i class="fal fa-plus show-closed"></i>
              <i class="fal fa-minus show-open"></i>

            </div>
          </label>
          <div class="text-pre collapse">{{ $app->description }}</div>
          <hr class="border-0 border-b {{ theme('border-gray-200') }}">


          {{-- APPLICATION MIRRORS --}}
          <input id="app-mirrors-collapse" type="checkbox" class="collapse-check">
          <label for="app-mirrors-collapse" class="my-2 collapse-label block {{ theme('text-gray-300') }}">
            <div class="flex items-center justify-between">
              <span class="title">Mirrors</span>
              <i class="fal fa-plus show-closed"></i>
              <i class="fal fa-minus show-open"></i>

            </div>
          </label>
          <div class="text-pre collapse text-grey {{ theme('text-gray-300') }}">Coming soon!</div>
          <hr class="border-0 border-b {{ theme('border-gray-200') }}">


          {{-- APPLICATON STATS --}}
          <input id="app-stats-collapse" type="checkbox" class="collapse-check">
          <label for="app-stats-collapse" class="my-2 collapse-label block">
            <div class="flex items-center justify-between">
              <span class="title">Stats</span>
              <i class="fal fa-plus show-closed"></i>
              <i class="fal fa-minus show-open"></i>
            </div>
          </label>
          <div class="collapse">
            <div class="flex items-center justify-start">
              <div class="mr-2 flex items-center justify-start">
                <i class="fad fa-eye mr-2 text-center" style="width: 20px;"></i>
                <span>{{ $app->views_str ?? "0" }}<span>
              </div>
              <div class="mr-2 flex items-center justify-start">
                <i class="fad fa-download mr-2 text-center" style="width: 20px;"></i>
                <span>{{ $app->downloads_str ?? "0" }}<span>
              </div>
              <div class="mr-2 flex items-center justify-start">
                <i class="fas fa-database mr-2 text-center" style="width: 20px;"></i>
                <span>{{ $app->size_str ?? "0b" }}<span>
              </div>
            </div>
          </div>
          <hr class="border-0 border-b {{ theme('border-gray-200') }}">
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
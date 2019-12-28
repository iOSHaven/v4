@extends('layouts.redesign', ["title" => $app->name, "hide_nav" => true ])


@section('content')



<section class="p-0 mt-12">
  <div class="container">
    <div class="row">
      <div class="col-tablet-portrait-6 px-tablet-portrait">
        <div class="bg-white">


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
              </div>
            </div>
          </div>

          <br>
          @component('components.ad')@endcomponent




          {{-- APPLICATION FEATURES --}}
          @component('components.collapse', ["title" => "Modifications", "pre" => true])
            {{ $app->description }}
          @endcomponent


          {{-- APPLICATON STATS --}}
          @component('components.collapse', ["title" => "Stats"])
            <div class="flex items-center justify-start">
              <div class="mr-2 flex items-center justify-start">
                <i class="fad fa-eye mr-2 text-center" style="width: 20px;"></i>
                <span>{{ format_int($app->impressions ?? "0") }}<span>
              </div>
              <div class="mr-2 flex items-center justify-start">
                <i class="fad fa-download mr-2 text-center" style="width: 20px;"></i>
                <span>{{ format_int($app->downloads ?? "0") }}<span>
              </div>
              <div class="mr-2 flex items-center justify-start">
                <i class="fas fa-database mr-2 text-center" style="width: 20px;"></i>
                <span>{{ format_int($app->size ?? "0b", 'file') }}<span>
              </div>
            </div>
          @endcomponent


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
        Comments are comming soon. <br>
        <br>
        <br>
        <br>
        <br>

      </div>
    </div>
  </div>
</section>







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
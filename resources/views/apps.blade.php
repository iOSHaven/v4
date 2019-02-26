@extends('layouts.redesign')
@section('content')

  <div class="apps wrapper">
    @admin
      <app-admin class="m-3"></app-admin>
    @endadmin

    <!-- <div class="card ml-3 mr-3 mt1 mb1 no-border no-padding">
      <form class="" action="/apps" method="get">
        <div class="input-group">
          <input name="q" type="text" value="{{ $q }}" class="p-3" placeholder="Search apps..." aria-label="Search apps...">
          <div class="input-group-append">
            <button class="blue border-0 p1" type="submit">Search</button>
          </div>
        </div>
      </form> -->

      <!-- <search-bar :options="{
        alphabetize: 'name',
        property: 'name',
        label: 'Search for apps...',
        filterOnMount: true,
        button: 'fas fa-sort'
      }"
      :data="{{$apps->toJson()}}"
      class-name="fancy white"
      @update="updateAppSearch"
      ref="search">
      </search-bar> -->
    </div>



    <!-- <div class="card ad"> -->
      <!-- v4-search-top -->
      <ins class="adsbygoogle"
           style="display:block"
           data-ad-client="ca-pub-4649450952406116"
           data-ad-slot="8982247650"
           data-ad-format="auto"
           data-full-width-responsive="true"></ins>
    <!-- </div> -->

    <!-- <app v-for="app in filteredApps" v-if="filteredApps" :key="app.uid" :data="app" class="m-3 hide-on-server-render"></app> -->
    <!-- <span></span> -->

    <div class="container">
      <div class="row">
        <div class="col-12 mt-3">
          <form action="/apps" method="get">
            <input name="q" type="text" value="{{ $q }}" class="p-3" placeholder="Search apps..." aria-label="Search apps...">
          </form>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row">
          @foreach($apps as $app)
          <div class="col-tablet-portrait-4  p-1">
            <a href="/app/{{ $app->uid }}" data-uid="{{ $app->uid }}" class="app p-2">
              <!-- <div class="border-rounded border-thin-light"> -->
                <img class="border-rounded" src="{{ $app->icon }}" alt="{{ $app->uid }}-icon" height="60" width="60">
              <!-- </div> -->

              <div class="content ml-3">
                <div class="h6 m-0"><strong>{{ $app->name }}</strong></div>
                <div class="description mt-2">{{ $app->short }}</div>
              </div>
            </a>
          </div>

        @endforeach
      </div>
    </div>


    <!-- <div class="card ad"> -->
      <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
      <!-- v4-search -->


    <!-- </div> -->

    <!-- <app v-for="app in moreLoadedApps" :key="app.uid" :data="app" class="m-3"></app> -->

    @if($apps->hasMorePages())
    <div id="loadmoreapps" class="text-center mt-5" style="width: 100%;">
      <button class="btn btn-dark" @click="loadMoreApps">Load more apps...</button>
    </div>
    @endif

    <ins class="adsbygoogle"
         style="display:block"
         data-ad-client="ca-pub-4649450952406116"
         data-ad-slot="7479897052"
         data-ad-format="auto"
         data-full-width-responsive="true"></ins>

  </div>

@endsection

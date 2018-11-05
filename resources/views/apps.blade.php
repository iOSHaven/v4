@extends('layouts.default')
@section('content')

  <div class="apps wrapper">
    @admin
      <app-admin class="m-3"></app-admin>
    @endadmin

    <div class="card ml-3 mr-3 mt1 mb1 no-border no-padding">
      <form class="" action="/apps" method="get">
        <div class="input-group">
          <input name="q" type="text" value="{{ $q }}" class="form-control p1 border-right-0" placeholder="Search apps..." aria-label="Search apps...">
          <div class="input-group-append">
            <button class="blue border-0 p1" type="submit">Search</button>
          </div>
        </div>
      </form>

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



    <div class="card ad">
      <!-- v4-app-search -->
      <ins class="adsbygoogle"
           style="display:block"
           data-ad-client="ca-pub-4649450952406116"
           data-ad-slot="8982247650"
           data-ad-format="auto"
           data-full-width-responsive="true"></ins>
    </div>

    <app v-for="app in filteredApps" v-if="filteredApps" :key="app.uid" :data="app" class="m-3 hide-on-server-render"></app>
    <span></span>
    @foreach($apps as $app)
      <a class="card flex m-3 app server-rendered" href="/app/{{$app->uid}}" data-uid="{{$app->uid}}">
        <div ref="image" class="image" style="background-image: url('/{{ $app->icon }}')"></div>
        <div class="content">
          <h3 class="mb-3"><strong>{{$app->name}}</strong></h3>
          <div class="shadow"></div>
          <div class="description">{{$app->short}}</div>
        </div>

        <!-- <div class="get fill--red center">delete</div> -->
        <div class="get fill--blue center">get</div>
      </a>
    @endforeach

    <app v-for="app in moreLoadedApps" :key="app.uid" :data="app" class="m-3"></app>

    @if($apps->hasMorePages())
    <div id="loadmoreapps" class="has-text-centered m1" style="width: 100%;">
      <button class="button is-dark" @click="loadMoreApps">Load more apps...</button>
    </div>
    @endif

  </div>

@endsection

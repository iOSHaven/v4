@extends('layouts.default')
@section('content')

  <div class="apps wrapper">
    @admin
      <app-admin class="m-3"></app-admin>
    @endadmin

    <div class="card ml-3 mr-3 mt1 mb1 no-border no-padding">
      <search-bar :options="{
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
      </search-bar>
    </div>

    <app v-for="app in filteredApps" v-if="filteredApps" :key="app.name" :data="app" class="m-3 hide-on-server-render"></app>
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
  </div>

@endsection

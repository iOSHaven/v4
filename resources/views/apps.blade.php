@extends('layouts.default')
@section('content')

  <div class="apps wrapper">
    @admin
      <app-admin class="m-3"></app-admin>
    @endadmin

    <div class="card m-3">
      <search-bar :options="{
        alphabetize: 'name',
        property: 'name',
        label: 'Search for apps...',
        filterOnMount: true
      }"
      :data="{{$apps->toJson()}}"
      class="fancy"
      @update="updateAppSearch"
      ref="search"></search-bar>
    </div>


    @foreach($apps as $app)
      <a class="card flex m-3 app" href="/app/{{$app->uid}}" data-uid="{{$app->uid}}">
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

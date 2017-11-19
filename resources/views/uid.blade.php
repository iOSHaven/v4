@extends('layouts.app')
@section('head')
<link rel="stylesheet" href="/css/uid.css">
@endsection

@section('content')

<div class="wrapper uidpage">
  <div class="banner" style="background-image: url({{$app->banner}})">
    <div class="icon" style="background-image: url({{$app->icon}})"></div>
    <div class="installs">
        <a class="get fill--white center dark" href="/install/{{$app->uid}}">Install</a>
        <a class="get fill--white center dark" href="/download/{{$app->uid}}">Download</a>
    </div>
    <div class="shadow"></div>
  </div>

  <div class="bar card flex">
      <div class="title m-3">
        <h4>{{$app->name}}</h4>
      </div>

      <div class="info">
        <div class="data card">
          <div class="number">{{format_int($app->downloads)}}</div>
          <div class="label">Downloads</div>
        </div>
        <div class="data card">
          <div class="number">{{format_int($app->views)}}</div>
          <div class="label">Views</div>
        </div>
        <div class="data card">
          <div class="number">{{format_int($app->size, 'file')}}</div>
          <div class="label">Size</div>
        </div>
      </div>
    </div>

    @admin
    <page-uid uid="{{$app->uid}}" :set-auth="{{Auth::user()->toJson()}}"></page-uid>
    @else
    <div class="card">
      <div class="markdown">{!! $app->html !!}</div>
    </div>
    @if ($app->tags)
    <div class="card flex tags">
      @foreach (explode(",", $app->tags) as $tag)
        <div class="tag">{{$tag}}</div>
      @endforeach
    </div>
    @endif
    @endadmin

</div>


@endsection

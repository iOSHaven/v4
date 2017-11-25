@extends('layouts.default')
@section('head')
<link rel="stylesheet" href="/css/uid.css">
@endsection

@section('content')

<div class="wrapper uidpage">
  <div class="banner" style="background-image: url(/{{$app->banner}})">
    <div class="icon" style="background-image: url(/{{$app->icon}})"></div>
    <div class="version">Version: {{ $app->version }}</div>
    <div class="installs">
        @if($app->signed)
        <a class="get fill--white center dark" href="/install/{{$app->uid}}">Install</a>
        @endif
        @if($app->unsigned)
        <a class="get fill--white center dark" href="/download/{{$app->uid}}">Download</a>
        @endif
    </div>
    <div class="shadow"></div>
  </div>

  <div class="bar card flex has-shadow">
      <div class="title m-3">
        <h3>{{$app->name}}</h3>
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
    <div class="card has-shadow">
      <div class="markdown-body">{!! $app->html !!}</div>
    </div>
    @if ($app->tags)
    <div class="flex tags">
      @foreach (explode(",", $app->tags) as $tag)
        <a href="/apps/{{$tag}}" class="tag">{{$tag}}</a>
      @endforeach
    </div>
    @endif
    @endadmin

</div>


@endsection

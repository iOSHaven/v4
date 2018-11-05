@extends('layouts.default')
@section('head')
<link rel="stylesheet" href="/css/uid.css">
@endsection

@section('content')

<div class="wrapper uidpage">
  <div class="banner" style="background-image: url(/{{$app->banner}})">
    <div class="icon" style="background-image: url(/{{$app->icon}})"></div>
    <div class="installs">
        @if($app->signed)
        <a class="get solid--white center pt-3 pb-3 pl1 pr1 m-2" href="/install/{{$app->uid}}">
          <i class="fas fa-download mt-2 mb-2 mr-5"></i>Install
        </a>
        @endif
        @if($app->unsigned)
        <a class="get solid--white center dark pt-3 pb-3 pl1 pr1 m-2" href="/download/{{$app->uid}}">
          <i class="fas fa-wrench mt-2 mb-2 mr-5"></i>.ipa
        </a>
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
        <div class="data card">
          <div class="number">{{ $app->version }}</div>
          <div class="label">Version</div>
        </div>
      </div>
    </div>

    @admin
    <page-uid uid="{{$app->uid}}" :set-auth="{{Auth::user()->toJson()}}"></page-uid>
    @else

    <div class="card ad">
      <!-- adsense -->
      <ins class="adsbygoogle"
           style="display:block"
           data-ad-client="ca-pub-4649450952406116"
           data-ad-slot="5262456899"
           data-ad-format="auto"></ins>
    </div>

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

@extends('layouts.default')
@section('head')
<link rel="stylesheet" href="/css/uid.css">
@endsection

@section('content')

<div class="wrapper uidpage">

  <div class="card mt1 mb1 no-border no-padding">
    <form class="" action="/apps" method="get">
      <div class="input-group">
        <input name="q" type="text" class="form-control p1 border-right-0" placeholder="Search apps..." aria-label="Search apps...">
        <div class="input-group-append">
          <button class="blue border-0 p1" type="submit">Search</button>
        </div>
      </div>
    </form>
  </div>

<section class="hero is-medium is-info is-bold" style="background: url(/{{$app->banner}}) center center; background-size: cover">
  <div class="hero-body"></div>
</section>

<article class="media has-background-white pt1 pb1">
  <figure class="media-left ml1">
    <p class="image is-96x96 is-mobile-64x64">
      <img src="/{{$app->icon}}">
    </p>
  </figure>
  <div class="media-content">
    <div class="is-size-1-desktop is-size-3-touch has-text-weight-bold">
      {{ $app->name }}
    </div>
    <div class="is-hidden-touch">
      @if($app->signed)
      <a class="get solid--blue center pt-3 pb-3 pl1 pr1 m-2" href="/install/{{$app->uid}}">
        <i class="fas fa-download mt-2 mb-2 mr-5"></i>Install Now
      </a>
      @endif
      @if($app->unsigned)
      <a class="get solid--white always-dark center pt-3 pb-3 pl1 pr1 m-2" href="/download/{{$app->uid}}">
        <i class="fas fa-wrench mt-2 mb-2 mr-5"></i>Download IPA
      </a>
      @endif
    </div>
  </div>
</article>

<div class="is-hidden-desktop pl1 has-background-white">
  @if($app->signed)
  <a class="get solid--blue center pt-3 pb-3 pl1 pr1 m-2" href="/install/{{$app->uid}}">
    <i class="fas fa-download mt-2 mb-2 mr-5"></i>Install Now
  </a>
  @endif
  @if($app->unsigned)
  <a class="get solid--white always-dark center pt-3 pb-3 pl1 pr1 m-2" href="/download/{{$app->uid}}">
    <i class="fas fa-wrench mt-2 mb-2 mr-5"></i>Download IPA
  </a>
  @endif
</div>


<nav class="level is-mobile pt2 pb1 has-background-white">
  <div class="level-item has-text-centered">
    <div>
      <p class="heading">Downloads</p>
      <p class="is-size-4-desktop is-size-6-touch has-text-weight-bold">{{format_int($app->downloads)}}</p>
    </div>
  </div>
  <div class="level-item has-text-centered">
    <div>
      <p class="heading">Views</p>
      <p class="is-size-4-desktop is-size-6-touch has-text-weight-bold">{{format_int($app->views)}}</p>
    </div>
  </div>
  <div class="level-item has-text-centered">
    <div>
      <p class="heading">Size</p>
      <p class="is-size-4-desktop is-size-6-touch has-text-weight-bold">{{format_int($app->size, 'file')}}</p>
    </div>
  </div>
  <div class="level-item has-text-centered">
    <div>
      <p class="heading">Version</p>
      <p class="is-size-4-desktop is-size-6-touch has-text-weight-bold">{{ $app->version }}</p>
    </div>
  </div>
</nav>


    @admin
    <page-uid uid="{{$app->uid}}" :set-auth="{{Auth::user()->toJson()}}"></page-uid>
    @else

    <div class="has-background-white pt1 pb1 ad">
      <!-- adsense -->
      <ins class="adsbygoogle"
           style="display:block"
           data-ad-client="ca-pub-4649450952406116"
           data-ad-slot="5262456899"
           data-ad-format="auto"></ins>
    </div>

    <div class="has-background-white pt1 pb1 mt1">
      <div class="markdown-body">{!! $app->html !!}</div>
    </div>
    @if ($app->tags)
    <div class="flex tags has-background-white pt1 pb1 mt1 mb2">
      @foreach (explode(",", $app->tags) as $tag)
        <a href="/apps/{{$tag}}" class="tag">{{$tag}}</a>
      @endforeach
    </div>
    @endif
    @endadmin




@endsection

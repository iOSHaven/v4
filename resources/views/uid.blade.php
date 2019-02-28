@extends('layouts.redesign')


@section('content')


<div class="container">
  <div class="row">
    <div class="col-12 my-3">
      <form action="/apps" method="get">
        <input name="q" type="text" class="p-3" placeholder="Search apps..." aria-label="Search apps...">
      </form>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-12">
      <img class="col-12" src="{{ url($app->banner) }}" alt="">
    </div>
  </div>
  <div class="row mt-3 mb-5">
    <div class="col-1">
      <img class="col-12" src="{{ url($app->icon) }}" alt="">
    </div>
    <div class="col-11 h3 mb-0 pl-3">
      {{ $app->name }}
    </div>
  </div>
  
  <div class="row mb-5">
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
  </div>

  <div class="row">
    @if($app->unsigned)
      <a href="/download/{{$app->uid}}" class="btn btn-dark py-1">Download IPA</a>
    @endif
    @if($app->signed)
      <a href="/install/{{$app->uid}}" class="btn btn-blue ml-3 py-1">Install Now</a>
    @endif
    @admin
      <a href="/app/edit/{{$app->uid}}" class="btn btn-red ml-3 py-1">Edit</a>
    @endadmin
  </div>
  
  <div class="row">
    <section>
      {!! $app->html !!}
    </section>
  </div>
  <div class="row">
      @foreach (explode(",", $app->tags) as $tag)
        <a href="/apps/{{$tag}}" class="btn btn-dark py-0 px-1 mr-1 border-none">{{$tag}}</a>
      @endforeach
  </div>
  
</div>






@endsection

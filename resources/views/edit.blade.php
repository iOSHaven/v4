@extends('layouts.redesign')
@section('content')

<div class="container pt-4">
  <div class="row mb-4">
    <div class="col-12">
      <div class="h3"><a href="/app/{{ $app->uid }}" class="text-dark display">{{ $app->name }}</a></div>
    </div>
    <div class="col-2">
      <img class="border-rounded col-12" src="{{ url($app->icon) }}" alt="icon">
    </div>
    <div class="col-10">
      <img class="col-12" src="{{ url($app->banner) }}" alt="banner">
    </div>
    
  </div>
  <div class="row">
    <form action="/app/update" method="post" class="flex-wrap col-12">
      {{ csrf_field() }}
      <input type="hidden" name="uid" value="{{ $app->uid }}">
      <div class="col-tablet-portrait-6 mb-3" >
        <label for="">App name</label>
        <input type="text" class="p-3" maxlength="255" placeholder="String..." data-lpignore="true" value="{{ $app->name }}" name="name">
      </div>

      <div class="col-tablet-portrait-6 mb-3">
        <label for="">App Version</label>
        <input type="text" class="p-3" maxlength="12" placeholder="String..." data-lpignore="true" value="{{ $app->version }}" name="version">
      </div>

      <div class="col-tablet-portrait-6 mb-3">
        <label for="">App Size (1000000 = 1MB)</label>
        <input type="text" class="p-3" maxlength="20" placeholder="Number..." data-lpignore="true" value="{{ $app->size }}" name="size">
      </div>

      <div class="col-tablet-portrait-6 mb-3">
        <label for="">IPA Link</label>
        <input type="text" class="p-3" maxlength="255" placeholder="URL..." data-lpignore="true" value="{{ $app->unsigned }}" name="unsigned">
      </div>

      <div class="col-tablet-portrait-6 mb-3">
        <label for="">Signed Link</label>
        <input type="text" class="p-3" maxlength="255" placeholder="ITMS URL..." data-lpignore="true" value="{{ $app->signed }}" name="signed">
      </div>

      <div class="col-tablet-portrait-6 mb-3">
        <label for="">App Icon</label>
        <input type="text" class="p-3" maxlength="255" placeholder="URL..." data-lpignore="true" value="{{ $app->icon }}" name="icon">
      </div>

      <div class="col-tablet-portrait-6 mb-3">
        <label for="">App Banner</label>
        <input type="text" class="p-3" maxlength="255" placeholder="URL..." data-lpignore="true" value="{{ $app->banner }}" name="banner">
      </div>

      <div class="col-tablet-portrait-6 mb-3">
        <label for="">Short Description</label>
        <input type="text" class="p-3" maxlength="18" placeholder="String..." data-lpignore="true" value="{{ $app->short }}" name="short">
      </div>

      <div class="col-12 mb-3">
        <label for="">Full Description</label>
        <textarea rows="8" class="p-3 col-12" maxlength="65000" placeholder="Markdown..." name="description"> value="{{ $app->description }}"</textarea>
      </div>

      <div class="col-12 mb-3">
        <label for="">Tags</label>
        <input type="text" class="p-3 col-12" maxlength="255" placeholder="<String>..." data-lpignore="true" value="{{ $app->tags }}" name="tags">
      </div>

      <button type="submit" class="btn btn-blue p-3">Save Changes.</button>
    </form>
    

  </div>
</div>



@endsection

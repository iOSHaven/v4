@extends('layouts.redesign')
@section('content')

<div class="container">
  <div class="row">
    <div class="col-12 my-3">
      <form action="/apps" method="get" autocomplete="off">
        <div class="autocomplete">
            <input name="q" type="text" class="p-3 autocomplete" id="appsearch" placeholder="Search apps..." data-fetch="/apps/getJson" data-template="/tl/app-search-edit" data-result="result">
            <div class="autocomplete-results" id="result"></div>
        </div>
      </form>
    </div>
  </div>
</div>

@admin
<div class="container mt-3">
  <div class="row">
    <form action="/app/create" method="post">
      {{ csrf_field() }}
      <button type="submit" class="btn btn-blue">Add App</button>
    </form>
  </div>
</div>
@endadmin

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
        <input type="text" class="p-3" maxlength="65000" placeholder="URL..." data-lpignore="true" value="{{ $app->unsigned }}" name="unsigned">
      </div>

      <div class="col-tablet-portrait-6 mb-3">
        <label for="">Signed Link</label>
        <input type="text" class="p-3" maxlength="65000" placeholder="ITMS URL..." data-lpignore="true" value="{{ $app->signed }}" name="signed">
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
        <textarea rows="8" class="p-3 col-12" maxlength="65000" placeholder="Markdown..." name="description"> {{ $app->description }}</textarea>
      </div>

      <div class="col-12 mb-3">
        <label for="">Tags</label>
        <input type="text" class="p-3 col-12" maxlength="255" placeholder="<String>..." data-lpignore="true" value="{{ $app->tags }}" name="tags">
      </div>

      <button type="submit" class="btn btn-blue p-3">Save Changes.</button>
      <label for="remove" class="btn btn-red p-3 ml-3">Remove App</label>
    </form>

    <form class="" action="/app/remove" method="post">
      {{ csrf_field() }}
      <button type="submit" class="btn btn-red p-3" id="remove" style="display: none;" name="uid" value="{{ $app->uid }}"></button>
    </form>


  </div>
</div>



@endsection

@section('footer')
<script>
    autocomplete('appsearch', function (e, target, json) {
        var j = []
        json.forEach(app => {
            var a = Object.assign({}, app)
            var match = a.name.toLowerCase().indexOf(target.value.toLowerCase()) !== -1
            if (match) {
                a.name = a.name.split(new RegExp(target.value, 'i')).join('<span class="auto-complete-match"> ' + target.value + '</span>')
                j.push(a)
            }
        })
        j.sort((a,b) => {
            if (a.name < b.name)
                return -1;
            if (a.name > b.name)
                return 1;
            return 0;
        })
        return j.slice(0,10)
    })
</script>
@endsection

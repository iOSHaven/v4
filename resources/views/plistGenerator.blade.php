@extends('layouts.default')
@section('head')
<link rel="stylesheet" href="/css/uid.css">
@endsection
@section('content')
<div class="wrapper medium">
  <h1>Found a bug?</h1>
  <form class="card p1" method="POST" action="/plist">
    {{ csrf_field() }}

    <div class="field">
      <label>name of the app</label>
      <input type="text" class="fancy p1 mt-5" name="name" placeholder="name">
    </div>

    <div class="field">
      <label>signed url to be transfered</label>
      <input type="text" class="fancy p1 mt-5" name="url" placeholder="url">
    </div>

    <div class="field">
      <label>Result</label>
      <input type="text" class="fancy p1 mt-5" disabled="disabled" value="{{Session::get('plist')}}">
    </div>

    <input type="submit" class="fancy fill--blue" style="background:transparent">
  </form>
</div>

@endsection

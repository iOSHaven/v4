@extends('layouts.redesign')


@section('content')

<div class="container pt-3">
  <div class="row">
    <div class="col-tablet-portrait-5 mx-auto flex-cc">
      <a class="btn col-tablet-portrait-6 py-1 border-none btn btn-dark disabled">Login</a>
      <a class="btn col-tablet-portrait-6 py-1 border-none btn btn-white text-dark" href="/register">Sign up</a>
    </div>
  </div>
  <div class="row mt-3">
    <div class="col-tablet-portrait-5 mx-auto">
      <form action="{{ route('login') }}" method="post">
        {{ csrf_field() }}
        <input type="text" class="p-3 {{ $errors->has('username') ? ' has-error' : '' }}" value="{{ old('username') }}" name="username" placeholder="username" required autofocus>
        <input type="password" class="p-3 {{ $errors->has('password') ? ' has-error' : '' }}" name="password" placeholder="password" required>
        <button type="submit" class="p-3 btn btn-blue col-12 mt-3">Login</button>
      </form>
    </div>

  </div>
</div>


@endsection

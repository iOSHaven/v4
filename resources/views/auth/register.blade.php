@extends('layouts.default')

@section('content')
<div class="wrapper mobile mt2">
  @if ($errors->any())
    @foreach ($errors->all() as $error)
        <alert type="error" message="{{ $error }}"></alert>
    @endforeach
  @endif

  <div class="tabs">
    <a class="tab" href="/login">login</a>
    <a class="tab selected" >signup</a>
  </div>
  <form class="card" action="{{ route('register') }}" method="post">
    {{ csrf_field() }}
    <div class="field">
      <input type="text" class="big {{ $errors->has('username') ? ' has-error' : '' }}" value="{{ old('username') }}" name="username" placeholder="username" required >
      <input type="password" class="big {{ $errors->has('password') ? ' has-error' : '' }}" name="password" placeholder="password" required autocomplete="new-email">
      <input type="password" class="big" name="password_confirmation" placeholder="confirm password" required>
    </div>
    <div class="field">
      <button type="submit" class="big blue">Signup</button>
    </div>
  </form>
</div>
@endsection

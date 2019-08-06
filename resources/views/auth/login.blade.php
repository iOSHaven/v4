@extends('layouts.redesign')


@section('content')

<section>
  <div class="container">
      <h3 class="mt-0">Login</h3>
      <form action="{{ route('login') }}" method="post">
        {{ csrf_field() }}
        <label for="title">{{__('Username')}}</label>
        <div class="flex-cc mb-4 parent">
            <span class="input-icon p-3">
                <i class="fal fa-id-card"></i>
            </span>
            <input value="{{ old('username') }}" class="input p-3 pl-5 border-thin-normal" type="text" placeholder="username" name="username">
        </div>

        <label for="title">{{__('Password')}}</label>
        <div class="flex-cc mb-4 parent">
            <span class="input-icon p-3">
                <i class="fal fa-key"></i>
            </span>
            <input value="{{ old('password') }}" class="input p-3 pl-5 border-thin-normal" type="password" placeholder="*********" name="password">
        </div>

        <a href="/password/reset" class="d-block">
          <small>Forgot password?</small>
          </a>

          <p>Don't have an account? <a href="/register">Sign up.</a></p>

        <button type="submit" class="btn btn-blue mt-3">
          <i class="fad fa-sign-in-alt mr-3"></i>
          Login</button>
      </form>
  </div>
</section>

{{-- <div class="container pt-3">
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
</div> --}}


@endsection

@extends('layouts.redesign', ["title" => "Login", "hide_nav" => true, "hide_ads" => true])

@section('content')



{{-- <div class="px-24 mb-3">
  <img src="/SVG/login.svg" class="w-full" alt="">
</div>- --}}


<section>
  <div class="max-w-[50ch] mx-auto">
    {{-- <h3 class="mt-0 text-3xl font-display">Login</h3> --}}
    <form action="{{ route('login') }}" method="post">
      {{ csrf_field() }}

      <div class="mb-10">
        @component('components.form.image', [
        "src" => "/SVG/login.svg",
      ])@endcomponent
      </div>


      @component('components.form.input', [
        "label" => "Email",
        "name" => "email",
        "icon" => "fal fa-at",
        "type" => "text",
      ])@endcomponent
      @component('components.form.input', [
        "label" => "Password",
        "name" => "password",
        "icon" => "fal fa-lock-alt",
        "type" => "password",
      ])@endcomponent

      @component('components.form.submit', [
        "icon" => "fas fa-sign-in-alt",
        "text" => "Login"
      ])@endcomponent

      <a href="{{ route('password.request') }}" class="text-blue-500">
        Forgot password?
      </a>

      <p class="mt-1">Don't have an account? <a href="/register" class="text-blue-500">Sign up.</a></p>

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
<input type="text" class="p-3 {{ $errors->has('username') ? ' has-error' : '' }}" value="{{ old('username') }}"
  name="username" placeholder="username" required autofocus>
<input type="password" class="p-3 {{ $errors->has('password') ? ' has-error' : '' }}" name="password"
  placeholder="password" required>
<button type="submit" class="p-3 btn btn-blue col-12 mt-3">Login</button>
</form>
</div>

</div>
</div> --}}


@endsection
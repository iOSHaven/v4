@extends('layouts.redesign', ["title" => "Login", "hide_nav" => true, "hide_ads" => true])

@section('content')


<section>
  <div class="max-w-[50ch] mx-auto">
    {{-- <h3 class="mt-0 text-3xl font-display">Login</h3> --}}
    <form action="{{ route('password.update') }}" method="post">
      {{ csrf_field() }}

      <!-- Password Reset Token -->
      <input type="hidden" name="token" value="{{ $request->route('token') }}">

      <div class="mb-10">
        @component('components.form.image', [
        "src" => "/SVG/secure.svg",
        ])@endcomponent
      </div>


      @component('components.form.input', [
        "label" => "Email",
        "name" => "email",
        "icon" => "fal fa-at",
        "type" => "text",
        "value" => old('email', $request->email)
      ])@endcomponent

      @component('components.form.input', [
        "label" => "Password",
        "name" => "password",
        "icon" => "fal fa-lock-alt",
        "type" => "password",
      ])@endcomponent

      @component('components.form.input', [
        "label" => "Confirm Password",
        "name" => "password_confirmation",
        "icon" => "fal fa-lock-alt",
        "type" => "password",
      ])@endcomponent


      @component('components.form.submit', [
        "icon" => "fas fa-sign-in-alt",
        "text" => "Reset password"
      ])@endcomponent


    </form>
  </div>
</section>


@endsection
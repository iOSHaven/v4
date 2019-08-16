@extends('layouts.redesign', ["title" => "signup", "hide_nav" => true])

@section('content')


<section>
  <div class="container">
    {{-- <h3 class="mt-0">Sign up</h3> --}}
    <form action="{{ route('register') }}" method="post">
      {{ csrf_field() }}
      @component('components.form.image', [
        "src" => "/SVG/register.svg",
      ])@endcomponent

      @component('components.form.input', [
        "label" => "Username",
        "name" => "username",
        "icon" => "fal fa-id-card",
        "type" => "text"
      ])@endcomponent
      @component('components.form.input', [
        "label" => "Email",
        "name" => "email",
        "icon" => "fal fa-envelope",
        "type" => "email",
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

      <p>Already have an account? <a href="/login" class="{{ theme('text-blue') }}">Login.</a></p>

      @component('components.form.submit', [
        "icon" => "fas fa-sign-in-alt",
        "text" => "Register"
      ])@endcomponent

    </form>
  </div>
</section>

@endsection
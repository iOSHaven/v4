@extends('layouts.redesign', ["title" => "Change Password", "hide_ads" => true, "hide_nav" => true])

@section('content')

{{-- <div class="px-24 mb-3">
    <img src="/SVG/secure.svg" class="w-full" alt="">
  </div> --}}
  
  {{-- <p>Account settings are coming soon!</p> --}}
  <form action="/user/password" method="POST" class="mt-3">
  
    {{ csrf_field() }}
    @component('components.form.image', [
      "src" => "/SVG/secure.svg",
    ])@endcomponent

    @component('components.form.input', [
      "label" => "Old Password",
      "name" => "password",
      "icon" => "fal fa-lock-alt",
      "type" => "password",
    ])@endcomponent
    @component('components.form.input', [
      "label" => "New Password",
      "name" => "new_password",
      "icon" => "fal fa-lock-alt",
      "type" => "password",
    ])@endcomponent
    @component('components.form.input', [
      "label" => "New Password",
      "name" => "new_password_confirmation",
      "icon" => "fal fa-lock-alt",
      "type" => "password",
    ])@endcomponent

    @component('components.form.submit', [
      "icon" => "fas fa-save",
      "text" => "Save"
    ])@endcomponent
    
  </form>


@endsection

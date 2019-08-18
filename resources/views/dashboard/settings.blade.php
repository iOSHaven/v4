@extends('layouts.redesign', ["title" => "Settings", "hide_ads" => true, "hide_nav" => true])

@section('content')

{{-- <div class="px-24 mb-3">
  <img src="/SVG/settings.svg" class="w-full" alt="">
</div> --}}

{{-- <p>Account settings are coming soon!</p> --}}
<form action="/user/settings" method="POST" class="mt-3">

  {{ csrf_field() }}
  <input type="hidden" name="old_username" value="{{ Auth::user()->username }}">
  <input type="hidden" name="old_email" value="{{ Auth::user()->email }}">

  @component('components.form.image', [
    "src" => "/SVG/settings.svg",
  ])@endcomponent

  @component('components.form.input', [
    "label" => "Username",
    "name" => "username",
    "icon" => "fal fa-id-card",
    "type" => "text",
    "value" => Auth::user()->username,
  ])@endcomponent
  @component('components.form.input', [
    "label" => "Email",
    "name" => "email",
    "icon" => "fal fa-envelope",
    "type" => "email",
    "value" => Auth::user()->email,
  ])@endcomponent

  @component('components.form.submit', [
    "icon" => "fas fa-save",
    "text" => "Save"
  ])@endcomponent
  {{-- <label for="title" class="text-lg">Username</label>
  <div class="flex items-center justify-center mb-2 relative border rounded-full">
    <span class="absolute top-0 left-0 py-3 pl-5">
      <i class="fal fa-id-card"></i>
    </span>
    <input value="{{ Auth::user()->username ?? old('username') }}" class="w-full p-3 pl-12 rounded-full" type="text"
      placeholder="Username" name="username">
  </div>

  <label for="title" class="text-lg">Email</label>
  <div class="flex items-center justify-center mb-2 relative border rounded-full">
    <span class="absolute top-0 left-0 py-3 pl-5">
      <i class="fal fa-envelope"></i>
    </span>
    <input value="{{ Auth::user()->email ?? old('email') }}" class="w-full p-3 pl-12 rounded-full" type="email"
      placeholder="example@gmail.com" name="email">
  </div>

  <div class="text-right my-3">
    <button type="submit"
      class="font-bold text-lg rounded-full text-sm px-10 py-3 {{ theme("bg-blue", "text-white") }}">
      <i class="fad fa-save mr-3"></i>
      Save</button>
  </div> --}}
</form>


@endsection
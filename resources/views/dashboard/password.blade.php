@extends('layouts.redesign', ["title" => "Change Password", "hide_ads" => true, "hide_nav" => true])

@section('content')

<div class="px-24 mb-3">
    <img src="/SVG/secure.svg" class="w-full" alt="">
  </div>
  
  {{-- <p>Account settings are coming soon!</p> --}}
  <form action="/user/password" method="POST" class="mt-3">
  
    {{ csrf_field() }}
  
    <label for="title" class="text-lg">Old Password</label>
    <div class="flex items-center justify-center mb-2 relative border rounded-full">
      <span class="absolute top-0 left-0 py-3 pl-5">
        <i class="fal fa-history"></i>
      </span>
      <input class="w-full p-3 pl-12 rounded-full" type="password"
        placeholder="* * * * * * * * * *" name="password">
    </div>

    <label for="title" class="text-lg">New Password</label>
    <div class="flex items-center justify-center mb-2 relative border rounded-full">
      <span class="absolute top-0 left-0 py-3 pl-5">
        <i class="fal fa-lock-alt"></i>
      </span>
      <input class="w-full p-3 pl-12 rounded-full" type="password"
      placeholder="* * * * * * * * * *" name="new_password">
    </div>
  
    <label for="title" class="text-lg">Confirm New Password</label>
    <div class="flex items-center justify-center mb-2 relative border rounded-full">
      <span class="absolute top-0 left-0 py-3 pl-5">
        <i class="fal fa-lock-alt"></i>
      </span>
      <input class="w-full p-3 pl-12 rounded-full" type="password"
      placeholder="* * * * * * * * * *" name="new_password_confirmation">
    </div>
  
    <div class="text-right my-3">
      <button type="submit"
        class="font-bold text-lg rounded-full text-sm px-10 py-3 {{ theme("bg-blue", "text-white") }}">
        <i class="fad fa-save mr-3"></i>
        Change password</button>
    </div>
  </form>


@endsection

@extends('layouts.redesign', ["title" => "signup", "hide_nav" => true])

@section('content')


<div class="px-24 mb-3">
  <img src="/SVG/register.svg" class="w-full" alt="">
</div>
<section>
  <div class="container">
    {{-- <h3 class="mt-0">Sign up</h3> --}}
    <form action="{{ route('register') }}" method="post">
      {{ csrf_field() }}
      <label for="title" class="text-lg">{{__('Username')}}</label>
      <div class="flex items-center justify-center mb-2 relative border rounded-full">
        <span class="absolute top-0 left-0 py-3 pl-5">
          <i class="fal fa-id-card"></i>
        </span>
        <input value="{{ old('username') }}" class="w-full p-3 pl-12 rounded-full" type="text" placeholder="username"
          name="username">
      </div>

      <label for="title" class="text-lg">{{__('Email')}}</label>
      <div class="flex items-center justify-center mb-2 relative border rounded-full">
        <span class="absolute top-0 left-0 py-3 pl-5">
          <i class="fal fa-envelope"></i>
        </span>
        <input value="{{ old('email') }}" class="w-full p-3 pl-12 rounded-full" type="email" placeholder="Email"
          name="email">
      </div>

      <label for="title" class="text-lg">{{__('Password')}}</label>
      <div class="flex items-center justify-center mb-2 relative border rounded-full">
        <span class="absolute top-0 left-0 py-3 pl-5">
          <i class="fal fa-lock-alt"></i>
        </span>
        <input value="{{ old('password') }}" class="w-full p-3 pl-12 rounded-full" type="password"
          placeholder="* * * * * * * * * *" name="password">
      </div>

      <label for="title" class="text-lg">{{__('Confirm Password')}}</label>
      <div class="flex items-center justify-center mb-2 relative border rounded-full">
        <span class="absolute top-0 left-0 py-3 pl-5">
          <i class="fal fa-lock-alt"></i>
        </span>
        <input value="{{ old('password_confirmation') }}" class="w-full p-3 pl-12 rounded-full" type="password"
          placeholder="* * * * * * * * * *" name="password_confirmation">
      </div>

      <p>Already have an account? <a href="/login" class="{{ theme('text-blue') }}">Login.</a></p>

      <div class="text-right my-3">
        <button type="submit"
          class="font-bold text-lg rounded-full text-sm px-10 py-3 {{ theme("bg-blue", "text-white") }}">
          <i class="fad fa-sign-in-alt mr-3"></i>
          Register</button>
      </div>

    </form>
  </div>
</section>

@endsection
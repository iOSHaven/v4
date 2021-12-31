@extends('layouts.redesign', ["title" => "Password Reset", "hide_nav" => true, "hide_ads" => true] )

@section('content')

<div class="px-24 mb-3">
    <img src="/SVG/secure.svg" class="w-full" alt="">
</div>

<section>
    <div class="container">
        {{-- <h3 class="mt-0">Password Reset</h3> --}}
        <form action="{{ route('password.update') }}" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="token" value="{{ $token }}">

            <label for="title" class="text-lg">{{__('E-Mail Address')}}</label>
            <div class="flex items-center justify-center mb-2 relative border rounded-full">
                <span class="absolute top-0 left-0 py-3 pl-5">
                    <i class="fal fa-envelope"></i>
                </span>
                <input value="{{ $email ?? old('email') }}" class="w-full p-3 pl-12 rounded-full" type="email"
                    placeholder="example@gmail.com" name="email" required autofocus>
            </div>

            <label for="title" class="text-lg">{{__('Password')}}</label>
            <div class="flex items-center justify-center mb-2 relative border rounded-full">
                <span class="absolute top-0 left-0 py-3 pl-5">
                    <i class="fal fa-lock-alt"></i>
                </span>
                <input value="{{ old('password') }}" class="w-full p-3 pl-12 rounded-full" type="password"
                    placeholder="*********" name="password" required>
            </div>

            <label for="title" class="text-lg">{{__('Confirm Password')}}</label>
            <div class="flex items-center justify-center mb-2 relative border rounded-full">
                <span class="absolute top-0 left-0 py-3 pl-5">
                    <i class="fal fa-lock-alt"></i>
                </span>
                <input value="{{ old('password_confirmation') }}" class="w-full p-3 pl-12 rounded-full" type="password"
                    placeholder="* * * * * * * * * *" name="password_confirmation" required>
            </div>

            <div class="text-right my-3">
                <button type="submit"
                    class="font-bold text-lg rounded-full text-sm px-10 py-3 text-blue-500 text-white dark:text-black">
                    <i class="fad fa-key mr-3"></i>
                    Reset password</button>
            </div>
        </form>
    </div>

</section>
@endsection
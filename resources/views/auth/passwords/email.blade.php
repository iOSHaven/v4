@extends('layouts.redesign', ["title" => "Password Reset", "hide_nav" => true, "hide_ads" => true])


@section('content')


<div class="px-24 mb-3">
    <img src="/SVG/forgot_password.svg" class="w-full" alt="">
</div>

<section>
    <div class="container">
        {{-- <h3 class="mt-0">Password Reset</h3> --}}
        <form action="{{ route('password.email') }}" method="post">
            {{ csrf_field() }}

            <label for="title" class="text-lg">{{__('E-Mail Address')}}</label>
            <div class="flex items-center justify-center mb-4 relative border rounded-full">
                <span class="absolute top-0 left-0 py-3 pl-5">
                    <i class="fal fa-envelope"></i>
                </span>
                <input value="{{ old('email') }}" class="w-full p-3 pl-12 rounded-full" type="email"
                    placeholder="example@gmail.com" name="email">
            </div>

            <div class="text-right my-3">
                <button type="submit"
                    class="font-bold text-lg rounded-full text-sm px-10 py-3 {{ theme("bg-blue", "text-white") }}">
                    <i class="fad fa-paper-plane mr-3"></i>
                    Send reset</button>
            </div>
    </div>

</section>


@endsection
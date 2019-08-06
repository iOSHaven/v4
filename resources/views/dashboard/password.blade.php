@extends('layouts.dashboard', ["page" => "Password"])

@section("images")
_image_("/avatar/{{ Auth::user()->username }}")
@endsection

@section('content')

<p>Password settings are coming soon!</p>
{{-- <form action="" class="mt-3">
  
    {{ csrf_field() }}
    <label for="title">Username</label>
    <div class="flex-cc mb-4 parent">
      <span class="input-icon p-3">
        <i class="fal fa-id-card"></i>
      </span>
      <input value="{{ Auth::user()->username ?? old('username') }}" class="input p-3 pl-5 b-1 b-light" type="text" placeholder="Username" name="username">
    </div>

    <label for="title">Email</label>
    <div class="flex-cc mb-4 parent">
      <span class="input-icon p-3">
        <i class="fal fa-envelope"></i>
      </span>
      <input value="{{ Auth::user()->email ?? old('email') }}" class="input p-3 pl-5 b-1 b-light" type="email" placeholder="example@gmail.com" name="email">
    </div>

    <button type="submit" class="btn btn-blue mt-3"><i class="fad fa-save mr-3"></i>Save</button>

</form> --}}


@endsection

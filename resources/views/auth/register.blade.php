@extends('layouts.redesign')

@section('content')


{{-- <div class="container pt-3">
  <div class="row">
      <div class="col-tablet-portrait-5 mx-auto flex-cc">
        <a class="btn col-tablet-portrait-6 py-1 border-none btn btn-white text-dark" href="/login">Login</a>
        <a class="btn col-tablet-portrait-6 py-1 border-none btn btn-dark disabled">Sign up</a>
      </div>
    </div>
    <div class="row mt-3">
      <div class="col-tablet-portrait-5 mx-auto">
        <form action="{{ route('register') }}" method="post">
          {{ csrf_field() }}
          <input type="text" class="p-3 {{ $errors->has('username') ? ' has-error' : '' }}" value="{{ old('username') }}" name="username" placeholder="username" required >
          <input type="password" class="p-3 {{ $errors->has('password') ? ' has-error' : '' }}" name="password" placeholder="password" required autocomplete="new-email">
          <input type="password" class="p-3" name="password_confirmation" placeholder="confirm password" required>
          <button type="submit" class="p-3 btn btn-blue col-12 mt-3">Signup</button>    
        </form>
      </div>
    </div>
</div> --}}


<section>
    <div class="container">
        <h3 class="mt-0">Sign up</h3>
        <form action="{{ route('register') }}" method="post">
          {{ csrf_field() }}
          <label for="title">{{__('Username')}}</label>
          <div class="flex-cc mb-4 parent">
              <span class="input-icon p-3">
                  <i class="fal fa-id-card"></i>
              </span>
              <input value="{{ old('username') }}" class="input p-3 pl-5 border-thin-normal" type="text" placeholder="username" name="username">
          </div>
  
          <label for="title">{{__('Password')}}</label>
          <div class="flex-cc mb-4 parent">
              <span class="input-icon p-3">
                  <i class="fal fa-key"></i>
              </span>
              <input value="{{ old('password') }}" class="input p-3 pl-5 border-thin-normal" type="password" placeholder="*********" name="password">
          </div>

          <label for="title">{{__('Confirm Password')}}</label>
          <div class="flex-cc mb-4 parent">
              <span class="input-icon p-3">
                  <i class="fal fa-key"></i>
              </span>
              <input value="{{ old('password_confirmation') }}" class="input p-3 pl-5 border-thin-normal" type="password" placeholder="*********" name="password_confirmation">
          </div>
  
          <p>Already have an account? <a href="/login">Login.</a></p>
  
          <button type="submit" class="btn btn-blue mt-3">
            <i class="fad fa-sign-in-alt mr-3"></i>
            Sign up</button>
        </form>
    </div>
  </section>

@endsection

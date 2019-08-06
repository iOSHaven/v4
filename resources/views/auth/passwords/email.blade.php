{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}


@extends('layouts.redesign')


@section('content')

{{-- <div class="container pt-3">
  <div class="row">
    <div class="col-tablet-portrait-5 mx-auto flex-cc">
      <a class="btn col-tablet-portrait-6 py-1 border-none btn btn-dark disabled">Login</a>
      <a class="btn col-tablet-portrait-6 py-1 border-none btn btn-white text-dark" href="/register">Sign up</a>
    </div>
  </div>
  <div class="row mt-3">
    <div class="col-tablet-portrait-5 mx-auto">
      
    </div>

  </div>
</div> --}}

<section>
    <div class="container">
        <h3 class="mt-0">Password Reset</h3>
        <form action="{{ route('password.email') }}" method="post">
        {{ csrf_field() }}

        <label for="title">{{__('E-Mail Address')}}</label>
        <div class="flex-cc mb-4 parent">
            <span class="input-icon p-3">
                <i class="fal fa-envelope"></i>
            </span>
            <input value="{{ old('email') }}" class="input p-3 pl-5 border-thin-normal" type="email" placeholder="example@gmail.com" name="email">
        </div>

        <button type="submit" class="btn btn-blue mt-3">
            <i class="fad fa-paper-plane mr-3"></i>
            Send reset</button>
        </form>
    </div>
    
</section>


@endsection

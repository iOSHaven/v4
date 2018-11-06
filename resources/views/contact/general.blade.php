@extends('layouts.default')
@section('head')
<script src='https://www.google.com/recaptcha/api.js'></script>
@endsection
@section('content')
<div class="wrapper">
  <div class="is-size-1 has-text-weight-bold mt1">Contact us</div>
  <form method="POST" action="/contact" id="contact-form">
    {{ csrf_field() }}

    <input type="hidden" name="type" value="General">

    <div class="field">
      <label class="label">Title</label>
      <div class="control has-icons-left has-icons-right">
        <input value="{{ old('title') }}" class="input" type="text" placeholder="I'm contacting you because..." name="title">
        <span class="icon is-small is-left">
          <i class="fas fa-feather-alt"></i>
        </span>
      </div>
    </div>

    <div class="field">
      <label class="label">Email</label>
      <div class="control has-icons-left has-icons-right">
        <input value="{{ old('email') }}" class="input" type="email" placeholder="Email" name="email">
        <span class="icon is-small is-left">
          <i class="fas fa-envelope"></i>
        </span>
      </div>
    </div>


    <div class="field">
      <label class="label">Message</label>
      <div class="control">
        <textarea class="textarea" placeholder="What do you want to tell us?" name="message">{{ old('message') }}</textarea>
      </div>
    </div>

    @if ($errors->has('g-recaptcha-response'))
        <span class="has-text-danger has-text-weight-bold">
            {{ $errors->first('g-recaptcha-response') }}
        </span>
    @endif

    {!! NoCaptcha::display() !!}

    <input type="submit" class="fancy solid--blue mt1" style="background:transparent">
  </form>
</div>

@endsection

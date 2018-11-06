@extends('layouts.default')
@section('head')
<script src='https://www.google.com/recaptcha/api.js'></script>
@endsection
@section('content')
<div class="wrapper">
  <div class="is-size-1 has-text-weight-bold mt1">We are listening</div>
  <form method="POST" action="/contact" id="contact-form">
    {{ csrf_field() }}

    <input type="hidden" name="type" value="Request">

    <div class="field">
      <label class="label">Title</label>
      <div class="control has-icons-left has-icons-right">
        <input value="{{ old('title') }}" class="input" type="text" placeholder="You should change..." name="title">
        <span class="icon is-small is-left">
          <i class="fas fa-feather-alt"></i>
        </span>
      </div>
    </div>

    <div class="field">
      <label class="label">Type of request</label>
      <div class="control">
        <div class="select">
          <select required name="suggestion-type">
            <option disabled="disabled" value="" selected="selected">select type</option>
            <option value="app" @if (old('suggestion-type') == "app") {{ 'selected' }} @endif>App</option>
            <option value="beta" @if (old('suggestion-type') == "beta") {{ 'selected' }} @endif>Beta</option>
            <option value="jailbreak" @if (old('suggestion-type') == "jailbreak") {{ 'selected' }} @endif>Jailbreak</option>
            <option value="website" @if (old('suggestion-type') == "website") {{ 'selected' }} @endif>Website</option>
            <option value="other" @if (old('suggestion-type') == "other") {{ 'selected' }} @endif>Other</option>
          </select>
        </div>
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
        <textarea class="textarea" placeholder="What do you have in mind?" name="message">{{ old('message') }}</textarea>
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

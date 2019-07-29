@extends('layouts.redesign')
@section('header')
<script src="https://www.google.com/recaptcha/api.js?" async="" defer=""></script>
<style>
.border-thin-normal {
  border: 1px solid #ccc;
}
.mr--1 {
  margin-right: -1px;
}
.w-100 {
  width: 100%;
}


.parent {
  position: relative;
}
.input-icon {
  position: absolute;
  top: 0;
  left: 0;
}

</style>
@endsection
@section('content')


<section class="pt-2">
  <div class="container">
    <h2 class="text-shadow">Found a bug?</h2>
    <p>Use this form if there is something with the website.</p>
    <form action="/contact/bug" method="post" id="contact-form">

      {{ csrf_field() }}
      <label for="title">Title</label>
      <div class="flex-cc mb-4 parent">
        <span class="input-icon p-3">
          <i class="fas fa-feather"></i>
        </span>
        <input value="{{ old('title') }}" class="input p-3 pl-5 border-thin-normal" type="text" placeholder="I found a bug..." name="title">
      </div>

      <label for="email">Email</label>
      <div class="flex-cc mb-4 parent">
        <span class="p-3 input-icon">
          <i class="fas fa-envelope"></i>
        </span>
        <input value="{{ old('email') }}" class="input p-3 pl-5 border-thin-normal" type="email" placeholder="Email" name="email" id="email">
      </div>
      
      <label for="title">Message</label>
      <div class="flex-cc mb-4 parent">
        <span class="p-3 input-icon">
          <i class="fas fa-pencil"></i>
        </span>
        <textarea rows="5" class="p-3 pl-5 border-thin-normal w-100" placeholder="What is causing the issue?" name="message" id="message" >{{ old('message') }}</textarea>
      </div>
      
      @if ($errors->has('g-recaptcha-response'))
        <div class="p-3 bg-red text-white mb-3">
          <strong>Error: </strong>
          {{ $errors->first('g-recaptcha-response') }}
        </div>
      @endif

      {!! NoCaptcha::display() !!}

      <button type="submit" class="btn btn-blue mt-3">Submit Bug</button>

    </form>
  </div>
</section>



@endsection

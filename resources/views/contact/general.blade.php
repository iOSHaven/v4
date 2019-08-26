@extends('layouts.redesign', ['hide_nav' => true, "hide_ads" => true])
@section('header')
<script src='https://www.google.com/recaptcha/api.js'></script>
@endsection
@section('content')

<section class="pt-2">
    <div class="container">
      <form action="/contact/general" method="post" id="contact-form">
  
        {{ csrf_field() }}
        @component('components.form.image', [
          "src" => "/SVG/contact.general.svg",
        ])@endcomponent
        <p class="my-2">Use this form if you need to contact us about anything or you just want to say hello.</p>
        @component('components.form.input', [
          "label" => "Title",
          "name" => "title",
          "icon" => "fal fa-feather",
          "type" => "text",
        ])@endcomponent
        @component('components.form.input', [
          "label" => "Email",
          "name" => "email",
          "icon" => "fal fa-envelope",
          "type" => "email",
        ])@endcomponent
        @component('components.form.input', [
          "label" => "Message",
          "name" => "message",
          "icon" => "fal fa-pencil",
          "type" => "textarea",
        ])@endcomponent
        {!! NoCaptcha::display() !!}
        @component('components.form.submit', [
          "text" => "Send"
        ])@endcomponent
  
      </form>
    </div>
  </section>

@endsection

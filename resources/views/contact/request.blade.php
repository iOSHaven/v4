@extends('layouts.redesign', ['hide_nav' => true, "hide_ads" => true])
@section('header')
<script src='https://www.google.com/recaptcha/api.js'></script>
<style>

   .radio-list input {
      display: none;
    }

    .radio-list label {
      position: relative;
      flex-grow: 1;
      color: transparent;
      cursor: pointer;
      border-radius: 9999px;
    }

    .radio-list label::before {
      content: attr(data-value);
      color: {{ theme() == "light" ? "#aab6c7" : "#9dabbd"}};
      position: absolute;
      top: -1px;
      left: -1px;
      right: -1px;
      bottom: -1px;
      background-color: {{ theme() == "light" ? "#ebebf0" : "#242426"}};
      display: flex;
      align-items: center;
      justify-content: center;
      border: 1px solid {{ theme() == "light" ? "#6c6c70" : "#aeaeb2"}};
      border-radius: 9999px;
    }
    .radio-list input:checked + label:before {
      background-color: transparent;
      border-color: transparent;
      color: black;
    }
    
    </style>
@endsection
@section('content')

<section class="pt-2">
    <div class="container">
      {{-- <h2 class="text-shadow">Request Form</h2>
      <p>Are we missing something? Use this form to suggest new apps or other ideas.</p> --}}
      <form action="/contact/request" method="post" id="contact-form">
  
        {{ csrf_field() }}
        @component('components.form.image', [
          "src" => "/SVG/contact.request.svg",
        ])@endcomponent
        <p class="my-2">Are we missing something? Use this form to suggest new apps or other ideas.</p>
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


        <label for="email">Type</label>
        <div class="flex items-center justify-center mb-4 relative radio-list rounded-full">
          <input type="radio" name="type" id="type-1" value="App">
          <label class="p-3 {{ theme('bg-red') }}" for="type-1" data-value="App">App</label>
          <input type="radio" name="type" id="type-2" value="Feature">
          <label class="p-3 mx-1 {{ theme('bg-green') }}" for="type-2" data-value="Feature">Feature</label>
          <input type="radio" name="type" id="type-3" value="Other">
          <label class="p-3 {{ theme('bg-yellow') }}" for="type-3" data-value="Other">Other</label>
        </div>

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

@extends('layouts.redesign', ['hide_nav' => true, "hide_ads" => true])
@section('header')
<script src="https://www.google.com/recaptcha/api.js?" async="" defer=""></script>
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
    {{-- <h2 class="text-shadow">Bug Report</h2> --}}
    
    <form action="/contact/bug" method="post" id="contact-form">

      {{ csrf_field() }}
      @component('components.form.image', [
        "src" => "/SVG/contact.bug.svg",
      ])@endcomponent
      <p class="my-2">Did you find a bug? Use this form if there is something wrong with the website.</p>
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
      <label for="type">Type</label>
      <div class="flex items-center justify-center mb-4 relative radio-list">
        <input type="radio" name="type" id="type-1" value="App">
        <label class="p-3  bg-red-500" for="type-1" data-value="App">App</label>
        <input type="radio" name="type" id="type-2" value="Page">
        <label class="p-3 ml-1  bg-green-500" for="type-2" data-value="Page">Page</label>
        <input type="radio" name="type" id="type-3" value="Style">
        <label class="p-3 ml-1  bg-blue-500" for="type-3" data-value="Style">Style</label>
        <input type="radio" name="type" id="type-4" value="Other">
        <label class="p-3 ml-1 bg-yellow-500" for="type-4" data-value="Other">Other</label>
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
      {{-- <label for="title">Title</label>
      <div class="flex-cc mb-4 parent">
        <span class="input-icon p-3">
          <i class="fal fa-feather"></i>
        </span>
        <input value="{{ old('title') }}" class="input p-3 pl-5 border-thin-normal" type="text" placeholder="I found a bug..." name="title">
      </div>

      <label for="email">Email</label>
      <div class="flex-cc mb-4 parent">
        <span class="p-3 input-icon">
          <i class="fal fa-envelope"></i>
        </span>
        <input value="{{ old('email') }}" class="input p-3 pl-5 border-thin-normal" type="email" placeholder="Email" name="email" id="email">
      </div>

      
      
      <label for="title">Message</label>
      <div class="flex-cc mb-4 parent">
        <span class="p-3 input-icon">
          <i class="fal fa-pencil"></i>
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

      <button type="submit" class="btn btn-blue mt-3"><i class="fad fa-paper-plane mr-3"></i>Submit bug</button> --}}

    </form>
  </div>
</section>



@endsection

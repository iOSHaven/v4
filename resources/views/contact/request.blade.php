@extends('layouts.redesign')
@section('header')
<script src='https://www.google.com/recaptcha/api.js'></script>
<style>
    .border-thin-normal {
      border: 1px solid #ccc;
    }
    .ml--1 {
      margin-left: -1px;
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

    .radio-list input {
      display: none;
    }

    .radio-list label {
      position: relative;
      flex-grow: 1;
      color: transparent;
      cursor: pointer;
    }

    .radio-list label::before {
      content: attr(data-value);
      color: black;
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: white;
      display: flex;
      align-items: center;
      justify-content: center;
      border: 1px solid #ccc;
    }
    .radio-list input:checked + label:before {
      background-color: transparent;
    }
    
    </style>
@endsection
@section('content')

<section class="pt-2">
    <div class="container">
      <h2 class="text-shadow">Request Form</h2>
      <p>Are we missing something? Use this form to suggest new apps or other ideas.</p>
      <form action="/contact/request" method="post" id="contact-form">
  
        {{ csrf_field() }}
        <label for="title">Title</label>
        <div class="flex-cc mb-4 parent">
          <span class="input-icon p-3">
            <i class="fal fa-feather"></i>
          </span>
          <input value="{{ old('title') }}" class="input p-3 pl-5 border-thin-normal" type="text" placeholder="My amazing idea..." name="title">
        </div>
  
        <label for="email">Email</label>
        <div class="flex-cc mb-4 parent">
          <span class="p-3 input-icon">
            <i class="fal fa-envelope"></i>
          </span>
          <input value="{{ old('email') }}" class="input p-3 pl-5 border-thin-normal" type="email" placeholder="Email" name="email" id="email">
        </div>

        <label for="email">Type</label>
        <div class="flex-cc mb-4 parent radio-list">
          <input type="radio" name="type" id="type-1" value="App">
          <label class="p-3 bg-blue" for="type-1" data-value="App">App</label>
          <input type="radio" name="type" id="type-2" value="Feature">
          <label class="p-3 bg-blue ml--1" for="type-2" data-value="Feature">Feature</label>
          <input type="radio" name="type" id="type-3" value="Other">
          <label class="p-3 bg-blue ml--1" for="type-3" data-value="Other">Other</label>
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
  
        <button type="submit" class="btn btn-blue mt-3"><i class="fad fa-paper-plane mr-3"></i>Submit request</button>
  
      </form>
    </div>
  </section>

@endsection

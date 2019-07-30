@extends('layouts.redesign')
@section('header')
<script src="https://www.google.com/recaptcha/api.js?" async="" defer=""></script>
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
    
    .choice {
      border-radius: 0;
      color: black;
      flex-grow: 1;
    }
    </style>
@endsection
@section('content')


<section class="pt-2">
  <div class="container">
    <h2 class="text-shadow">What would you like to tell us?</h2>
    {{-- <p>Did you find a bug? Use this form if there is something with the website.</p> --}}
  {{-- <form action="/contact/bug" method="post" id="contact-form"> --}}

      {{ csrf_field() }}
      

      
        <div class="flex-cc mb-4 parent">
          <a href="/contact/general" class="p-3 btn btn-white border-thin-light choice" >
            <i class="fad fa-2x fa-pencil"></i><br>
            Contact
          </a>
          <a href="/contact/bug" class="p-3 btn btn-white border-thin-light choice" >
            <i class="fad fa-2x fa-bug"></i><br>
            Bug
          </a>
          <a href="/contact/request" class="p-3 btn btn-white border-thin-light choice" >
            <i class="fad fa-2x fa-bullhorn"></i><br/>
            Request
          </a>
        </div>
      
      

  {{-- </form> --}}
  </div>
</section>



@endsection

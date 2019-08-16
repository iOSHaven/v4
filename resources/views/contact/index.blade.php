@extends('layouts.redesign', ['hide_nav' => true])
@section('header')
<script src="https://www.google.com/recaptcha/api.js?" async="" defer=""></script>
@section('content')


<section class="pt-10">
  <div class="flex flex-wrap -mx-1 mt-16">
    {{-- <h2>Choose</h2> --}}
    {{-- <p>Did you find a bug? Use this form if there is something with the website.</p> --}}
  {{-- <form action="/contact/bug" method="post" id="contact-form"> --}}

      {{ csrf_field() }}
      

      <div class="px-1 w-1/2">
        <div class="p-5 rounded-full {{ theme('bg-gray-100') }}">
            <div class="text-center mb-3 {{ theme('text-indigo') }}">General</div>
            <div class="px-3">
                <img src="/SVG/contact.general.svg" class="w-full" alt="">
            </div>
        </div>
      </div>

      <div class="px-1 w-1/2">
        <div class="p-5 rounded-full {{ theme('bg-gray-100') }}">
            <div class="text-center mb-3 {{ theme('text-indigo') }}">Help</div>
            <div class="px-3">
                <img src="/SVG/contact.help.svg" class="w-full" alt="">
            </div>
        </div> 
      </div>

      <div class="px-1 w-1/2 mx-auto">
        <div class="p-5 rounded-full {{ theme('bg-gray-100') }}">
            <div class="text-center mb-3 {{ theme('text-indigo') }}">Request</div>
            <div class="px-3">
                <img src="/SVG/contact.request.svg" class="w-full" alt="">
            </div>
        </div> 
      </div>
      
      

  {{-- </form> --}}
  </div>
</section>



@endsection

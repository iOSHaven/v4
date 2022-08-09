@extends('layouts.redesign', ["title" => "Login", "hide_nav" => true, "hide_ads" => true])

@section('content')


<section>
  <div class="max-w-[50ch] mx-auto">
    <form action="{{ route('password.email') }}" method="post">
      {{ csrf_field() }}

      <div class="mb-10">
        @component('components.form.image', [
        "src" => "/SVG/secure.svg",
        ])@endcomponent
      </div>


      @component('components.form.input', [
        "label" => "Email",
        "name" => "email",
        "icon" => "fal fa-at",
        "type" => "text",
      ])@endcomponent


      @component('components.form.submit', [
        "icon" => "fas fa-sign-in-alt",
        "text" => "Send reset"
      ])@endcomponent


    </form>
  </div>
</section>

@endsection
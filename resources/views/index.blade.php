@extends('layouts.redesign')

@section('content')


  <section class="bg-blue">
    <div class="container device-wrapper show-gt-tablet-portrait">
        <img src="/SVG/devices.png" class="device-img" alt="">
    </div>
    <div class="container text-white">
      <h1 class="col-tablet-portrait-7 text-shadow">An IOS Modding Hub</h1>
      <p class="col-tablet-portrait-7 mb-5">Our goal is to introduce people to the sideload and jailbreak IOS communities. We offer tools to get started, links you should visit, and hundreds of popular apps ready for download.</p>
      <a href="/login" class="btn btn-red">Login</a>
      <a href="/register" class="btn btn-white text-dark">Signup</a>
    </div>
    <canvas id="waves" class="bg-blue"></canvas>
  </section>

  <section>
    <div class="container">
      <h2 class="text-shadow">About IOS Haven</h2>
      <p>IOS Haven started in 2017 by two college students that saw a problem not being addressed in the IOS community. Lack of knowledge made it challenge for average users to modify their phones. However, over the years knowledge has improved and we want to share that information with you. </p>
      <p>Our goal is to make it easy to access tools/apps not available to stock iPhones. We want to make the information publically available to everyone that wants to use their iPhone to the fullest. </p>
      <p>We are not the same as other websites in the community. We do not require you to download anything or make accounts. Everyhting is available on any platform. We designed this website with the you in mind.</p>
    </div>
  </section>

  <section>
    <div class="container">
      <h2 class="text-shadow">New Redesign</h2>
      <p>We are slowly trying to redesign IOS Haven. However, both of us are in college so we do not have as much time to work on the website anymore. If you encounter any issues please contact us via twitter and we will try to fix it as soon as possible.</p>
    </div>
  </section>

@endsection

@section('footer')
<script
src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
integrity="sha256-3edrmyuQ0w65f8gfBsqowzjJe2iM6n0nKciPUp8y+7E="
crossorigin="anonymous"></script>
<script src="/js/waves.js"></script>

@endsection
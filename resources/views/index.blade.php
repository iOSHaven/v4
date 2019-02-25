@extends('layouts.main')

@section('content')
<nav class="fixed bg-blue text-white">
    <!-- <div id="read-progress"></div> -->
    <div class="container">
      <div class="row">
        <div class="col flex-lc brand text-shadow display">
          <a href="#">IOS Haven</a>
        </div>
        <div class="col flex-cc show-gt-tablet-portrait">
          <a href="/apps" class="text-shadow">Apps</a>
          <!-- <a href="/games" class="text-shadow">Games</a> -->
          <a href="/updates" class="text-shadow">Updates</a>
          <a href="#" class="text-shadow">More</a>
        </div>
        <div class="col flex-rc">
          <a href="https://discord.gg/mTbwMyQ"><i class="fab fa-discord"></i></a>
          <a href="https://www.reddit.com/r/iOSHaven/"><i class="fab fa-reddit"></i></a>
          <a href="https://twitter.com/ioshavenco"><i class="fab fa-twitter"></i></a>
          <label for="navcheck" class="show-lt-tablet-landscape"><i class="far fa-bars fa-large"></i></label>
        </div>
      </div>
    </div>
    <input type="checkbox" id="navcheck">
    <div class="dropnav">
      <a href="/apps" class="text-shadow">Apps</a>
      <!-- <a href="/games" class="text-shadow">Games</a> -->
      <a href="/updates" class="text-shadow">Updates</a>
      <a href="#" class="text-shadow">More</a>
    </div>
  </nav>

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
<script src="/js/main.js"></script>
@endsection
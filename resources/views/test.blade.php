<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans:900i,700|Martel:400,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Merriweather:900i|Amiko:400|Montserrat:600|Lora:400" rel="stylesheet" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.7.2/css/all.css?v=0.1" integrity="sha384-6jHF7Z3XI3fF4XZixAuSu0gGKrXwoX/w3uFPxC56OtjChio7wtTGJWRW53Nhx6Ev" crossorigin="anonymous">
    <link href="/css/normalize.css" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">
  </head>
  <body>


    <nav class="fixed bg-blue text-white">
        <!-- <div id="read-progress"></div> -->
        <div class="container">
          <div class="row">
            <div class="col flex-lc brand text-shadow display">
              <a href="#">IOS Haven</a>
            </div>
            <div class="col flex-cc show-gt-tablet-portrait">
              <a href="#" class="text-shadow">Apps</a>
              <a href="#" class="text-shadow">Games</a>
              <a href="#" class="text-shadow">Updates</a>
              <a href="#" class="text-shadow">More</a>
            </div>
            <div class="col flex-rc">
              <a href="#"><i class="fab fa-discord"></i></a>
              <a href="#"><i class="fab fa-reddit"></i></a>
              <a href="#"><i class="fab fa-twitter"></i></a>
              <label for="navcheck" class="show-lt-tablet-landscape"><i class="far fa-bars fa-large"></i></label>
            </div>
          </div>
        </div>
        <input type="checkbox" id="navcheck">
        <div class="dropnav">
            <a href="#" class="text-shadow">Apps</a>
            <a href="#" class="text-shadow">Games</a>
            <a href="#" class="text-shadow">Updates</a>
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
          <button class="btn btn-red">Download</button>
          <button class="btn btn-white text-dark">Launch</button>
        </div>
        <canvas id="waves" class="bg-blue"></canvas>
      </section>

      <section>
        <div class="container">
          <h2 class="text-shadow">About IOS Haven</h2>
          <p>IOS Haven started in 2017 by two college students that saw a problem not being addressed in the IOS community. Lack of knowledge made it challenge for average users to modify their phones. However, over the years knowledge has improved and we want to share that information with you. </p>
          <p>Our goal is to make it easy to access tools/apps not available to stock iPhones. We want to make the information publically available to everyone that wants to use their iPhone to the fullest. </p>
          <p>We are not the same as other websites in the community. We do not require you to download anything or make accounts. Everyhting is available on any platform. We designed this website with the you in mind.</p>
          <!-- <p>Eventually our mission will expand to give back to community. We want to create features that would let you keep up </p> -->
          <!-- <p>Everything on this website is free. We will never make you pay or download other programs to get what you want.</p> -->
          <!-- <p>Learning how to modify your phone can be difficult, esseacially if you are not familiar with computers. We want to fix that problem. Our tutorials cover </p> -->
        </div>
      </section>

      <script
      src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha256-3edrmyuQ0w65f8gfBsqowzjJe2iM6n0nKciPUp8y+7E="
      crossorigin="anonymous"></script>
      <script src="/js/waves.js"></script>
      <!-- <script src="./resources/assets/js/query.js"></script> -->
      <script src="/js/main.js"></script>

  </body>
</html>

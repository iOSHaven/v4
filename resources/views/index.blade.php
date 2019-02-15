@extends('layouts.main')

@section('content')
  <nav class="fixed bg-blue text-white">
    <div class="container">
      <div class="row">
        <div class="col text-left brand">
          <a href="#">IOS Haven</a>
        </div>
        <div class="col text-center">
          <a href="#">Apps</a>
          <a href="#">Games</a>
          <a href="#">Updates</a>
          <a href="#">More</a>
        </div>
        <div class="col text-right">
          <a href="#"><i class="fab fa-discord"></i></a>
          <a href="#"><i class="fab fa-reddit"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
        </div>
      </div>
    </div>
  </nav>

  <section class="bg-blue">
    <div class="container text-white">
      <h1>The way IOS was meant to be</h1>
      <button class="btn btn-red">Download</button>
      <button class="btn btn-white text-dark">Launch</button>
    </div>
  </section>



@endsection

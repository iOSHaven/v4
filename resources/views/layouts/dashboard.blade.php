@extends('layouts.redesign')
<?php $page = $page ?? "" ?>

@section("images")
_image_("/avatar/{{ Auth::user()->username }}")
@endsection

@section('content')

<form action="{{ route('logout') }}" method="POST" id="logout-form">
  {{ csrf_field() }}
</form>



<section>
    <div class="container">
      <div class="row">
          <div class="col-tablet-portrait-3 px-3">
            <div class="bg-white show-gt-tablet-portrait">
                <img class="d-block b-1 b-light" width="80" height="80" src="/avatar/{{ Auth::user()->username }}" alt="" >
                <br>
                <strong>{{ Auth::user()->username }}</strong>
                <br>
                <span>@admin Admin @else Member @endadmin</span>
                {{-- <div class="my-3">
                    <span class="fa-stack fa-1x">
                      <i class="fas fa-hexagon fa-stack-2x fa-rotate-90"></i>
                      <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                    </span>
                    <span class="fa-stack fa-1x">
                      <i class="fas fa-hexagon fa-stack-2x fa-rotate-90"></i>
                      <i class="fab fa-discord fa-stack-1x fa-inverse"></i>
                    </span>
                </div> --}}
                {{-- <hr class="my-4 border-thin-light"> --}}
                <ul class="nav-vert">
                  <li class="{{$page == 'Settings' ? 'bl-3 b-blue pl-3' : ''}}">
                    <a href="/user/settings">Settings</a>
                  </li>
                  <li class="{{$page == 'Notifications' ? 'bl-3 b-blue pl-3' : ''}}">
                    <a href="/user/notifications">Notifications</a>
                  </li>
                  <li class="{{$page == 'Badges' ? 'bl-3 b-blue pl-3' : ''}}">
                    <a href="/user/badges">Badges</a>
                  </li>
                  <li class="{{$page == 'Password' ? 'bl-3 b-blue pl-3' : ''}}">
                    <a href="/user/password">Password</a>
                  </li>
                  <li class="">
                    <a href="#" class="text-red" onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">Logout</a>
                  </li>
                </ul>
            </div>

            <div class="bg-white show-lt-tablet-portrait flex-lt">
              <div class="mr-3">
                  <img class="d-block b-1 b-light" width="80" height="80" src="/avatar/{{ Auth::user()->username }}" alt="" >
                  <br>
                  <strong>{{ Auth::user()->username }}</strong>
                  <br>
                  <span>@admin Admin @else Member @endadmin</span>
              </div>
            
                
                {{-- <div class="my-3">
                    <span class="fa-stack fa-1x">
                      <i class="fas fa-hexagon fa-stack-2x fa-rotate-90"></i>
                      <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                    </span>
                    <span class="fa-stack fa-1x">
                      <i class="fas fa-hexagon fa-stack-2x fa-rotate-90"></i>
                      <i class="fab fa-discord fa-stack-1x fa-inverse"></i>
                    </span>
                </div> --}}
                {{-- <hr class="my-4 border-thin-light"> --}}
                <ul class="nav-vert col-9 m-0">
                  <li class="{{$page == 'Settings' ? 'bl-3 b-blue pl-3' : ''}}">
                    <a href="/user/settings">Settings</a>
                  </li>
                  <li class="{{$page == 'Notifications' ? 'bl-3 b-blue pl-3' : ''}}">
                    <a href="/user/notifications">Notifications</a>
                  </li>
                  <li class="{{$page == 'Badges' ? 'bl-3 b-blue pl-3' : ''}}">
                    <a href="/user/badges">Badges</a>
                  </li>
                  <li class="{{$page == 'Password' ? 'bl-3 b-blue pl-3' : ''}}">
                    <a href="/user/password">Password</a>
                  </li>
                  <li class="">
                    <a href="#" class="text-red" onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">Logout</a>
                  </li>
                </ul>
            </div>
          </div>
          <div class="col-tablet-portrait-9">
              <div class="p-3 bg-white">
                <h6 class="m-0">{{ $page }}</h6>
                @yield("content")
              </div>
          </div>
      </div>
      
    </div>
  </section>



@overwrite

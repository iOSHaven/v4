<?php /*<nav class="fixed bg-blue text-white"> 
    <!-- <div id="read-progress"></div> -->
    <div class="container">
      <div class="row">
        <div class="col flex-lc">
          <a href="/" class="display brand">IOS Haven</a>
        </div>
        <ul class="navlinks show-gt-tablet-portrait m-0">
          <li><a href="/apps" style="display: flex">Apps</a></li>
          <li><a href="/apps?q=game" style="display: flex">Games</a></li>
          <li><a href="/updates" style="display: flex">Updates</a></li>
          <li><a href="/contact/index" style="display: flex">Contact</a></li>
        </ul>
        <div class="col flex-rc">
          <a href="https://discord.gg/mTbwMyQ" style="width: 45px">
            <i class="fab fa-discord"></i>
          </a>
          <a href="https://www.reddit.com/r/iOSHaven/" style="width: 45px">
            <i class="fab fa-reddit"></i>
          </a>
          <a href="https://twitter.com/ioshavenco" style="width: 45px">
            <i class="fab fa-twitter"></i>
          </a>
          @if(Auth::guest())
            <a href="/login" class="show-gt-tablet-portrait" style="width: 45px">
              <i class="far fa-sign-in"></i>
            </a>
          @else
            <a href="/user/settings" class="show-gt-tablet-portrait" style="width: 45px">
              <img src="/avatar/{{ Auth::user()->username }}/25" alt="">
            </a>
          @endif
          <label for="navmenu" class="show-lt-tablet-landscape parent ml-3" style="width: 45px">
            <i class="far fa-bars fa-lg"></i>
            <input type="checkbox" class="navcheck" id="navmenu">
            <div class="dropnav dropnav-small">
              @if(Auth::guest())
                <a href="/login" class="d-block">Sign In</a>
              @else
                <a href="/user/settings" class="flex-cc">
                  <img src="/avatar/asdfasf/25" alt="">
                  <span>Profile</span>
                </a>
              @endif
              <a href="/apps" class="d-block">Apps</a>
              <a href="/apps?q=game" class="d-block">Games</a>
              <a href="/updates" class="d-block">Updates</a>
              <a href="/contact/index" class="d-block">Contact</a>
              {{-- <a href="/aboutUs" class="d-block">About Us!</a>
              <a href="/credits" class="d-block">Credits</a>
              <a href="/cydia" class="d-block">Cydia Impactor</a>
              <a href="/apps?q=jailbreak" class="d-block">Jailbreaks</a>
              <a href="/betas" class="d-block">Betas</a>
              <a href="/fight-for-net-neutrality" class="d-block">Net Neutrality</a> --}}
            </div>
          </label>
        </div>
      </div>
    </div>

  </nav>
  */
  ?>



  <nav class="md:hidden flex items-center justify-between fixed w-full bg-blue-500 left-0 top-0 py-1 px-2 border-b z-1 {{ theme('bg-white', 'border-gray-200', 'text-gray-600') }}">
      <a href="#" class="text-center mx-2">
        <i class="fas fa-lg fa-user-circle"></i>
      </a>
      <h1 class="absolute top-0 left-0 right-0 bottom-0 flex items-center justify-center -z-1">IOS Haven</h1>
      <a href="#" class="text-center mx-2">
        <i class="far fa-lg fa-ellipsis-v"></i>
      </a>
  </nav>

  <nav class="fixed w-full left-0 bottom-0 md:bottom-auto md:top-0 flex items-center justify-between px-2 border-t md:border-b {{ theme('bg-white', 'border-gray-200', 'text-gray-600') }}">
    <h1 class="hidden md:block">IOS Haven</h1>
    <div class="flex items-center justify-between md:justify-center flex-grow px-5 text-white">
        <a href="#" class="text-center p-2 md:p-0">
          <i class="md:hidden fas fa-lg fa-layer-group"></i>
          <div class="md:hidden text-sm leading-none"><small>Apps</small></div>
          <div class="hidden md:inline-block p-2">Apps</div>
        </a>
        <a href="#" class="text-center p-2 md:p-0">
          <i class="md:hidden fas fa-lg fa-rocket"></i>
          <div class="md:hidden text-sm leading-none"><small>Games</small></div>
          <div class="hidden md:inline-block p-2">Games</div>
        </a>
        <a href="#" class="text-center p-2 md:p-0">
          <i class="md:hidden fas fa-lg fa-bell"></i>
          <div class="md:hidden text-sm leading-none"><small>Updates</small></div>
          <div class="hidden md:inline-block p-2">Updates</div>
        </a>
        <a href="#" class="text-center p-2 md:p-0">
          <i class="md:hidden fas fa-lg fa-search"></i>
          <div class="md:hidden text-sm leading-none"><small>Search</small></div>
          <div class="hidden md:inline-block p-2">Search</div>
        </a>
    </div>
    <div class="hidden md:flex items-center justify-between md:justify-end text-white">
        <a href="#" class="text-center p-2">
          <i class="fab fa-lg fa-discord"></i>
        </a>
        <a href="#" class="text-center p-2">
          <i class="fab fa-lg fa-twitter"></i>
        </a>
        <a href="#" class="text-center p-2">
          <i class="fab fa-lg fa-reddit"></i>
        </a>
        <a href="#" class="text-center p-2">
          <i class="fas fa-lg fa-sign-in"></i>
        </a>
    </div>
  </nav>


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



  <nav class="md:hidden flex items-center justify-between absolute w-full bg-blue-500 left-0 top-0 py-1 px-2 border-b z-2 {{ theme('bg-white', 'border-gray-200', 'text-gray-600') }}">
      
    @if(Auth::check())
      <label for="check-sidebar-left" class="text-center mx-2">
        <i class="fas fa-lg fa-user-circle"></i>
      </label>
    @else  
      <a href="/login" class="text-center mx-2">
        <i class="fas fa-lg fa-user-circle"></i>
      </a>
    @endif
      <h1 class="absolute top-0 left-0 right-0 bottom-0 flex items-center justify-center -z-1">IOS Haven2</h1>
      <label for="check-sidebar-right" class="text-center mx-2">
        <i class="far fa-lg fa-ellipsis-v"></i>
      </label>
  </nav>

  <nav class="absolute w-full left-0 bottom-0 md:bottom-auto md:top-0 flex items-center justify-between px-2 border-t md:border-b z-2 {{ theme('bg-white', 'border-gray-200', 'text-gray-600') }}">
    <h1 class="hidden md:block">IOS Haven</h1>
    <div class="flex items-center justify-between md:justify-center flex-grow px-5 text-white">
        <a href="/apps" class="text-center px-2 pb-2 py-1 md:p-0 {{ tab('apps') }}">
          <i class="md:hidden fas fa-layer-group"></i>
          <div class="md:hidden text-xs leading-none"><small>Apps</small></div>
          <div class="hidden md:inline-block p-2 -mt-px">Apps</div>
        </a>
        <a href="/games" class="text-center px-2 pb-2 py-1 md:p-0 {{ tab('games') }}">
          <i class="md:hidden fas fa-rocket"></i>
          <div class="md:hidden text-xs leading-none"><small>Games</small></div>
          <div class="hidden md:inline-block p-2 -mt-px">Games</div>
        </a>
        <a href="/updates" class="text-center px-2 pb-2 py-1 md:p-0 {{ tab('updates') }}">
          <i class="md:hidden fas fa-bell"></i>
          <div class="md:hidden text-xs leading-none"><small>Updates</small></div>
          <div class="hidden md:inline-block p-2 -mt-px">Updates</div>
        </a>
        <a href="/search" class="text-center px-2 pb-2 py-1 md:p-0 {{ tab('search') }}">
          <i class="md:hidden fas fa-search"></i>
          <div class="md:hidden text-xs leading-none"><small>Search</small></div>
          <div class="hidden md:inline-block p-2 -mt-px">Search</div>
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


<nav class="fixed bg-blue text-white">
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
            <a href="/profile" class="show-gt-tablet-portrait" style="width: 45px">
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
                <a href="/profile" class="flex-cc">
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
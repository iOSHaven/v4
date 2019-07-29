<nav class="fixed bg-blue text-white">
    <!-- <div id="read-progress"></div> -->
    <div class="container">
      <div class="row">
        <div class="col flex-lc">
          <a href="/" class="display brand">IOS Haven</a>
        </div>
        <ul class="navlinks show-gt-tablet-portrait">
          <li><a href="/apps" class="">Apps</a></li>
          <li><a href="/apps?q=game" class="">Games</a></li>
          <li><a href="/updates" class="">Updates</a></li>
          {{-- <li><a href="/contact" class="">Contact</a></li> --}}
          <li class="flyout">
            <a href="#" class="">More</a>
            <ul class="flyout-content navlinks stacked">
              <li><a href="/aboutUs" class="d-block">About Us!</a></li>
              <li><a href="/credits" class="d-block">Credits</a></li>
              <li><a href="/cydia" class="d-block">Cydia Impactor</a></li>
              <li><a href="/apps?q=jailbreak" class="d-block">Jailbreaks</a></li>
              <li><a href="/betas" class="d-block">Betas</a></li>
              <li><a href="/fight-for-net-neutrality" class="d-block">Net Neutrality</a></li>
            </ul>
          </li>
        </ul>
        <!-- <div class="col flex-cc show-gt-tablet-portrait">
          <a href="/apps" class="">Apps</a>
          <a href="/apps?q=game" class="">Games</a>
          <a href="/updates" class="">Updates</a>
          <label for="navmore" class=" parent">More
            <input type="checkbox" class="navcheck" id="navmore">
            <div class="dropnav dropnav-big">
            <a href="/aboutUs" class="d-block">About Us!</a>
            <a href="/credits" class="d-block">Credits</a>
            <a href="/cydia" class="d-block">Cydia Impactor</a>
            <a href="/apps?q=jailbreak" class="d-block">Jailbreaks</a>
            <a href="/betas" class="d-block">Betas</a>
            <a href="/fight-for-net-neutrality" class="d-block">Net Neutrality</a>
            </div>
          </label>

        </div> -->
        <div class="col flex-rc">
          <a href="https://discord.gg/mTbwMyQ"><i class="fab fa-discord"></i></a>
          <a href="https://www.reddit.com/r/iOSHaven/"><i class="fab fa-reddit"></i></a>
          <a href="https://twitter.com/ioshavenco"><i class="fab fa-twitter"></i></a>
          @if(Auth::guest())
            <a href="/login" class="show-gt-tablet-portrait"><i class="far fa-sign-in"></i></a>
          @else
            <a href="/profile" class="show-gt-tablet-portrait"><i class="far fa-user"></i></a>
          @endif
          <label for="navmenu" class="show-lt-tablet-landscape parent ml-3"><i class="far fa-bars fa-large"></i>
            <input type="checkbox" class="navcheck" id="navmenu">
            <div class="dropnav dropnav-small">
              @if(Auth::guest())
                <a href="/login" class="d-block">Sign In</a>
              @else
                <a href="/profile" class="d-block">Profile</a>
              @endif
              <a href="/apps" class="d-block">Apps</a>
              <a href="/apps?q=game" class="d-block">Games</a>
              <a href="/updates" class="d-block">Updates</a>
              {{-- <a href="/contact" class="d-block">Contact</a> --}}
              <a href="/aboutUs" class="d-block">About Us!</a>
              <a href="/credits" class="d-block">Credits</a>
              <a href="/cydia" class="d-block">Cydia Impactor</a>
              <a href="/apps?q=jailbreak" class="d-block">Jailbreaks</a>
              <a href="/betas" class="d-block">Betas</a>
              <a href="/fight-for-net-neutrality" class="d-block">Net Neutrality</a>
            </div>
          </label>
        </div>
      </div>
    </div>

  </nav>
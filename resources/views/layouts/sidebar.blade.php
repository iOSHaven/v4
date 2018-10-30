<!-- <sidebar color="#F44336" nav-color="{{ Session::get('color') }}" is-admin="{{Auth::check() && Auth::user()->isAdmin}}"
          title="{{ Request::is('/') ? config('app.name', 'Laravel') : 'Back' }}">
  <a href="/profile" slot="links" class="mr-5">
    @if(Auth::check())
    <square-button icon="fas fa-user" class="fill--white dark"/>
    @else
    <square-button icon="fas fa-sign-in" class="fill--white dark"/>
    @endif

  </a>
   <a href="/auth" slot="links"><i class="fas fa-user"></i></a>
  <div slot="content" class="hide-on-server-render">
    <a href="/" class="item"><i class="fas fa-home"></i>Home</a>
    <a href="/apps" class="item"><i class="fab fa-app-store"></i>Apps</a>
    <a href="/jailbreak" class="item"><i class="fas fa-user-secret"></i>Jailbreaks</a>
    <a href="/betas" class="item"><i class="fas fa-flask"></i>Betas</a>
    <a href="/cydia" class="item"><i class="fas fa-wrench"></i>Cydia Impactor</a>
    <a href="/faq" class="item"><i class="fas fa-question"></i>FAQ</a>
    <a href="#footer" class="item" @click="toggleSidebar"><i class="fas fa-link"></i>More links</a>
  </div>
</sidebar> -->

<nav class="navbar is-black is-fixed-top" role="navigation" aria-label="main navigation" style="background-color: {{ Session::get('color') }}">
  <div class="navbar-brand">
    <button role="button" class="navbar-burger burger noturl" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample" style="background: transparent">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </button>
  </div>

  <div id="navbarBasicExample" class="navbar-menu">
    <div class="navbar-start">
      <a class="navbar-item" href="/">
        Home
      </a>

      <a class="navbar-item" href="/apps">
        Apps
      </a>

      <a class="navbar-item" href="/updates">
        Updates
      </a>

      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link noturl" href="#">
          More
        </a>

        <div class="navbar-dropdown">
          <a class="navbar-item" href="/credits">
            Credits
          </a>
          <a class="navbar-item" href="https://www.patreon.com/ioshaven" target="_blank">
            Patreon
          </a>
          <a class="navbar-item" href="cydia">
            Cydia Impactor
          </a>
          <a class="navbar-item" href="/jailbreak">
            Jailbreaks
          </a>
          <a class="navbar-item" href="/betas">
            Betas
          </a>
          <a class="navbar-item" href="#footer">
            Even More
          </a>
        </div>
      </div>
    </div>

    <div class="navbar-end">
      <div class="navbar-item">
        <div class="buttons">

          @if(Auth::guest())
          <a class="button has-background-black has-text-white" href="/register" style="background-color: {{ Session::get('color') }} !important">
            <strong>Sign up</strong>
          </a>
          <a class="button is-light" href="/login">
            Log in
          </a>
          @else
          <a class="button is-light" href="/profile">
            Profile
          </a>
          @endif

        </div>
      </div>
    </div>
  </div>
</nav>

<sidebar color="#F44336" is-admin="{{Auth::check() && Auth::user()->isAdmin}}" title="{{ config('app.name', 'Laravel') }}">
  <a href="/profile" slot="links" class="mr-5">
    @if(Auth::check())
    <square-button icon="fas fa-user" class="fill--white dark"/>
    @else
    <square-button icon="fas fa-sign-in" class="fill--white dark"/>
    @endif

  </a>
  <!-- <a href="/auth" slot="links"><i class="fas fa-user"></i></a> -->
  <div slot="content">
    <a href="/apps" class="item"><i class="fab fa-app-store"></i>Apps</a>
    <a href="/jailbreak" class="item"><i class="fas fa-user-secret"></i>Jailbreaks</a>
    <a href="/betas" class="item"><i class="fas fa-flask"></i>Betas</a>
    <a href="/cydia" class="item"><i class="fas fa-wrench"></i>Cydia Impactor</a>
    <a href="/credits" class="item"><i class="fas fa-code"></i>Credits</a>
    <a href="#footer" class="item"><i class="fas fa-eye"></i>View More</a>
  </div>
</sidebar>

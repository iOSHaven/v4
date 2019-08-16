  <nav id="nav-top-phone"
    class="prevent-touchmove md:hidden flex items-center justify-between fixed w-full bg-blue-500 left-0 top-0 py-1 px-2 border-b z-2 {{ theme('bg-white', 'border-gray-200', 'text-gray-600') }}">

    @if(Auth::check())
    <label for="check-sidebar-left" class="text-center mx-2 scroll-toggler">
      <i class="fas fa-lg fa-user-circle"></i>
    </label>
    @else
    <a href="/login" class="text-center mx-2">
      <i class="fas fa-lg fa-user-circle"></i>
    </a>
    @endif
    <h1 class="absolute top-0 left-0 right-0 bottom-0 flex items-center justify-center -z-1">{{ $title ?? session("current_tab") ?? "IOS Haven" }}</h1>
    <label for="check-sidebar-right" class="text-center mx-2 scroll-toggler">
      <i class="far fa-lg fa-ellipsis-v"></i>
    </label>
  </nav>

  <nav id="nav-top-desktop"
    class="prevent-touchmove fixed w-full left-0 bottom-0 md:bottom-auto md:top-0 flex items-center justify-between px-2 border-t md:border-b z-2 {{ theme('bg-white', 'border-gray-200', 'text-gray-600') }}">
    <h1 class="hidden md:block">IOS Haven</h1>
    <div class="flex items-center justify-between md:justify-center flex-grow px-5 text-white">
      <a href="/apps" class="text-center px-2 pb-2 py-1 md:p-0 {{ tab('Apps') }}">
        <i class="md:hidden fas fa-layer-group"></i>
        <div class="md:hidden text-xs leading-none"><small>Apps</small></div>
        <div class="hidden md:inline-block p-2 -mt-px">Apps</div>
      </a>
      <a href="/games" class="text-center px-2 pb-2 py-1 md:p-0 {{ tab('Games') }}">
        <i class="md:hidden fas fa-rocket"></i>
        <div class="md:hidden text-xs leading-none"><small>Games</small></div>
        <div class="hidden md:inline-block p-2 -mt-px">Games</div>
      </a>
      <a href="/updates" class="text-center px-2 pb-2 py-1 md:p-0 {{ tab('Updates') }}">
        <i class="md:hidden fas fa-bell"></i>
        <div class="md:hidden text-xs leading-none"><small>Updates</small></div>
        <div class="hidden md:inline-block p-2 -mt-px">Updates</div>
      </a>
      <a href="/search" class="text-center px-2 pb-2 py-1 md:p-0 {{ tab('Search') }}">
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
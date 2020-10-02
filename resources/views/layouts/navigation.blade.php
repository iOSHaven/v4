  <nav id="nav-top-phone"
    class="p-inset-top prevent-touchmove md:hidden fixed w-full left-0 top-0 border-b z-2 {{ theme('bg-white', 'border-gray-200', 'text-gray-600') }}">
    <div class="relative w-full py-1 px-3 flex items-center justify-between">
        <div class="absolute top-0 left-0 right-0 bottom-0 -z-1 {{ theme('bg-white') }}"></div>
        @if(Auth::check())
        <label for="check-sidebar-left" class="text-center mx-2 scroll-toggler">
          <img class="rounded-full border inline-block mx-auto {{ theme('border-gray-200') }}" width="24" src="https://api.adorable.io/avatars/10/{{ Auth::user()->username }}" alt="">
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
    </div>
  </nav>

  <nav id="nav-top-desktop"
    class="p-inset-bottom prevent-touchmove fixed w-full left-0 bottom-0 md:bottom-auto md:top-0 flex items-center justify-between px-2 border-t md:border-b z-2 {{ theme('bg-white', 'border-gray-200', 'text-gray-600') }}">
    <div class="flex items-center justify-between md:justify-start flex-grow px-3 text-white">
      <div class="hidden md:block">
          @if(Auth::check())
          <label for="check-sidebar-left" class="text-center px-2 scroll-toggler">
            <img class="rounded-full border inline-block mx-auto {{ theme('border-gray-200') }}" width="24" src="https://api.adorable.io/avatars/10/{{ Auth::user()->username }}" alt="">
          </label>
        @else
          <a href="/login" class="text-center px-2">
            <i class="fas fa-lg fa-user-circle"></i>
          </a>
        @endif
      </div>
      
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
      <a href="/updates" class="text-center px-2 pb-2 py-1 md:p-0 relative {{ tab('Updates') }}">
        <div class="relative">
          <i class="md:hidden fas fa-bell"></i>
          @if($hasUpdates)
            <div class="absolute top-0 right-0">
              <div class="px-1 text-xs rounded-full display-inline {{ theme('bg-red', 'text-white') }}">
                {{ $updateCount }}
              </div>
            </div>
          @endif
        </div>
        
        <div class="md:hidden text-xs leading-none"><small>Updates</small></div>
        
        <div class="hidden md:inline-block p-2 -mt-px">Updates</div>
      </a>
      <a href="/skins" class="text-center px-2 pb-2 py-1 md:p-0 {{ tab('Skins') }}">
        <i class="md:hidden fas fa-moon-stars"></i>
        <div class="md:hidden text-xs leading-none"><small>Skins</small></div>
        <div class="hidden md:inline-block p-2 -mt-px">Skins</div>
      </a>
      <a href="/search" class="text-center px-2 pb-2 py-1 md:p-0 {{ tab('Search') }}">
        <i class="md:hidden fas fa-search"></i>
        <div class="md:hidden text-xs leading-none"><small>Search</small></div>
        <div class="hidden md:inline-block p-2 -mt-px">Search</div>
      </a>
    </div>
    <h1 class="hidden md:flex absolute top-0 left-0 right-0 bottom-0 items-center justify-center -z-1">{{ $title ?? session("current_tab") ?? "IOS Haven" }}</h1>
    <div class="hidden md:flex items-center justify-between md:justify-end text-white">
        <label for="check-sidebar-right" class="text-center px-2 scroll-toggler">
          <i class="far fa-lg fa-ellipsis-v"></i>
        </label>
    </div>
  </nav>
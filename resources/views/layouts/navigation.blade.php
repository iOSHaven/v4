  <nav id="nav-top-phone"
    class="p-inset-top prevent-touchmove md:hidden fixed w-full left-0 top-0 border-b z-2 bg-white dark:bg-black border-gray-200 dark:border-gray-800 text-gray-600 dark:text-gray-300 ">
    <div class="relative w-full py-1 px-3 flex items-center justify-between">
        <div class="absolute top-0 left-0 right-0 bottom-0 -z-1 bg-white dark:bg-black"></div>
        @if(Auth::check())
        <label for="check-sidebar-left" class="text-center mx-2 scroll-toggler">
          <img class="rounded-full border inline-block mx-auto border-gray-200 dark:border-gray-800" width="24" src="{{ Auth::user()->gravatar }}" alt="">
        </label>
        @else
        <a href="/login" class="text-center mx-2">
          <i class="fas fa-lg fa-user-circle"></i>
        </a>
        @endif
        <h1 class="absolute top-0 left-0 right-0 bottom-0 flex items-center justify-center -z-1">{{ $title ?? session("current_tab") ?? "IOS Haven" }}</h1>
        <label for="check-sidebar-right" class="text-center mx-2 scroll-toggler">
          <i class="far fa-lg fa-bars"></i>
        </label>
    </div>
  </nav>

  <nav id="nav-top-desktop"
    class="p-inset-bottom prevent-touchmove fixed w-full left-0 bottom-0 md:bottom-auto md:top-0 flex items-center justify-between px-2 border-t md:border-b z-2 bg-white dark:bg-black border-gray-200 dark:border-gray-800 text-gray-600 dark:text-gray-300">
    <div class="flex items-center justify-between md:justify-start flex-grow px-3 text-black dark:text-white">
      <div class="hidden md:block">
          @if(Auth::check())
          <label for="check-sidebar-left" class="text-center px-2 scroll-toggler">
            <img class="rounded-full border inline-block mx-auto border-gray-200 dark:border-gray-800" width="24" src="{{ Auth::user()->gravatar }}" alt="">
          </label>
        @else
          <a href="/login" class="text-center px-2">
            <i class="fas fa-lg fa-user-circle"></i>
          </a>
        @endif
      </div>

        <a href="//blog.ioshaven.com" class="text-center px-2 pb-2 py-1 md:p-0 {{ tab('Blog') }}">
            <i class="md:hidden fas fa-book"></i>
            <div class="md:hidden text-xs leading-none"><small>Blog</small></div>
            <div class="hidden md:inline-block p-2 -mt-px">Blog</div>
        </a>
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
          @if(isset($hasUpdates))
            <div class="absolute top-0 right-0">
              <div class="px-1 text-xs rounded-full display-inline bg-red-500 text-white dark:text-black">
                {{ $updateCount }}
              </div>
            </div>
          @endif
        </div>
        
        <div class="md:hidden text-xs leading-none"><small>Updates</small></div>
        
        <div class="hidden md:inline-block p-2 -mt-px">Updates</div>
      </a>
{{--      <a href="/themes" class="text-center px-2 pb-2 py-1 md:p-0 {{ tab('Themes') }}">--}}
{{--        <i class="md:hidden fas fa-palette"></i>--}}
{{--        <div class="md:hidden text-xs leading-none"><small>Themes</small></div>--}}
{{--        <div class="hidden md:inline-block p-2 -mt-px">Themes</div>--}}
{{--      </a>--}}
      <a href="/search" class="text-center px-2 pb-2 py-1 md:p-0 {{ tab('Search') }}">
        <i class="md:hidden fas fa-search"></i>
        <div class="md:hidden text-xs leading-none"><small>Search</small></div>
        <div class="hidden md:inline-block p-2 -mt-px">Search</div>
      </a>
    </div>
    <h1 class="hidden md:flex absolute top-0 left-0 right-0 bottom-0 items-center justify-center -z-1">{{ $title ?? session("current_tab") ?? "IOS Haven" }}</h1>
    <div class="hidden md:flex items-center justify-between md:justify-end text-white">
        <label for="check-sidebar-right" class="text-center px-2 scroll-toggler">
          <i class="far fa-lg fa-bars"></i>
        </label>
    </div>
  </nav>
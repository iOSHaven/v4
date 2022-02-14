{{--<div class="relative">--}}
{{--  <div class="absolute top-0 left-0 right-0 bottom-0 flex items-center justify-center -z-1 bg-gray-100 dark:bg-gray-900">--}}
{{--    --}}
{{--  </div>--}}
  <!-- v4-footer -->
{{--  <ins class="adsbygoogle"--}}
{{--      style="display:block"--}}
{{--      data-ad-client="ca-pub-4649450952406116"--}}
{{--      data-ad-slot="6495367539"--}}
{{--      data-ad-format="auto"--}}
{{--      data-full-width-responsive="true"></ins>--}}

{{--</div>--}}



{{-- <section>--}}
{{--   <div class="container mb-0">--}}
{{--    <hr>--}}

{{--     <div class="text-center mt-5 w-100 mb-5">--}}
{{--       <div class="title mb-0">Check out our partners!</div>--}}
{{--       <p class="text-center mb-2">Then check out our partners.</p>--}}
{{--       <a href="https://builds.io?aid=1025548"><img src="/buildstorebanner.png" alt="partner link" class="m-auto"></a>--}}
{{--     </div>--}}
{{--     <div class="container">--}}
{{--      <div class="text-center m-0 text-2xl font-display">IOS Haven</div>--}}
{{--      <div class="text-center mx-auto my-3">--}}
{{--        <a href="https://twitter.com/ioshavenco" style="color: #1da1f2;"><i class="fab fa-twitter mx-2 fa-2x"></i></a>--}}
{{--        <a href="https://www.reddit.com/r/iOSHaven/" style="color: #ff4500;"><i class="fab fa-reddit mx-2 fa-2x"></i></a>--}}
{{--        <a href="https://discord.gg/mTbwMyQ" style="color: #7289da;"><i class="fab fa-discord mx-2 fa-2x"></i></a>--}}
{{--        <a href="https://github.com/iOSHaven" style="color: #6cc644;"><i class="fab fa-github mx-2 fa-2x"></i></a>--}}
{{--        <a href="https://www.patreon.com/ioshaven" style="color: #f96854;"><i class="fab fa-patreon mx-2 fa-2x"></i></a>--}}
{{--      </div>--}}

{{--      <div class="text-center">--}}
{{--        Made with <i class="fas fa-heart"></i>--}}
{{--        by <a href="https://twitter.com/_ZackBz">Zack</a> & <a href="https://twitter.com/wizardzeb">Zeb</a>--}}
{{--        <br>--}}
{{--        <i class="fal fa-copyright"></i> 2019. <strong>IOS Haven</strong>--}}
{{--      </div>--}}
{{--    </div>--}}
{{--     <div class="container">--}}
{{--      <div class="row">--}}
{{--        <div class="col-6">--}}
{{--          <!-- <div class="h6 text-shadow mb-3">Other Links</div> -->--}}
{{--          <a href="/aboutUs" class="d-block text-dark text-center">About Us!</a>--}}
{{--          <a href="/credits" class="d-block text-dark text-center">Credits</a>--}}
{{--          <!-- <a href="https://www.patreon.com/ioshaven" class="d-block"><i class="fab fa-patreon mr-5"></i>Patreon</a> -->--}}
{{--          <a href="/cydia" class="d-block text-dark text-center">Cydia Impactor</a>--}}

{{--        </div>--}}
{{--        <div class="col-tablet-portrait-6 text-center">--}}
{{--          <a href="https://twitter.com/ioshavenco" class="text-dark"><i class="fab fa-twitter mx-2 fa-2x"></i></a>--}}
{{--          <a href="https://www.reddit.com/r/iOSHaven/" class="text-dark"><i class="fab fa-reddit mx-2 fa-2x"></i></a>--}}
{{--          <a href="https://discord.gg/mTbwMyQ" class="text-dark"><i class="fab fa-discord mx-2 fa-2x"></i></a>--}}
{{--          <a href="https://github.com/iOSHaven" class="text-dark"><i class="fab fa-github mx-2 fa-2x"></i></a>--}}
{{--          <a href="https://www.patreon.com/ioshaven" class="text-dark"><i class="fab fa-patreon mx-2 fa-2x"></i></a>--}}
{{--        </div>--}}
{{--        <div class="col-6">--}}
{{--          <a href="/apps?q=jailbreak" class="d-block text-dark text-center">Jailbreaks</a>--}}
{{--          <a href="/betas" class="d-block text-dark text-center">Betas</a>--}}
{{--          <a href="/fight-for-net-neutrality" class="d-block text-dark text-center">Net Neutrality</a>--}}
{{--        </div>--}}
{{--      </div>--}}
{{--    </div>--}}

{{--   </div>--}}
{{-- </section>--}}

<footer class="text-center my-8 select-none grid gap-4 grid-cols-1 justify-center font-mono sm:text-sm text-xs">
    <hr class="mx-auto w-16 border-stone-300 dark:border-slate-700">

    <div>
        <div>Powered by <i class="fas fa-heart text-red-500"></i> from the community.</div>
        <div class="mt-2">Technology:</div>
        <div>
            <a class="text-red-500 underline" href="https://laravel.com">Laravel</a>
            | <a class="text-blue-500 underline" href="https://tailwindcss.com">TailwindCSS</a>
            | <a class="text-emerald-500 underline" href="https://vuejs.org">Vue.js</a>
        </div>
    </div>

    <p>
        <a href="https://ioshaven.com" class="hover:underline">iOS Haven</a>
        <span>&copy; {{now()->year}} </span>
    </p>

    <hr class="mx-auto w-16 border-stone-300 dark:border-slate-700">

    <form action="/locale" method="post">
        @csrf
        <div class="dropdown dropdown-focus inline-block relative mx-auto w-60">
            <button type="button" class="bg-gray-300 dark:bg-gray-700 text-gray-700 dark:text-gray-300 w-full py-2 px-4 rounded relative">
                <span class="mr-1">Locale: {{config('localization.supportedLocales')[app()->getLocale()]['native']}}</span>
                <div class="absolute right-0 inset-y-0 flex items-center pr-3">
                    <svg class="fill-current h-4 w-4 " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/> </svg>
                </div>
            </button>
            <ul class="dropdown-menu w-full absolute hidden text-gray-700 dark:text-gray-300 overflow-hidden rounded bg-gray-200 dark:bg-gray-800">
                @foreach(config('localization.supportedLocales') as $key => $value)
                <li class="">
                    <button type="submit" name="locale" value="{{$key}}" class="hover:bg-gray-300 dark:hover:bg-gray-900 py-2 px-4 block w-full">
                        {{$value['native']}}
                    </button>
                </li>
                @endforeach
            </ul>
        </div>
    </form>

    <div class="text-sm max-w-xs mx-auto">
        <a class="text-white underline py-2" href="#">Apps</a>
        <a class="text-white underline py-2" href="#">Games</a>
        <a class="text-white underline py-2" href="#">Updates</a>
        <a class="text-white underline py-2" href="#">Search</a>
        <a class="text-white underline py-2" href="#">Themes</a>
        <a class="text-white underline py-2" href="#">Shortcuts</a>
        <a class="text-white underline py-2" href="#">Jailbreaks</a>
        <a class="text-white underline py-2" href="#">Betas</a>
        <a class="text-white underline py-2" href="#">Tweak Pack</a>
        <a class="text-white underline py-2" href="#">About Us</a>
        <a class="text-white underline py-2" href="#">Credits</a>
        <a class="text-white underline py-2" href="#">Dashboard</a>
    </div>

    <div class="max-w-xs mx-auto p-3 flex items-center justify-between border-t border-gray-200 dark:border-gray-800">
        <a href="https://twitter.com/ioshavencom" style="color: #1da1f2;"><i class="fab fa-twitter mx-2 fa-2x"></i></a>
        <a href="https://www.reddit.com/r/iOSHaven/" style="color: #ff4500;"><i class="fab fa-reddit mx-2 fa-2x"></i></a>
        <a href="https://discord.gg/mTbwMyQ" style="color: #7289da;"><i class="fab fa-discord mx-2 fa-2x"></i></a>
        <a href="https://github.com/iOSHaven" style="color: #6cc644;"><i class="fab fa-github mx-2 fa-2x"></i></a>
        <a href="https://www.patreon.com/ioshaven" style="color: #f96854;"><i class="fab fa-patreon mx-2 fa-2x"></i></a>
    </div>
</footer>

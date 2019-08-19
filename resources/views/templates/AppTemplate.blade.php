@foreach($apps as $app)
    @component('components.applayout', $app->toArray())@endcomponent
    {{-- @if($loop->iteration == 7)
        <div class="relative">
        <div class="absolute top-0 left-0 right-0 bottom-0 flex items-center justify-center -z-1 {{ theme('bg-gray-100') }}">
            Please consider disabling ads.
        </div>
        <!-- v4-search-bottom -->
        <ins class="adsbygoogle"
                style="display:block"
                data-ad-client="ca-pub-4649450952406116"
                data-ad-slot="5262456899"
                data-ad-format="auto"
                data-full-width-responsive="true"></ins>
        </div>
    @endif --}}

@endforeach
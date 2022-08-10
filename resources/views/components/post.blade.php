<div class="grid-item p-3 relative w-full lg:w-1/3 md:w-1/2 ">
    <div class="relative rounded-lg overflow-hidden shadow-sm shadow-orange-600/20 dark:shadow-black/40 bg-stone-100 dark:bg-slate-800 hover:shadow-lg hover:shadow-orange-700/10 dark:hover:shadow-black/50">
        <a href="{{ $url }}" class="absolute inset-0 cursor-default"></a>
        <div class="relative pointer-events-none">
            <div class="aspect-w-gw aspect-h-gh">
                @if(!empty($image))
                    <img class="inset-0 bg-red-500 w-full object-cover"
                         srcset="{{ imageSrcSet($image) }}"
                         src="{{ imgix($image) }}"/>
                @endif
            </div>

            <div class="w-full p-3">
                <p class="text-2xl font-bold font-mono">{{ $title }}</p>
                <p>{{ Str::limit($subtitle ?? $description, 100, "...") }}</p>
                @if (isset($callToActionButton))
                    <a href="{{ $url }}" class="px-3 py-1 rounded-full bg-blue-500 text-white mt-2 inline-block text-xs pointer-events-auto hover:bg-blue-600">
                        <span class="uppercase">{{ $callToActionButton }}</span>
                        <i class="fas fa-chevron-right ml-1 text-xs"></i>
                    </a>
                @endif
                @if (isset($callToActionText))
                    <a href="{{ $url }}" class="text-white mt-2 inline-block text-xs hover:underline pointer-events-auto cursor-pointer">
                        <span class="uppercase">{{ $callToActionText }}</span>
                    </a>
                @endif
            </div>
        </div>

    </div>
</div>
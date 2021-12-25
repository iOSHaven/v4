<div class="grid-item p-3 relative w-full lg:w-1/3 md:w-1/2 ">
    <div class="relative rounded-lg overflow-hidden shadow-sm shadow-orange-600/20 dark:shadow-black/40 bg-stone-100 dark:bg-slate-800 hover:shadow-lg hover:shadow-orange-700/10 dark:hover:shadow-black/50">
        <a href="{{ $url }}" class="absolute inset-0 cursor-default"></a>
        <div class="pointer-events-none">
            <div class="aspect-w-gw aspect-h-gh">
                @if(!empty($image))
                    <img class="inset-0 bg-red-500 w-full object-cover"
                         srcset="{{ imageSrcSet($image) }}"
                         src="{{ imgix($image) }}"/>
                @endif
            </div>

            <div class="w-full p-3">
                <p class="text-2xl font-bold font-mono">{{ $title }}</p>
                <p>{{ $subtitle ?? $description }}</p>
            </div>
        </div>

    </div>
</div>
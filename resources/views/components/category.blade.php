<div class="px-1 w-1/2">
    <a href="{{ $link ?? "" }}" class="rounded-lg px-3 py-2 inline-block w-full text-white dark:text-black mt-3 shadow bg-{{$bg}}">
        <div class="flex items-center justify-between pb-3">
            <i class="{{ $icon }}"></i>
        </div>
        <div class="pt-4">
            {{ $title }}
        </div>
    </a>
</div>
<span class="inline relative rounded-full overflow-hidden {{ $class ?? 'mr-1' }}">
    <img class="rounded-full lazy-image" data-src="{{ $src ?? $provider?->avatar ?? 'defaults/icon.png' }}" alt="" width="{{ $size ?? '20' }}">
</span>
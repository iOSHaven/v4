<x-simple-button id="twitter-button" target="_blank" href="{{ $encodedUrl }}"  {{ $attributes->merge(['class' => 'bg-blue-500 text-white']) }}>
    <i class="fab fa-twitter mr-3 fa-lg"></i>
    <span class="uppercase">{{ $text }}</span>
</x-simple-button>
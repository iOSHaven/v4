@php
    $className = "flex items-center justify-center font-bold rounded py-2"
@endphp
@if(!isset($href))
    <button {{ $attributes->merge(['class' => $className]) }}>
        {{ $slot }}
    </button>
@else
    <a  {{ $attributes->merge(['class' => $className]) }}>
        {{ $slot }}
    </a>
@endif
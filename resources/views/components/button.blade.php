@if(theme() == "light")
<a href="{{ $href }}" class='flex items-center font-bold rounded-full text-{{ $size ?? "sm" }} px-5 py-1 {{ $class ?? "" }} {{ theme("bg-$bg", "text-$color") }}'>{{$slot}}</a>
@else
<a href="{{ $href }}" class='flex items-center font-bold rounded-full text-{{ $size ?? "sm" }} px-5 py-1 {{ $class ?? "" }} text-white-light {{ theme("bg-$bg") }}'>{{$slot}}</a>
@endif


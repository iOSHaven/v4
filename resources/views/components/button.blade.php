@if(theme() == "light")
<a href="{{ $href }}" class='flex items-center font-bold rounded-full pointer-events-auto shadow text-{{ $size ?? "sm" }} px-5 py-1 {{ $class ?? "" }} bg-{{$bg}} text-{{$color}}'>{{$slot}}</a>
@else
<a href="{{ $href }}" class='flex items-center font-bold rounded-full pointer-events-auto shadow text-{{ $size ?? "sm" }} px-5 py-1 {{ $class ?? "" }} text-{{$color}}  bg-{{$bg}}'>{{$slot}}</a>
@endif


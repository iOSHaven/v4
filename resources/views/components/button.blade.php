@if(theme() == "light")
<a href="{{ $href }}" class='font-bold rounded-full text-sm px-5 py-1 {{ theme("bg-$bg", "text-$color") }}'>{{$slot}}</a>
@else
<a href="{{ $href }}" class='font-bold rounded-full text-sm px-5 py-1 text-white-light {{ theme("bg-$bg") }}'>{{$slot}}</a>
@endif


<div class="relative">
  <a href="/app/{{ $uid }}" class="absolute top-0 left-0 right-0 bottom-0"></a>
  <div class="flex py-1 pointer-events-none">
      <img src="{{ $icon }}" width="77" height="77" style="height:77px; border-radius: 1.3rem">
      <div class="pl-5 w-full">
        <div class="{{ theme('text-black') }}">{{ $name }}</div>
        <div class="leading-none text-sm {{ theme('text-gray-500') }}">{{ $short }}</div>
        <div class="pt-4 pointer-events-auto z-1 relative">
            @if($unsigned)
              @component('components.button', ["href"=> "/download/$uid", "bg" => "gray-100", "color" => "blue"]) IPA @endcomponent
            @endif
            @if($signed)
              @component('components.button', ["href"=> "/install/$uid", "bg" => "blue", "color" => "white"]) GET @endcomponent
            @endif
            @if($isAdmin)
              @component('components.button', ["href"=> "/app/edit/$uid", "bg" => "red", "color" => "white"]) EDIT @endcomponent
            @endif
        </div>
        <hr class="w-full border-b-0 border-l-0 border-r-0 mt-3 {{ theme('border-gray-100') }}">
      </div>
  </div>
  
</div>

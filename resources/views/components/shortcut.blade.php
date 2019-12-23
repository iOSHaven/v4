<div class="relative">
  <a href="/shortcut/{{ $shortcut->itunes_id }}" class="absolute top-0 left-0 right-0 bottom-0"></a>
  <div class="flex py-1 pointer-events-none">
    <img src="{{ $shortcut->icon }}" width="77" height="77" style="height:77px; border-radius: 1.3rem">
    <div class="pl-5 w-full">
      <div class="{{ theme('text-black') }}">{{ $shortcut->name }}</div>
      {{-- <div class="leading-none text-sm {{ theme('text-gray-500') }}">{{ $app->short }}</div> --}}
      <div class="pt-4 pointer-events-auto z-1 relative">
        <div class="flex items-center flex-wrap -mt-2">
          @component('components.button', [
              "href"=> "/shortcut/install/$shortcut->itunes_id", 
              "bg" => "blue", 
              "color" => "white",
              "class" => "mt-2 mr-2"
              ])
                  GET 
          @endcomponent
          @admin
              @component('components.button', [
                  "href"=> "/nova/resources/shortcuts/$shortcut->id", 
                  "bg" => "red", 
                  "color" => "white",
                  "class" => "mt-2"
                  ])
                      EDIT 
              @endcomponent
          @endadmin
        </div>
      </div>
      <hr class="w-full border-b-0 border-l-0 border-r-0 mt-3 {{ theme('border-gray-100') }}">
    </div>
  </div>
</div>
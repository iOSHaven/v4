<div class="relative">
  <a href="/app/{{ $uid }}" class="absolute top-0 left-0 right-0 bottom-0"></a>
  <div class="flex py-1 pointer-events-none">
      <img src="{{ $icon }}" width="77" height="77" style="height:77px; border-radius: 1.3rem">
      <div class="pl-5 w-full">
        <div class="{{ theme('text-black') }}">{{ $name }}</div>
        <div class="leading-none text-sm {{ theme('text-gray-500') }}">{{ $short }}</div>
        <div class="flex items-center justify-start mt-1">
            @foreach ($mirrors as $mirror)
              @if(!$mirror['provider']['revoked'])
                <div class="relative rounded-full border border-gray-100-light overflow-hidden" style="margin-right: 2px">
                    <img class="rounded-full" src="https://avatars.io/twitter/{{ $mirror['provider']['twitter'] }}/20" alt="" width="20">
                </div>
              @endif
            @endforeach
        </div>
        <div class="pt-4 pointer-events-auto z-1 relative">
            @if($unsigned)
              @component('components.button', ["href"=> "/download/$uid", "bg" => "gray-100", "color" => "blue"]) IPA @endcomponent
            @endif
            @if(isset($mirrors[0]))
              @component('components.button', ["href"=> "/install/mirror/$uid/" . $mirrors[0]['provider_id'], "bg" => "blue", "color" => "white"])
              GET @endcomponent
            @elseif($signed)
              @component('components.button', ["href"=> "/install/$uid", "bg" => "blue", "color" => "white"])
              GET @endcomponent
            @endif
            @admin
              @component('components.button', ["href"=> "/app/edit/$uid", "bg" => "red", "color" => "white"]) EDIT @endcomponent
            @endadmin
        </div>
        <hr class="w-full border-b-0 border-l-0 border-r-0 mt-3 {{ theme('border-gray-100') }}">
      </div>
  </div>
  
</div>

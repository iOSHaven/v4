<div class="relative">
  <div class="flex items-center mb-3">
    <a href="/shortcut/{{ $shortcut->itunes_id }}" class="absolute top-0 left-0 right-0 bottom-0"></a>
    <div class="flex py-1 pointer-events-none flex-grow">
      <x-app-icon :src="$shortcut->icon"></x-app-icon>
      <div class="pl-5 w-full relative">
        <div class="text-black dark:text-white">{{ $shortcut->name }}</div>
        <div class="leading-none text-sm text-gray-500">{{ Str::limit($shortcut->description, 20) }}</div>
        <div class="pt-4 z-1 relative">
          <div class="flex items-center flex-wrap -mt-2">
            @component('components.button', [
                "href"=> "/shortcut/install/$shortcut->itunes_id", 
                "bg" => "blue-500",
                "color" => "white",
                "class" => "mt-2 mr-2"
                ])
                    GET 
            @endcomponent
            @admin
                @component('components.button', [
                    "href"=> "/nova/resources/shortcuts/$shortcut->id", 
                    "bg" => "red-500",
                    "color" => "white",
                    "class" => "mt-2"
                    ])
                        EDIT 
                @endcomponent
            @endadmin
          </div>
        </div>
        <hr class="left-0 right-0 border-b-0 border-l-0 border-r-0 mt-3 absolute border-gray-200 dark:border-gray-800">
      </div>
    </div>
    <div class="-ml-4">
      <i class="fal fa-chevron-right fa-2x text-gray-400 dark:text-gray-600"></i>
    </div>
  </div>
  
</div>
<div class="relative">
  <div class="flex items-center mb-3">

    <a href="{{ "/app/$app->uid" }}" class="absolute top-0 left-0 right-0 bottom-0"></a>
    <div class="flex py-1 pointer-events-none flex-grow">
      <x-app-icon :src="$app->icon"></x-app-icon>


      <div class="pl-5 w-full relative">
        <div class="text-black dark:text-white">{{ $app->name }}</div>
        <div class="leading-none text-sm text-gray-500">{{ $app->short }}</div>
        <div class="flex items-center justify-start mt-1">
          @foreach($app->providers as $provider)
            @component('components.tinyProviderIcon', ["provider" => $provider])@endcomponent
          @endforeach
        </div>
        <div class="pt-4 z-1 relative">
          @component('components.appButtons', ["app" => $app])@endcomponent
        </div>
        <hr class="left-0 right-0  border-b-0 border-l-0 border-r-0 mt-3 absolute border-gray-200 dark:border-gray-800">
      </div>
    </div>
    <div class="-ml-4">
      <i class="fal fa-chevron-right fa-2x text-gray-400 dark:text-gray-600"></i>
    </div>
  </div>
</div>
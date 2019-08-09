<div class="flex py-1">
  <img class="rounded-lg" src="{{ $image }}" width="77" height="77" style="height:77px">
  <div class="pl-5 w-full">
    <div>{{ $name }}</div>
    <div class="leading-none text-sm">{{ $short }}</div>
    <div class="pt-4">
      @component('components.button', ["download" => "GET", "downloadColor" => "blue", "href" => $install ])@endcomponent
      @component('components.button', ["download" => "IPA", "downloadColor" => "gray-300", "href" => $ipa ])@endcomponent
    </div>
    <hr class="w-full border-b-0 mt-3">
  </div>
</div>

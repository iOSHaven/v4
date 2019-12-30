@php
$type = strtoupper(class_basename($model));
$isIPA = $type == "IPA";
$href = ( $isIPA ? "/download" : "/install") . '/' . $model->id;
$title = ($isIPA ? "IPA" : "GET");
@endphp
@component('components.button', [
        "href"=> $href, 
        "bg" => $isIPA ? "white" : "blue", 
        "color" => $isIPA ? "blue" : "white",
        "class" => $class ?? "mr-2"])
        {{ $title }} 
        @if($image ?? true)
            @if($model->working)
                <i class="fas fa-check-circle ml-1"></i>
                {{-- @component('components.tinyProviderIcon', [
                    "provider" => $model->provider, 
                    "class" => "ml-1"])
                @endcomponent --}}
            @else
                <i class="fas fa-times-octagon ml-1"></i>
                {{-- @component('components.tinyProviderIcon', [
                    "src" => "/defaults/revoked.png", 
                    "class" => "ml-1"])
                @endcomponent --}}
            @endif
        @endif
@endcomponent
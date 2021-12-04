@foreach($apps as $model)
@if(class_basename($model) == 'App')
@component('components.applayout', ["app" => $model])@endcomponent
@else
@component('components.shortcut', ["shortcut" => $model])@endcomponent
@endif
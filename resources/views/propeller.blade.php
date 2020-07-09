
@php
$name = Route::currentRouteName();
if(!empty($name))
{
    $type = config('adLayout')[$name] ?? null;
}
@endphp

@if(!empty($type))
@include($type)
@endif
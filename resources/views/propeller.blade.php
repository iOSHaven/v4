
@php
$name = Route::currentRouteName();
if(!empty($name))
{
    $type = config('adLayout')[$name];
}
@endphp

@if(!empty($type))
@include($type)
@endif
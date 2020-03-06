@php
    request()->merge([
        "html" => "false"
    ]);

    $url = request()->url() . "?" . http_build_query(request()->all());
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="0; url={{ $url }}">
</head>
<body>
    @foreach($apps as $model)
        @if(class_basename($model) == 'App')
            @component('components.applayout', ["app" => $model])@endcomponent
        @else
            @component('components.shortcut', ["shortcut" => $model])@endcomponent
        @endif
    @endforeach
</body>
</html>


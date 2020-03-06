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
    @foreach($shortcuts as $shortcut)
        @component('components.shortcut', ["shortcut" => $shortcut])@endcomponent
    @endforeach
</body>
</html>


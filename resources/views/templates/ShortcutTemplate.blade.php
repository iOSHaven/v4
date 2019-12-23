@foreach($shortcuts as $shortcut)
    @component('components.shortcut', ["shortcut" => $shortcut])@endcomponent
@endforeach
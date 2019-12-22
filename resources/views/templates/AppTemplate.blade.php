@foreach($apps as $app)
    @component('components.applayout', ["app" => $app])@endcomponent
@endforeach
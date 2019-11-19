@foreach($apps as $app)
    @component('components.applayout', $app->toArray())@endcomponent
@endforeach
@extends('layouts.redesign', ["hide_footer" => true])
@section('content')

    @component('components.example', ["background" => "blue", "text" => "white"])
        <strong>Strong</strong> example
    @endcomponent

@endsection
@extends('layouts.redesign', ["title" => "Tutorial"])
@section('header')
    <link rel="stylesheet" href="{{ mix('/css/markdown.css') }}">
@endsection

@section('content')

<div id="read-progress"></div>
<div class="container markdown">
    {!! $html !!}
</div>

@endsection
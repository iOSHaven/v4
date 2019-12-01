@extends('layouts.redesign', ["title" => "Shortcuts", "hide_nav" => true, "hide_ads" => true])

@section('header')
    <link rel="stylesheet" href="{{ mix('/css/markdown.css') }}">
@endsection

@section('content')

@include('layouts.shortcuts')

@endsection

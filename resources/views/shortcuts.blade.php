@extends('layouts.redesign', ["title" => "Shortcuts"])

@section('header')
    <link rel="stylesheet" href="{{ mix('/css/markdown.css') }}">
@endsection

@section('content')

@include('layouts.shortcuts')

@endsection

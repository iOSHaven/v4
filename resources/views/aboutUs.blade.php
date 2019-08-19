@extends('layouts.redesign', ["title" => "About us"])

@section('header')
    <link rel="stylesheet" href="{{ mix('/css/markdown.css') }}">
@endsection

@section('content')

@include('layouts.about')

@endsection

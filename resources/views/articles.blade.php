@extends('layouts.redesign', ["title" => $pageTitle ?? null ])

@section('header')
{{-- <meta name="page" content="{{ $apps->currentPage() }}"> --}}
@endsection

@section('content')

<button class="share font-bold text-lg rounded-full text-sm px-10 py-3 {{ theme("bg-black", "text-white") }}">
Share</button>

@endsection

@section('footer')
<script src="{{ mix('/js/app.min.js') }}"></script>
@endsection

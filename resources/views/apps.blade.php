@extends('layouts.app')
@section('content')
  @admin
    <page-apps json="{{Auth::user()->toJson()}}"></page-apps>
  @else
    <page-apps json="{}"></page-apps>
  @endadmin
@endsection

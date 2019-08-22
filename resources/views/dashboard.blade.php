@extends('layouts.dashboard', [
  "selected" => ""
  "links" => [
    [
      "name" => "Info",
      "icon" => "fas fa-info-circle",
      "link" => "/dashboard/apps/edit/"
    ]
  ]
])

@section('content')
hello world
@endsection
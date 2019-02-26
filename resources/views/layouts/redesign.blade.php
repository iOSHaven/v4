<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <!-- === F O N T S === -->
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans:900i,700|Martel:400,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Merriweather:900i|Amiko:400|Montserrat:600|Lora:400" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400|Ubuntu" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-6jHF7Z3XI3fF4XZixAuSu0gGKrXwoX/w3uFPxC56OtjChio7wtTGJWRW53Nhx6Ev" crossorigin="anonymous">    <link href="{{ asset('css/normalize.css') }}" rel="stylesheet">
    
    <!-- === S T Y L E S === -->
    <link href="{{ asset('css/normalize.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    @yield('header')
</head>
<body>
@include('layouts.navigation')
@yield('content')
@include('layouts.footer')
@yield('footer')
<script src="/js/main.js"></script>

</body>
</html>
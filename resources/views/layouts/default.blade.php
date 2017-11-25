<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="apple-mobile-web-app-title" content="IOS Haven">
    <meta name="application-name" content="IOS Haven">
    <meta name="theme-color" content="#ffffff">
    <meta name="description" content="Get all your iPhone app needs straight from the web.  Including IPAs, signed apps, Apple developer betas, and jailbreaks.">
    <meta name="keywords" content="iphone,jailbreak,hack,crack,signed,download,ipa,free">
    <meta name="robots" content="index, follow">
    <meta name="web_author" content="iOS Development Team">
    <meta name="language" content="English">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="/fa/css/fontawesome-pro-brands.css">
    <link rel="stylesheet" href="/fa/css/fontawesome-pro-solid.css">
    <link rel="stylesheet" href="/fa/css/fontawesome-pro-light.css">
    <link rel="stylesheet" href="/fa/css/fontawesome-pro-regular.css">
    <link rel="stylesheet" href="/fa/css/fontawesome-pro-core.css">
    <link rel="apple-touch-icon" href="/favicons/apple-touch-icon.png?v=QEMYzE9pb35555" sizes="180x180">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicons/favicon-32x32.png?v=QEMYzE9pb35555">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicons/favicon-16x16.png?v=QEMYzE9pb35555">
    <link rel="manifest" href="/favicons/manifest.json?v=QEMYzE9pb35555">
    <link rel="mask-icon" href="/favicons/safari-pinned-tab.svg?v=QEMYzE9pb35555" color="#e81e1e">
    <link rel="shortcut icon" href="/favicons/favicon.ico?v=QEMYzE9pb35555">

    <link href="{{ asset('css/normalize.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Extend the head -->
    @yield('head')

</head>
<body>
    <!-- <div id="loading">
      Loading...
    </div> -->
    <div id="app">

    @include('layouts.sidebar')

        @yield('content')
    </div>

    @include('layouts.footer')
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

</body>
</html>

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>
    <link href="{{ asset('assets/frontend/css/app.css?v=' . time()) }}" rel="stylesheet" type="text/css">

    @yield('header-css')
</head>
<body>
    @include('frontend::layouts.include.preloader')

    <section>
        @include('frontend::layouts.include.header')

        @yield('content')

        @include('frontend::layouts.include.footer')
    </section>

    <script src="{{ asset('assets/frontend/js/app.js?v=' . time()) }}"></script>

    @yield('footer-js')
</body>
</html>

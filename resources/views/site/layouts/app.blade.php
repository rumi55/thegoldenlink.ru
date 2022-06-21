<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @stack('meta')

    <title>@yield('title', $title ?? config('app.name'))</title>

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    @stack('css')
</head>
<body @yield('bodyClass')>

@yield('content')

@include('site.includes.footer')

<script src="{{ mix('js/app.js') }}"></script>
@stack('js')
</body>
</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>

        @section('css')
            <link href="{{ asset('css/common/delichev.css') }}" rel="stylesheet">
            <link href="{{ asset('css/common/fontsDel.css') }}" rel="stylesheet">
        @show



    </head>
    <body>
        @yield('content')

        @section('js')
            <script src="{{ asset('js/jquery-3.5.1.min.js') }}" ></script>
            <script src="{{ asset('js/player.js') }}"></script>

        @show
    </body>
</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    @section('css')
        <link href="{{ asset('css/fonts.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('css/lk/bootstrap.css')}}">
        <link rel="stylesheet" href="{{asset('css/lk/site.css')}}">
    @show


</head>
<body class="new_fonts product20190821">

@yield('content')

@section('js')
    <script src="{{ asset('js/libs.min.js') }}"></script>
@show
</body>
</html>

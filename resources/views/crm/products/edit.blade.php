@extends('adminlte::page')

@section('title', 'Редактировать')

@section('content_header')
    <h1>Редактировать продукт</h1>
@stop

@section('content')
    <div class="col-md-10">
        <x-forms.product-form :model="$product"/>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('plugins/codemirror-5.54.0/lib/codemirror.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/codemirror-5.54.0/addon/hint/show-hint.css') }}">
@stop

@section('js')
    <script src="{{asset('plugins/codemirror-5.54.0/lib/codemirror.js')}}"></script>
    <script src="{{asset('plugins/codemirror-5.54.0/addon/hint/show-hint.js') }}"></script>
    <script src="{{asset('plugins/codemirror-5.54.0/addon/hint/xml-hint.js') }}"></script>
    <script src="{{asset('plugins/codemirror-5.54.0/addon/hint/html-hint.js') }}"></script>
    <script src="{{asset('plugins/codemirror-5.54.0/mode/xml/xml.js') }}"></script>
    <script src="{{asset('plugins/codemirror-5.54.0/mode/javascript/javascript.js') }}"></script>
    <script src="{{asset('plugins/codemirror-5.54.0/mode/css/css.js') }}"></script>
    <script src="{{asset('plugins/codemirror-5.54.0/mode/htmlmixed/htmlmixed.js') }}"></script>
    <script>
        window.onload = function() {
            const editor1 = CodeMirror(document.getElementById("code1"), {
                mode: "text/html",
                extraKeys: {"Ctrl-Space": "autocomplete"},
                value: document.getElementById("content").value
            });

            const editor2 = CodeMirror(document.getElementById("code2"), {
                mode: "text/html",
                extraKeys: {"Ctrl-Space": "autocomplete"},
                value: document.getElementById("content_video").value
            });

            const form = document.getElementById("product-form");

            form.addEventListener('submit', function () {
                document.getElementsByName('content')[0].value = editor1.getValue();
            });
            form.addEventListener('submit', function () {
                document.getElementsByName('content_video')[0].value = editor2.getValue();
            });
        };
    </script>
@stop

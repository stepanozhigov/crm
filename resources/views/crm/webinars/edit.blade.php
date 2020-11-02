@extends('adminlte::page')

@section('title', 'Редактировать')

@section('content_header')
    <h1>Редактировать вебинар</h1>
@stop

@section('content')
    <div class="col-md-6">
        <x-forms.webinar-form :model="$webinar"/>
    </div>

@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('plugins/codemirror-5.54.0/lib/codemirror.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/codemirror-5.54.0/addon/hint/show-hint.css') }}">
    <style> .CodeMirror {border-top: 1px solid #888; border-bottom: 1px solid #888;} </style>
@stop

@section('js')
{{--  codemirror  --}}
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
            const editor = CodeMirror(document.getElementById("code"), {
                mode: "text/html",
                extraKeys: {"Ctrl-Space": "autocomplete"},
                value: document.getElementById("buttons").value
            });

            const form = document.getElementById("webinar-form");

            form.addEventListener('submit', function () {
                document.getElementsByName('buttons')[0].value = editor.getValue();
            })
        };
    </script>
{{--  /codemirror  --}}

@stop

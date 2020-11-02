@extends('adminlte::page')

@section('title', 'Создать')

@section('content_header')
    <h1>Создать старницу</h1>
@stop

@section('content')

    <div class="col-md-12">
        <x-forms.consult-page-form/>
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
            const editor = CodeMirror(document.getElementById("code"), {
                mode: "text/html",
                extraKeys: {"Ctrl-Space": "autocomplete"},
                value: document.getElementById("content").value
            });

            const form = document.getElementById("consult-page-form");

            form.addEventListener('submit', function () {
                document.getElementById('content').value = editor.getValue();
            })
        };
    </script>
@stop



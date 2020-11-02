@extends('adminlte::page')

@section('title', 'Отчет продаж')

@section('content_header')
    <h1>Отчет продаж</h1>
@stop

@section('content')
    <livewire:sales-report />
@endsection

@section('css')
    <livewire:styles>
@stop

@section('js')
    <livewire:scripts>
    <script>
    window.onload = function() {
        document.getElementById('apply').addEventListener('click', function () {
            let date_from = document.getElementById('date_from').value;
            let date_to = document.getElementById('date_to').value;
            let group = document.getElementById('group').value;
            let projectsData =  $('.js-basic-multiple').select2('data');
            let projects = [];

            projectsData.forEach(elem => {
                projects.push(elem.id)
            });

            window.livewire.emit('apply', {
                "date_from": date_from,
                "date_to": date_to,
                "group": group,
                "projects": projects
            });
        });
    };
    </script>
@stop


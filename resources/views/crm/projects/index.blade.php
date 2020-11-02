@extends('adminlte::page')

@section('title', 'Проекты')

@section('content_header')
    <h1>Проекты</h1>
@stop

@section('content')
    @include('crm.components.flash-message')
    <a href="{{ route('crm.projects.create') }}" type="button" class="btn btn-primary add-button">Добавить</a>
    <table id="sortTable" class="table table-striped">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Название</th>
            <th scope="col">Домен</th>
            <th scope="col">Язык</th>
            <th scope="col">Валюта</th>
            <th scope="col">Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($projects as $project)

            <livewire:project :model="$project"/>

        @endforeach
        </tbody>
    </table>

@endsection

@section('css')
    <livewire:styles>
@stop

@section('js')
    <livewire:scripts>
    <script src="js/DataTableLocalyze.js"></script>
@stop


@php /** @var $webinars App\Models\Webinar[] */ @endphp

@extends('adminlte::page')

@section('title', 'Вебинары')

@section('content_header')
    <h1>Вебинары</h1>
@stop

@section('content')
    @include('crm.components.flash-message')
    <a href="{{ route('crm.webinars.create') }}" type="button" class="btn btn-primary add-button">Добавить</a>
    <table id="sortTable" class="table table-striped">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Название</th>
            <th scope="col">Слаг</th>
            <th scope="col">Заголовок страницы</th>
            <th scope="col">Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($webinars as $webinar)

            <livewire:webinar :model="$webinar"/>

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


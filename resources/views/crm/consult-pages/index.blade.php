@extends('adminlte::page')

@section('title', 'Страницы консультации')

@section('content_header')
    <h1>Страницы консультации</h1>
@stop

@section('content')

    <a href="{{ route('crm.consult-page.create') }}" type="button" class="btn btn-primary add-button">Добавить</a>

    <livewire:tables.consult-page-table />

@endsection

@section('css')
    <livewire:styles>
@stop

@section('js')
    <livewire:scripts>
        <script src="{{asset('js/livewire-table.js')}}"></script>
@stop


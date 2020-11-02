@extends('adminlte::page')

@section('title', 'Страницы платежа')

@section('content_header')
    <h1>Страницы платежа</h1>
@stop

@section('content')

    <a href="{{ route('crm.bill-page.create') }}" type="button" class="btn btn-primary add-button">Добавить</a>

    <livewire:tables.bill-page-table />

@endsection

@section('css')
    <livewire:styles>
@stop

@section('js')
    <livewire:scripts>
        <script src="{{asset('js/livewire-table.js')}}"></script>
@stop


@extends('adminlte::page')

@section('title', 'Допродажи')

@section('content_header')
    <h1>Допродажи</h1>
@stop

@section('content')
    <a href="{{ route('crm.up-sales.create') }}" type="button" class="btn btn-primary add-button">Добавить</a>

    <livewire:tables.up-sale-table />

@endsection

@section('css')
    <livewire:styles>
@stop

@section('js')
    <livewire:scripts>
    <script src="{{asset('js/livewire-table.js')}}"></script>

@stop


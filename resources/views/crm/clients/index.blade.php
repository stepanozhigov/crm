@extends('adminlte::page')

@section('title', 'Клиенты')

@section('content_header')
    <h1>Клиенты</h1>
@stop

@section('content')

    <a href="{{ route('crm.clients.create') }}" type="button" class="btn btn-primary add-button">Добавить</a>

    <livewire:tables.client-table />

@endsection

@section('css')
    <livewire:styles>
@stop

@section('js')
    <livewire:scripts>
    <script src="{{asset('js/livewire-table.js')}}"></script>
@stop


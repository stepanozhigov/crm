@extends('adminlte::page')

@section('title', 'Скидки')

@section('content_header')
    <h1>Скидки</h1>
@stop

@section('content')
    <a href="{{ route('crm.discounts.create') }}" type="button" class="btn btn-primary add-button">Добавить</a>

    <livewire:tables.discount-table />
@endsection

@section('css')
    <livewire:styles>
@stop

@section('js')
    <livewire:scripts>
    <script src="{{asset('js/livewire-table.js')}}"></script>
@stop


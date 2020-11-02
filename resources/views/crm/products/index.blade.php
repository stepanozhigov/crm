@extends('adminlte::page')

@section('title', 'Продукты')

@section('content_header')
    <h1>Продукты</h1>
@stop

@section('content')
    <a href="{{ route('crm.products.create') }}" type="button" class="btn btn-primary add-button">Добавить</a>

    <livewire:tables.product-table />

@endsection

@section('css')
    <livewire:styles>
@stop

@section('js')
    <livewire:scripts>
    <script src="{{asset('js/livewire-table.js')}}"></script>
@stop


@extends('adminlte::page')

@section('title', 'Переводы')

@section('content_header')
    <h1>Переводы</h1>
@stop

@section('content')
    <a onclick="confirm('Уверены что хотите применить изменения?') || event.preventDefault()"
       href="{{ route('crm.translates.apply') }}" type="button" class="btn btn-primary add-button">Применить изменения</a>
    <a href="{{ route('crm.translates.create') }}" type="button" class="btn btn-success add-button">Добавить исходники</a>
    <a onclick="confirm('Просканировать шаблоны?') || event.preventDefault()"
       href="{{ route('crm.translates.scan') }}" type="button" class="btn btn-primary add-button">Сканировать шаблоны</a>

    <livewire:tables.translates-table />

@endsection

@section('css')
    <livewire:styles>
@stop

@section('js')
    <livewire:scripts>
    <script src="{{asset('js/livewire-table.js')}}"></script>
@stop

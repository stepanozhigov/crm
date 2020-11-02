@extends('adminlte::page')

@section('title', 'Тэги')

@section('content_header')
    <h1>Тэги</h1>
@stop

@section('content')
    <a href="{{ route('crm.tags.create') }}" type="button" class="btn btn-primary add-button">Добавить</a>

    <livewire:tables.tag-table />

@endsection

@section('css')
    <livewire:styles>
@stop

@section('js')
    <livewire:scripts>
    <script src="{{asset('js/livewire-table.js')}}"></script>
@stop


@extends('adminlte::page')

@section('title', 'Подписчики')

@section('content_header')
    <h1>Подписчики</h1>
@stop

@section('content')
    <a href="{{ route('crm.mailer-subscribers.create') }}" type="button" class="btn btn-primary add-button">Добавить</a>

    <livewire:tables.mailer-subscriber-table />

@endsection

@section('css')
    <livewire:styles>
@stop

@section('js')
    <livewire:scripts>
    <script src="{{asset('js/livewire-table.js')}}"></script>
@stop


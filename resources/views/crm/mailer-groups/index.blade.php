@extends('adminlte::page')

@section('title', 'Мэйлер группы')

@section('content_header')
    <h1>Мэйлер группы</h1>
@stop

@section('content')
    <a href="{{ route('crm.mailer-groups.create') }}" type="button" class="btn btn-primary add-button">Добавить</a>

    <livewire:tables.mailer-group-table />
@endsection

@section('css')
    <livewire:styles>
@stop

@section('js')
    <livewire:scripts>
    <script src="{{asset('js/livewire-table.js')}}"></script>
@stop


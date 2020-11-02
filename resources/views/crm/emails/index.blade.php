@extends('adminlte::page')

@section('title', 'Отправленные письма')

@section('content_header')
    <h1>Отправленные письма</h1>
@stop

@section('content')
   
    <livewire:tables.email-table />

@endsection

@section('css')
    <livewire:styles>
@stop

@section('js')
    <livewire:scripts>
    <script src="{{asset('js/livewire-table.js')}}"></script>

@stop


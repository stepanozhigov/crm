@extends('adminlte::page')

@section('title', 'Комментарии')

@section('content_header')
    <h1>Комментарии</h1>
@stop

@section('content')
    <livewire:crm.comments-list />
@endsection

@section('css')
    <livewire:styles>
@stop

@section('js')
    <livewire:scripts>
@stop


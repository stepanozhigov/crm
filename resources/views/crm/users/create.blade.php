@extends('adminlte::page')

@section('title', 'Создать')

@section('content_header')
    <h1>Создать пользователя</h1>
@stop

@section('content')
    <x-forms.user-form />
@endsection


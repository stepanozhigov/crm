@extends('adminlte::page')

@section('title', 'Редактировать')

@section('content_header')
    <h1>Редактировать пользователя</h1>
@stop

@section('content')
    <x-forms.user-form :model="$user"/>
@endsection


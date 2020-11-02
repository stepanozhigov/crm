@extends('adminlte::page')

@section('title', 'Редактировать')

@section('content_header')
    <h1>Редактировать конструктор</h1>
@stop

@section('content')
    <div class="col-md-6">
        <x-forms.constructor-form :project="$constructor"/>
    </div>
@endsection



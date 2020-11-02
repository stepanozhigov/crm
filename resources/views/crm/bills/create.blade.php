@extends('adminlte::page')

@section('title', 'Создать')

@section('content_header')
    <h1>Создать платеж</h1>
@stop

@section('content')
    <div class="col-md-6">
        <x-forms.bill-form :clients="$clients"/>
    </div>
@endsection



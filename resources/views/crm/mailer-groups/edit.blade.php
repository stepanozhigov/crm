@extends('adminlte::page')

@section('title', 'Редактировать')

@section('content_header')
    <h1>Редактировать группу</h1>
@stop

@section('content')
    <div class="col-md-6">
        <x-forms.mailer-group-form :model="$mailerGroup"/>
    </div>
@endsection



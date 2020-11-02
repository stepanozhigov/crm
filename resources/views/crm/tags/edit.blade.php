@extends('adminlte::page')

@section('title', 'Редактировать')

@section('content_header')
    <h1>Редактировать проект</h1>
@stop

@section('content')
    <div class="col-md-6">
        <x-forms.tag-form :model="$tag"/>
    </div>

@endsection

@extends('adminlte::page')

@section('title', 'Создать')

@section('content_header')
    <h1>Создать допродажу</h1>
@stop

@section('content')

    <div class="col-md-6">
        <x-forms.up-sale-form/>
    </div>

@endsection


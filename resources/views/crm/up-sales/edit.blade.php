@extends('adminlte::page')

@section('title', 'Редактировать')

@section('content_header')
    <h1>Редактировать допродажу</h1>
@stop

@section('content')
    <div class="col-md-6">
        <x-forms.up-sale-form :model="$upSale"/>
    </div>
@endsection

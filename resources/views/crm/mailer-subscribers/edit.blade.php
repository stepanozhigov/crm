@extends('adminlte::page')

@section('title', 'Редактировать')

@section('content_header')
    <h1>Редактировать продукт</h1>
@stop

@section('content')
    <div class="col-md-6">
        <x-forms.product-form :model="$product"/>
    </div>

@endsection

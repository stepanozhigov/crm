@extends('adminlte::page')

@section('title', 'Редактировать')

@section('content_header')
    <h1>Редактировать скидку</h1>
@stop

@section('content')
    <div class="col-md-6">
        <x-forms.discount-form :model="$discount"/>
    </div>
@endsection

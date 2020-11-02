@extends('adminlte::page')

@section('title', 'Редактировать')

@section('content_header')
    <h1>Редактировать клиента</h1>
@stop

@section('content')
    <div class="col-md-10">
        <x-forms.client-form :model="$client"/>
    </div>
@endsection


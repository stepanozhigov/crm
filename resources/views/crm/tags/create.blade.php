@extends('adminlte::page')

@section('title', 'Создать')

@section('content_header')
    <h1>Создать тэг</h1>
@stop

@section('content')

    <div class="col-md-6">
        <x-forms.tag-form/>
    </div>

@endsection


@extends('adminlte::page')

@section('title', 'Суперклиент')

@section('content_header')
    <h1>Суперклиент</h1>
@stop

@section('content')

@include('crm.components.flash-message')

@if (null === $model)
    Суперклиент не существует
@else
    <div class="row">
        <div class="col-md-6">
            {!! Form::model($model, ['route' => ['crm.super-client.update', $model->id], 'method' => 'put']) !!}
            {!! Form::label('name', 'Имя', ['class' => 'required']); !!}
            {!! Form::text('name', $value = old('name'), $attributes = ['class' => 'form-control', 'required']) !!}
            @error('name') <x-alert type="error" :message="$message"/> @enderror

            {!! Form::label('email', 'email', ['class' => 'required']); !!}
            {!! Form::email('email', $value = old('email'), $attributes = ['class' => 'form-control', 'required']) !!}
            @error('email') <x-alert type="error" :message="$message"/> @enderror

            {!! Form::label('password', 'Пароль'); !!}
            {!! Form::password('password', $attributes = ['class' => 'form-control']) !!}
            @error('password') <x-alert type="error" :message="$message"/> @enderror

            {!! Form::label('password_confirmation', 'Пароль ещё раз'); !!}
            {!! Form::password('password_confirmation', $attributes = ['class' => 'form-control']) !!}
            @error('password_confirmation') <x-alert type="error" :message="$message"/> @enderror
            <br>
            {!! Form::submit('Редактировать', $attributes = ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endif

@endsection
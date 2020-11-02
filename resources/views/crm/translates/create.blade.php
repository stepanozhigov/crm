@extends('adminlte::page')

@section('title', 'Создать')

@section('content_header')
    <h1>Создать проект</h1>
@stop

@section('content')

    <div class="col-md-6">
        {!! Form::open() !!}

            {!! Form::label('sources', "Введите текст для перевода через ';'") !!}
            {!! Form::textarea('sources', null, ['class' => 'form-control mb-2']) !!}
            @error('sources') <x-alert type="error" :message="$message"/> @enderror

            {!! Form::submit('Сохранить', ['class' => 'form-control btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
@endsection



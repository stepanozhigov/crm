@php /** @var $model \App\Models\Email */ @endphp

@extends('adminlte::page')

@section('title', 'Просмотр письма')

@section('content_header')
    <h1>Просмотр письма {{ $model->id}}</h1>
    <a href="{{ route('crm.emails.index') }}" class="btn btn-secondary text-white mt-3">Назад</a>
@stop

@section('content')
   
{!! $model->content !!}

@endsection



@extends('adminlte::page')

@section('title', 'Комментарий')

@section('content_header')
    <h1>Комментарий</h1>
@stop

@section('content')
    @foreach($comment->children as $childComment)

    @endforeach
@endsection



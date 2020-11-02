@extends('adminlte::page')

@section('title', 'Редактировать')

@section('content_header')
    <h1>Редактировать страницу</h1>
@stop

@section('content')
    <div class="col-md-6">
        <x-forms.bill-page-form :model="$billPage"/>
    </div>
@endsection

@section('js')
    <script src="{{ asset('plugins/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace( 'ckeditor' );
    </script>
@endsection

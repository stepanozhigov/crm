@extends('adminlte::page')

@section('title', 'Создать')

@section('content_header')
    <h1>Создать старницу</h1>
@stop

@section('content')

    <div class="col-md-12">
        <x-forms.bill-page-form/>
    </div>

@endsection

@section('js')
    <script src="{{ asset('plugins/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace( 'ckeditor' );
    </script>
@endsection



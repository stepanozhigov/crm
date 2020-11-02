@extends('adminlte::page')

@section('title', 'Создать')

@section('content_header')
    <h1>Создать метод</h1>
@stop

@section('content')

    <div class="col-md-6">
        <x-forms.payment-method-form/>
    </div>

@endsection

@section('js')
    <script src="{{ asset('plugins/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace( 'ckeditor' );
    </script>
@stop


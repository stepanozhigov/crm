@extends('adminlte::page')

@section('title', 'Создать')

@section('content_header')
    <h1>Создать клиента</h1>
@stop

@section('content')

    {!! Form::model(new App\Models\Client(), ['route' => ['crm.clients.store'], 'before' => 'csrf']) !!}
    <div class="row">

        {{--   Client form     --}}
        <div class="col-md-10">
            <x-forms.client-form />
        </div>
        {{--   Client form     --}}

        {{--   Permissions check     --}}

        {{--   //Permissions check     --}}
    </div>

    {!! Form::close() !!}

@endsection



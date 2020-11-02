@extends('adminlte::page')

@section('title', 'Способы оплаты')

@section('content_header')
    <h1>Способы оплаты</h1>
@stop

@section('content')
    @include('crm.components.flash-message')
    <a href="{{ route('crm.payment-methods.create') }}" type="button" class="btn btn-primary add-button">Добавить</a>
    <table id="sortTable" class="table table-striped">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Название</th>
            <th scope="col">Заголовок</th>
            <th scope="col">Статус</th>
            <th scope="col">Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($paymentMethods as $paymentMethod)

            <livewire:payment-method :model="$paymentMethod"/>

        @endforeach
        </tbody>
    </table>

@endsection

@section('css')
    <livewire:styles>
@stop

@section('js')
    <livewire:scripts>
    <script src="{{ asset('js/DataTableLocalyze.js') }}"></script>
@stop


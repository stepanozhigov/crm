@extends('adminlte::page')

@section('title', 'Счета')

@section('content_header')
    <h1>Счета</h1>
@stop

@section('content')
    <livewire:tables.bill-table />
@endsection

@section('css')
    <livewire:styles>
@stop

@section('js')
    <livewire:scripts>
    <script src="{{asset('js/livewire-table.js')}}"></script>
    <script>
       function changeBillSum(id) {
           let sum = document.getElementById('changeBillSum-' + id).value;
           if (sum) {
               window.livewire.emit('changeBillSum', id, sum)
           }
       }
       window.livewire.on('click', () => {
           alert('Columns changed');
       })
    </script>
@stop


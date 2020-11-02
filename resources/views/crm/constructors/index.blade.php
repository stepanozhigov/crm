@extends('adminlte::page')

@section('title', 'Конструкторы')

@section('content_header')
    <h1>Конструкторы</h1>
@stop

@section('content')
    @include('crm.components.flash-message')


        <table id="sortTable" class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Проект</th>
                <th scope="col">Действия</th>
            </tr>
            </thead>
            <tbody>

            @foreach($projects as $project)
                <tr>
                    <th scope="row">{{$project->name}}</th>
                    <td>
                        <a href="{{ route('crm.constructors.edit', ['constructor' => $project->id]) }}" class="btn btn-secondary">Редактировать</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>


@endsection

@section('css')
    <livewire:styles>
@stop

@section('js')
    <livewire:scripts>
    <script src="{{asset('js/livewire-table.js')}}"></script>
@stop


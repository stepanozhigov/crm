@php /** @var $users App\Models\User[] */ @endphp

@extends('adminlte::page')

@section('title', 'Пользователи')

@section('content_header')
    <h1>Пользователи</h1>
@stop

@section('content')
    @include('crm.components.flash-message')
    <a href="{{ route('crm.users.create') }}" type="button" class="btn btn-primary add-button">Добавить</a>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Login</th>
            <th scope="col">Email</th>
            <th scope="col">Статус</th>
            <th scope="col">Имя</th>
            <th scope="col">Фамилия</th>
            <th scope="col">Последний визит</th>
            <th scope="col">Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)

            <livewire:user :model="$user"/>

        @endforeach
        </tbody>
    </table>

    {{ $users->links() }}
@endsection

@section('css')
    <livewire:styles>
@stop

@section('js')
    <livewire:scripts>
@stop


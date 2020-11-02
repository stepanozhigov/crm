@extends('lk.layouts.app')

@section('title', __('Конструктор курсов'))

@section('content_header')
    <h1>{{ __('Конструктор курсов') }}}</h1>
@stop

@section('content')
<section id="row__main">
    <div class="row-main__hero">
        <h1>{{ __('Купить курсы со скидкой') }}</h1>
        <div class="kit_facade">
            {!! $project->constructor_settings['text'] ?? '' !!}
        </div>
    </div>
    <div class="row-main__hero">
        <livewire:constructor-of-courses :client="$client" :project="$project" />
    </div>
</section>

@endsection

@section('css')
    @parent
    <livewire:styles>
@endsection

@section('js')
    @parent
    <livewire:scripts>
@endsection



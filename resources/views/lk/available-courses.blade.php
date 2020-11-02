@extends('lk.layouts.app')

@section('title', __('Доступные курсы'))

@section('content_header')
    <h1>{{ __('Доступные курсы') }}}</h1>
@stop

@section('content')
    <div class="site-index">

        <x-LK.your-courses :project="$project" :client="$client"/>

        @if($project->constructor_settings)
            @include('lk._parts.constructor_packet')
        @endif

        <x-LK.spec-courses :project="$project" :client="$client"/>

    </div>
@endsection


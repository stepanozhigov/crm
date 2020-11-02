@extends('lk.layouts.app')

@section('title', __('Главная страница'))

@section('content_header')
    <h1>{{ __('Главная страница') }}}</h1>
@stop
@section('content')
    <section id="row__main">
        <div class="row-main__hero">
            @if($project->constructor_settings)
                <div class="hero__img-panel">
                    <a href="/constructor" onclick="yaCounter39241805.reachGoal('big_baner'); return true;">
                        <img class="img-panel" src="/img/advert.png" alt="">
                    </a>
                </div>
            @endif
            <div class="hero__text-panel">
                <p>{{ __('Благодарю за доверие и добро пожаловать в Ваш личный кабинет.') }} </p>
                <p>{{ __('Здесь Вы будете проходить обучение, задавать вопросы и получать обратную связь.') }}</p>
                <p>{{ __('Я собрал всё в одном месте, для Вашего удобства.') }}</p>
                <br>
                <p>{{ __('С уважением и верой в Ваши счастливые отношения,') }}</p>
                <p>{{ __('Данила Деличев, создатель курса и Ваш личный наставник') }}</p>
            </div>

        </div>
        <!-- row-main__hero. -->
    </section>
    <div class="site-index">

        <x-LK.your-courses :project="$project" :client="$client"/>

        @if($project->constructor_settings)
            @include('lk._parts.constructor_packet')
        @endif

        <x-LK.spec-courses :project="$project" :client="$client"/>

    </div>
@endsection


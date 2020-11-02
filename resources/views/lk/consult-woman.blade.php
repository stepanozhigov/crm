@extends('lk.layouts.app')

@section('title', __('Консультации'))

@section('content_header')
    <h1>{{ __('Консультации') }}}</h1>
@stop

@section('content')
    <section id="row-audio">
        <div class="row-cont">
            <article id="post-1730" class="post-1730 page type-page status-publish hentry">

                <header class="row-cont__hello">
                    <h2 class="row-cont__hello-header">{{ __('Консультация (Женщина)') }}</h2>
                </header>

                <div class="row-cont__wr-audio">
                    <p style="text-align: center;">{{ __('Сделайте, пожалуйста, Ваш выбор и нажмите на кнопку «Заказать».') }}</p>
                    <p style="text-align: center;">{{ __('Обратите внимание, что если Вы возьмете большее количество консультаций, то это будет для Вас выгоднее, потому что каждый час в перерасчёте будет стоить Вам намного меньше. При этом Ваша уникальная ситуация будет проработана гораздо более детально.') }}</p>
                </div>
            </article>
        </div>
    </section>
    <section id="row__consult">
        <div class="row-cont">
            <x-LK.consult-block :pageSettings="$pageSettings" gender="women"/>
            <h2 class="list20190906_title">{{ __('Отзывы о личных консультациях') }}</h2>
            <div class="list20190906 list20190906_single">
                <div class="list20190906_box">
                    @foreach($pageSettings['commentsWoman'] as $commentWoman)
                        <div class="list20190906_item">
                            <p><strong>{{ $commentWoman['name'] }}</strong></p>
                            {!! $commentWoman['text'] !!}
                            <span class="list20190906_item_more" role="button">{{ __('продолжение...') }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection



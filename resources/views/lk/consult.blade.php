@extends('lk.layouts.app')

@section('title', __('Консультации'))

@section('content_header')
    <h1>{{ __('Консультации') }}}</h1>
@stop

@section('content')
<section id="row-audio">
    <div class="row-cont">
        {!! $pageSettings['content'] !!}
    </div>
</section>
<section id="row__consult">
    <div class="row-cont">
        <div class="row__consult_body">
            <article class="article__s0">
                <div class="article_inner">
                    <a href="/consult/woman">
                        <div class="info_title">{{ __('Женщина') }}</div>
                        <div class="info_buy">{{ __('Подробнее') }}</div>
                    </a>
                </div>
            </article>

            <article class="article__s0">
                <div class="article_inner">
                    <a href="/consult/man">
                        <div class="info_title">{{ __('Мужчина') }}</div>
                        <div class="info_buy">{{ __('Подробнее') }}</div>
                    </a>
                </div>
            </article>
        </div>
        <div>
            <h2 class="list20190906_title">{{ __('Отзывы о личных консультациях') }}</h2>
        </div>
        <div class="list20190906">
            @foreach($pageSettings['commentsMain'] as $commentMain)
            <div class="list20190906_box">
                <div class="list20190906_item">
                    <p><strong>{{ $commentMain['name'] }}</strong></p>
                    {!! $commentMain['text'] !!}
                    <span class="list20190906_item_more" role="button">{{ __('продолжение...') }}</span>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection




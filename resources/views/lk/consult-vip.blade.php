@extends('lk.layouts.app')

@section('title', __('Консультации'))

@section('content_header')
    <h1>{{ __('Консультации') }}}</h1>
@stop

@section('content')

    <section id="row-audio">
        <div class="row-cont">
            <article id="post-1630" class="post-1630 page type-page status-publish hentry">
                <header class="row-cont__hello">
                    <h2 class="row-cont__hello-header">{{ __('Индивидуальные консультации') }}</h2>
                </header>
                <div class="row-cont__wr-audio">
                    <div class="entry-consult entry-content-audio">
                        <div align="center">

                            <div class="wrap-movie">
                                <div class="container-movie">
                                    <div class="video-overlay-bottom hidden-xs"></div>
                                    <button class="btn firstvideoload" id="first-video-overlay"></button>
                                    <button class="btn pausevideo" id="playing-video-overlay"></button>
                                    <button class="btn playvideo" id="paused-video-overlay">
                                        <h4>{{ __('Пауза') }}</h4>
                                        <img src="img/videoplay.png" alt="" style="margin:0 auto; max-width: 100%;">
                                        <h4>{{ __('Нажмите сюда для продолжения') }}</h4>
                                    </button>
                                    <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $consultVip['video'] }}?rel=0&amp;controls=0&amp;showinfo=0&amp;enablejsapi=1&amp;html5=1" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen="" id="video"></iframe>
                                </div>
                            </div>
                        </div>
                    </div><!-- .entry-content-audio -->
                    <div class="row__consult_body">
                        {!! __('<p>Выберите, пожалуйста, одного из специалистов в соответствии с Вашим предпочтением. <br>
                            Цена в обоих случаях одинаковая. <br>
                            Качество и метод консультирования тоже, разница лишь в голосе. <br>
                            Нажмите, пожалуйста, на «подробнее», чтобы ознакомиться с ценами.</p>') !!}
                    </div>
                </div>
            </article><!-- #post-## -->
        </div>
    </section>

    <section id="row__consult">
        <div class="row-cont">
            <div class="row__consult_body">

                <article class="article__s0">
                    <div class="article_inner">
                        <a href="{{ route('common.bill.buy', ['product' => $consultVip['woman'], 'client' => $client->id]) }}">
                            <div class="info_title">{{ __('Женщина') }}</div>
                            <div class="info_buy">{{ __('Заказать') }}</div>
                        </a>
                    </div>
                </article>

                <article class="article__s0">
                    <div class="article_inner">
                        <a href="{{ route('common.bill.buy', ['product' => $consultVip['man'], 'client' => $client->id]) }}">
                            <div class="info_title">{{ __('Мужчина') }}</div>
                            <div class="info_buy">{{ __('Заказать') }}</div>
                        </a>
                    </div>
                </article>

            </div>
        </div>
    </section>

@endsection



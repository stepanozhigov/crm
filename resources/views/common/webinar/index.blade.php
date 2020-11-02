@php /** @var $webinar \App\Models\Webinar*/ @endphp

@extends('common.layouts.landing')

@section('title', $webinar->page_title ?? 'Вебинар')

@section('content')
<div class="page-wrapper container-fluid page-{{$webinar->slug}}">
    <section class="box_n1 row">
        <div class="box_n1_mask"></div>

        <div class="container">
            <div class="box_n1_inners">
                <h2 class="n1_title">Данил Деличев</h2>
                <div class="n1_contact">
                    <div class="n1_contact_phone">+7 (495) 120-80-31</div>
                    <div class="n1_contact_mail">support@delichev.com</div>
                </div>
            </div>
        </div>

    </section>
    <div class="box_n18 row">
        <div class="box_n18_mask"></div>
        <div class="container">
            <div class="box_n18_inners">
                <h1 class="n18_title" style="text-align: center">{{ $webinar->title }}</h1>
                <p class="n18_longtitle">{{ $webinar->description }}</p>
                <div class="n3_video">
                    <div class="container-movie">
                        <div class="video-overlay-bottom hidden-xs"></div>
                        <button class="btn firstvideoload" id="first-video-overlay"></button>
                        <button class="btn pausevideo" id="playing-video-overlay" style="display: none;"></button>
                        <button class="btn playvideo" id="paused-video-overlay" style="display: none;">
                            <h4>Пауза</h4>
                            <img src="/img/videoplay.png" alt="" style="margin:0 auto; max-width: 100%;">
                            <h4>Нажмите сюда для продолжения</h4>
                        </button>
                        {!! $webinar->video_frame !!}
                    </div>
                </div>
                <ul class="n18_more">
                    {!! $webinar->buttons !!}
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection

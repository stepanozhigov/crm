@php /** @var \App\Models\Product $product */ @endphp
@extends('lk.layouts.app')

@section('title', $product->name)

@section('content')
    <div class="row-cont">
        <header class="row-cont__hello"><h2 class="row-cont__hello-header">{{ $product->name }}</h2>
        </header>
        <div class="row-cont__wr-audio row-cont__wr-audio2">
            <div class="entry-consult entry-content-audio">
                @if($product->youtube_id)
                    <div class="video-block">
                        <div class="container-movie"><div class="video-overlay-bottom hidden-xs"></div><button class="btn firstvideoload" id="first-video-overlay"></button><button class="btn pausevideo" id="playing-video-overlay"></button><button class="btn playvideo" id="paused-video-overlay">
                                <h4>{{ __('Пауза') }}</h4>
                                <img src="{{ asset('img/videoplay.png') }}" alt="" style="margin:0 auto; max-width: 100%;">
                                <h4>{{ __('Нажмите сюда для продолжения') }}</h4>
                            </button>
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $product->youtube_id }}?rel=0&amp;controls=0&amp;showinfo=0&amp;enablejsapi=1&amp;html5=1" allow="autoplay; encrypted-media" allowfullscreen="" id="video" frameborder="0"></iframe>
                        </div>
                    </div>
                @endif
            </div>

            <a class="pay_kurs" href="{{ route('common.bill.buy', ['product' => $product->id, 'client' => $client->id, 'tag' => App\Models\Tag::TAG_LK]) }}">
                <span>{{ __('Заказать со скидкой') }}</span>
            </a>
        </div>
    </div>
    <div class="site-index">

        <x-LK.spec-courses :project="$project" :client="$client"/>

    </div>
@endsection

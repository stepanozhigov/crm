@php /**@var $bill \App\Models\Bill */ @endphp

@extends('common.layouts.bill')

@push('styles')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
{{--    <link href="{{ asset('css/bill/main.css') }}" rel="stylesheet">--}}
{{--    <link href="{{ asset('css/common/fontsDel.css') }}" rel="stylesheet">--}}
    {{--        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">--}}

    @if(Agent::isMobile())
        <link rel="stylesheet" href="{{asset('css/bill/libs.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/bill/main-mobile.css')}}">
    @else
        <link rel="stylesheet" href="{{ asset(mix('css/bill/main.css')) }}">
    @endif
    <livewire:styles>
@endpush

@section('content')

    <div class="page-wrapper container-fluid">

        <div class="order">
            <h2 class="order_title" id="order_title">

                {{--  PRODUCT TITLE  --}}
                @if(!$bill->product->typeConstructor())
                    {{ $bill->product->name }}
                @endif
                {{-- / PRODUCT TITLE  --}}

                @if($additionalProducts->isNotEmpty())
                    @foreach($additionalProducts as $additionalProduct)
                        @if (!$loop->first), @endif{{$additionalProduct->name}}
                    @endforeach
                @endif
            </h2>

            <div class="order_info">
                <div class="order_info_sum" id="order_info_sum">
                    @if($bill->sum === $bill->sum_src)
                        <span class="order_info_sum_src" id="sum-src"> {{ number_format($bill->sum, 0, ',', ' ') }}
                            {{ App\Helpers\CurrencyHelper::getCurrencySymbol($bill->product->project->currency)  }} </span>
                    @else
                        <span class="crossed" id="sum-src"> {{ number_format($bill->sum_src, 0, ',', ' ') }} Р</span>
                        <span class="sale" id="sum"> {{ number_format($bill->sum, 0, ',', ' ') }} Р</span>
                    @endif
                </div>

                <x-currencies-block :bill="$bill" />

                @if(isset($settings['additionalText']))
                    {!! $settings['additionalText']['text'] !!}
                @endif

                <div class="w-100 d-flex justify-content-center mb-4">
                    <a class="btn btn-primary" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">{{__('Детали платежа')}}</a>
                </div>
                <div class="collapse multi-collapse mb-4" id="multiCollapseExample1">
                    <div class="card card-body">
                        <div>
                            <div class="order_info_number">
                                <div class="order_info_longtitle">{{__('Номер заказа')}}:</div>
                                <div class="order_info_description">{{ $bill->id }}</div>
                            </div>
                            <div class="order_info_user">
                                <div class="order_info_longtitle">{{__('Ваша почта')}}:</div>
                                <div class="order_info_description">{{ $bill->client->email }}</div>
                            </div>
                        </div>
                    </div>
                </div>

                @if(count($paymentMethods) > 1)
                <div class="order_info_check_down">{{__('Выберите ниже 1 из')}} {{ count($paymentMethods) }} {{__('способов оплаты')}}</div>
                @endif

            </div>

            <x-payment-methods :paymentMethods="$paymentMethods" :upSales="$upSales" :bill="$bill"/>
            <br>

        </div>

        <footer class="footer">
            <ul class="protection">
                @if(isset($settings['guaranty']))
                    <li class="protection_item">
                        <img src="@if(App::isLocale('ru')) {{ asset('/img/22.jpg') }} @else {{ asset('/img/22_eng.jpg') }} @endif" alt="Гарантия на возврат" class="protection_item_img">
                        <p class="protection_item_description">{{ __('Вы получаете 100% гарантию на возврат Ваших средств в течение 14 дней. Если данный курс Вам не подойдет, просто дайте нам знать и мы полностью вернем Вам деньги.') }}</p>
                    </li>
                @endif
                <li class="protection_item">
                    <img src="{{ asset('/img/33.png') }}" alt="Данные надежно защищены" class="protection_item_img">
                    <p class="protection_item_description">{{ __('Мы используем передовые системы безопасности и Ваши данные надежно защищены в соответствии с действующим законом о защите данных и Политике конфиденциальности.') }}</p>
                </li>
                <li class="protection_item">
                    <img src="{{ asset('/img/11.png') }}" alt="Информация полностью защищена" class="protection_item_img">
                    <p class="protection_item_description">{{ __('Информация, которую Вы предоставляете - полностью защищена и ни при каких обстоятельствах не будет передана третьим лицам или опубликована.') }}</p>
                </li>
            </ul>

            @if(App::isLocale('ru'))
                <p>
                    <a href="/privatpolicy" style="color: #666 !important; text-decoration: underline;" target="_blank">Политика конфиденциальности</a>&nbsp; &nbsp;<a href="/oferta" style="color: #666 !important; text-decoration: underline;" target="_blank">Публичный договор </a></p>
                <p>По любым вопросам свяжитесь с нами:</p>
                <p><strong>support.delichev@yandex.ru <br>
                        + 7 (495) 120-80-31</strong></p>
                <p>Звонки принимаются:</p>
                <p><strong>Понедельник - Суббота с 8:00 до 20:00</strong> по Московскому времени</p><br>
                <img src="/img/logo-rbk-money.png" alt="" class="header_logo">
            @endif
        </footer>
    </div>

    <div id="anotherBuyerInfo" style="position: fixed;"></div>
    <div id="anotherBuyerInfoContent"></div>

@endsection

@push('scripts')

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <script src="{{ asset('js/jquery.inputmask.bundle.min.js') }}" rel="stylesheet"></script>
    <script src="{{ asset('js/jquery.inputmask-multi.js') }}" rel="stylesheet"></script>
    <script src="{{ asset('js/libs.min.js') }}" rel="stylesheet"></script>

    <script src="{{asset('/js/spin.min.js')}}"></script>

    @if(Agent::isMobile())
        <script src="{{asset('js/bill/mobile/jquery.flexslider-min.js')}}"></script>
        <script src="{{asset('js/bill/mobile/common.js')}}"></script>
    @else
        <script src="{{asset('js/bill/desktop/common.js')}}"></script>
    @endif

    <script>
        //change bill sum for upSales
        window.onload = function() {
            window.livewire.on('newSum', function (data) {
                let sumValue = new Intl.NumberFormat('ru-RU').format(data.sum);
                let sumSrcValue = new Intl.NumberFormat('ru-RU').format(data.sumSrc);
                if (data.sum === data.sumSrc) {
                    document.getElementById('order_info_sum').innerHTML = '<span class="order_info_sum_src" id="sum">' + ' ' + sumValue + ' P </span>';
                } else {
                    document.getElementById('order_info_sum').innerHTML = '<span class="crossed" id="sum-src">' + sumSrcValue + ' P </span>' +
                        '<span class="sale" id="sum">' + ' ' + sumValue + ' P </span>';
                }
            });
        }
    </script>

    <livewire:scripts>
@endpush
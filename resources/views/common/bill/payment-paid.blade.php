@extends('common.layouts.bill')

@section('content')
<div class="thanks-wrapper">
    <h1 class="expectation_title thanks-title size-resp">{{ __('Спасибо за покупку') }}</h1>
    <h2 class="expectation_title thanks-longtitle size-resp">
        {{ __('Курс доступен в Вашем личном кабинете') }}
        @if ($countBills > 1) {{ __('(логин и пароль остались прежними)') }}
        @else {{ __('(доступы высланы вам на почту)') }}
        @endif
    </h2>
    <svg id="svg1" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
         width="94" height="94" viewBox="0 0 47 47"  >
        <title></title>
        <circle fill="#4188e3" cx="24" cy="24" r="21"/>
        <path class="path" fill= "none" stroke ="#90f1ff" stroke-width ="1.5" stroke-dasharray= "70.2" stroke-dashoffset="70.2"
              d="M 34.6 14.6  L 21 28.2 L 15.4 22.6 L 12.6 25.4 L 21 33.8 L 37.4 17.4z">
            <animate id="p1" attributeName="stroke-dashoffset" begin="0s" values="70.2;0" dur="1.5s" repeatCount="1" fill="freeze" calcMode="paced" restart="whenNotActive"/>
            <animate id="f1" attributeName="fill" begin = "p1.end" values="#4188e3; #90f1ff"  dur="1s" fill="freeze" restart="whenNotActive" />
        </path>
    </svg>
</div>
@endsection

@section('css')
    <style>
        .size-resp{
            /* Calculation */
            --diff: calc(var(--max-size) - var(--min-size));
            --responsive: calc((var(--min-size) * 1px) + var(--diff) * ((100vw - 320px) / (1200 - 320)));
        }
        .page-wrapper.thanks{
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding-bottom: 20px;
        }
        .thanks-wrapper{
            max-width: 768px;
            width: 100%;
            padding: 10px;
            margin-left: auto;
            margin-right: auto;
            text-align: center;
        }
        .thanks-wrapper svg{
            margin-left: auto;
            margin-right: auto;
            display: block;
        }
        .thanks-title{
            --max-size: 28;
            --min-size: 22;
            font-size: var(--responsive);
        }
        .thanks-longtitle{
            --max-size: 25;
            --min-size: 19;
            font-size: var(--responsive);
        }
    </style>
@endsection

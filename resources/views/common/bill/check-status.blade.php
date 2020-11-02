<style>
    .expectation_title {
        margin: 20px auto;
        font-size: 22px;
        color: #4188e3;
        font-weight: 600;
        text-align: center; }
    #fountainG {
        position: relative;
        width: 234px;
        height: 28px;
        margin: 0 auto; }
    .fountainG {
        position: absolute;
        top: 0;
        background-color: #4188e3;
        width: 18px;
        height: 18px;
        animation-name: bounce_fountainG;
        -o-animation-name: bounce_fountainG;
        -ms-animation-name: bounce_fountainG;
        -webkit-animation-name: bounce_fountainG;
        -moz-animation-name: bounce_fountainG;
        animation-duration: 1.5s;
        -o-animation-duration: 1.5s;
        -ms-animation-duration: 1.5s;
        -webkit-animation-duration: 1.5s;
        -moz-animation-duration: 1.5s;
        animation-iteration-count: infinite;
        -o-animation-iteration-count: infinite;
        -ms-animation-iteration-count: infinite;
        -webkit-animation-iteration-count: infinite;
        -moz-animation-iteration-count: infinite;
        animation-direction: normal;
        -o-animation-direction: normal;
        -ms-animation-direction: normal;
        -webkit-animation-direction: normal;
        -moz-animation-direction: normal;
        transform: scale(0.3);
        -o-transform: scale(0.3);
        -ms-transform: scale(0.3);
        -webkit-transform: scale(0.3);
        -moz-transform: scale(0.3);
        border-radius: 19px;
        -o-border-radius: 19px;
        -ms-border-radius: 19px;
        -webkit-border-radius: 19px;
        -moz-border-radius: 19px; }
    #fountainG_1 {
        left: 0;
        animation-delay: 0.6s;
        -o-animation-delay: 0.6s;
        -ms-animation-delay: 0.6s;
        -webkit-animation-delay: 0.6s;
        -moz-animation-delay: 0.6s; }
    #fountainG_2 {
        left: 29px;
        animation-delay: 0.75s;
        -o-animation-delay: 0.75s;
        -ms-animation-delay: 0.75s;
        -webkit-animation-delay: 0.75s;
        -moz-animation-delay: 0.75s; }
    #fountainG_3 {
        left: 58px;
        animation-delay: 0.9s;
        -o-animation-delay: 0.9s;
        -ms-animation-delay: 0.9s;
        -webkit-animation-delay: 0.9s;
        -moz-animation-delay: 0.9s; }
    #fountainG_4 {
        left: 88px;
        animation-delay: 1.05s;
        -o-animation-delay: 1.05s;
        -ms-animation-delay: 1.05s;
        -webkit-animation-delay: 1.05s;
        -moz-animation-delay: 1.05s; }
    #fountainG_5 {
        left: 117px;
        animation-delay: 1.2s;
        -o-animation-delay: 1.2s;
        -ms-animation-delay: 1.2s;
        -webkit-animation-delay: 1.2s;
        -moz-animation-delay: 1.2s; }
    #fountainG_6 {
        left: 146px;
        animation-delay: 1.35s;
        -o-animation-delay: 1.35s;
        -ms-animation-delay: 1.35s;
        -webkit-animation-delay: 1.35s;
        -moz-animation-delay: 1.35s; }
    #fountainG_7 {
        left: 175px;
        animation-delay: 1.5s;
        -o-animation-delay: 1.5s;
        -ms-animation-delay: 1.5s;
        -webkit-animation-delay: 1.5s;
        -moz-animation-delay: 1.5s; }
    #fountainG_8 {
        left: 205px;
        animation-delay: 1.64s;
        -o-animation-delay: 1.64s;
        -ms-animation-delay: 1.64s;
        -webkit-animation-delay: 1.64s;
        -moz-animation-delay: 1.64s; }
    @keyframes bounce_fountainG {
        0% {
            -webkit-transform: scale(1);
            transform: scale(1);
            background-color: #4188e3; }
        100% {
            -webkit-transform: scale(0.3);
            transform: scale(0.3);
            background-color: white; } }
    @-webkit-keyframes bounce_fountainG {
        0% {
            -webkit-transform: scale(1);
            background-color: #4188e3; }
        100% {
            -webkit-transform: scale(0.3);
            background-color: #4188e3; } }
    @media (min-width: 768px) {
        .expectation_title {
            font-size: 28px; }
        .fountainG {
            width: 28px;
            height: 28px; } }
    .hidden {
        display: none;
    }
</style>
<div id="fountainG">
    <div id="fountainG_1" class="fountainG"></div>
    <div id="fountainG_2" class="fountainG"></div>
    <div id="fountainG_3" class="fountainG"></div>
    <div id="fountainG_4" class="fountainG"></div>
    <div id="fountainG_5" class="fountainG"></div>
    <div id="fountainG_6" class="fountainG"></div>
    <div id="fountainG_7" class="fountainG"></div>
    <div id="fountainG_8" class="fountainG"></div>
</div>
<p class="expectation_title">{{ __('Платеж в процессе...') }}</p>

{!! Form::open(['url' => $userInteractionRequest['uriTemplate'], 'id' => '3d-secure']) !!}
{!! Form::hidden($userInteractionRequest['form'][0]['key'], $userInteractionRequest['form'][0]['template']) !!}
{!! Form::hidden($userInteractionRequest['form'][1]['key'], $userInteractionRequest['form'][1]['template']) !!}
{!! Form::hidden($userInteractionRequest['form'][2]['key'], $userInteractionRequest['form'][2]['template']) !!}
{!! Form::close() !!}

<script>
    window.onload = function() {
        let form = document.getElementById('3d-secure');
        form.submit();
    }
</script>

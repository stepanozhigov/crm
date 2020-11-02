<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    @section('css')
        <link href="{{ asset(mix('css/lk/oldPanel.css')) }}" rel="stylesheet">
        <link href="{{ asset('css/fonts.css') }}" rel="stylesheet">
    @show


</head>
<body class="new_fonts product20190821">

<div class="info__vip">
    <div class="row-cont">
        <a href="/" class="info__logo"></a>
        <div class="info_contact">
            @if(App::isLocale('ru'))
                <a href="tel:74951208031">+7 (495) 120-80-31</a>
            @endif

            @switch(App::getLocale())
                @case('pt_BR')
                    <a href="mailto:danildelichev24@gmail.com">danildelichev24@gmail.com</a>
                    @break
                @case('tr')
                    <a href="mailto:supp.delichev@gmail.com">supp.delichev@gmail.com</a>
                    @break
                @default
                    <a href="mailto:support@delichev.com">support@delichev.com</a>
            @endswitch
        </div>
    </div>
</div>

<section id="row__header">
    <div class="row-cont">
        <nav id="site-navigation" class="main-navigation clear" role="navigation">

            <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            {{-- Top Nav --}}
            <ul id="menu-main" class="primary-menu nav-menu clear" aria-expanded="false">
                <li class="menu-item main"><a href="/">{{ __('Главная') }}</a></li>
                <li class="menu-item"><a href="/available-courses">{{ __('Ваши курсы') }}</a></li>
                @if(App::isLocale('ru'))
                    <li class="menu-item"><a href="/consult">{{ __('Консультации') }}</a></li>
                @endif
                @if($project->constructor_settings)
                    <li class="menu-item"><a href="/constructor">{{ __('Пакеты со скидкой') }}</a></li>
                @endif
                @if(in_array($project->id, [4]))
                    <li class="menu-item menu-vip"><a href="/consult-vip">{{ __('ВИП') }}</a></li>
                @endif
                <li class="menu-item exit">
                    {!! Form::open(['url' => '/logout'])  !!}
                    {!! Form::button(__('Выход'), ['type' => 'submit']) !!}
                    {!! Form::close() !!}
                </li>
            </ul>

        </nav>
    </div>
</section>

@yield('content')

<footer id="colophon" class="site-footer" role="contentinfo">
    <div class="site-info">
        @if(App::isLocale('ru'))
        <p><a href="/privatpolicy" style="color: #666 !important; text-decoration: underline;" target="_blank">Политика конфиденциальности</a>&nbsp; &nbsp;<a href="/publichnyj-dogovor-oferta" style="color: #666 !important; text-decoration: underline;" target="_blank">Публичный договор </a></p>
        @endif
        <p>© 2009-{{ date('Y') }}</p>
    </div><!-- .site-info -->
</footer><!-- #colophon -->
@section('js')
    <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('js/libs.min.js') }}"></script>
    <script src="{{ asset('js/lk/audioplayer.min.js') }}"></script>
    <script src="{{ asset(mix('js/lk/main.js')) }}"></script>
    <script src="{{ asset('js/lk/readmore.min.js') }}"></script>
@show
</body>
</html>

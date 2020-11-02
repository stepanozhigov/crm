@extends('lk.layouts.login')

@section('content')
<div class="site-login">
    <section id="row__autorize">
        <div class="row-cont">
            <div class="row-cont">

                <div class="row__autorize__desc font">
                    <div class="row__autorize__desc_inner">
                        <p>{{__('Здравствуйте, это Данил Деличев.')}}</p>
                        <p>{{__('Здесь Вы можете посмотреть онлайн-версии моих курсов.')}}</p>
                        <p>{{__('Всё что для этого необходимо, это ввести ниже Ваш емэйл и пароль, которые я прислал Вам на
                            емэйл сразу после подтверждения оплаты и нажать на кнопку “Войти”.')}}</p>
                        <p>{{__('До встречи на курсе!')}}</p>
                    </div>
                </div>

                <div class="row__autorize__form">
                    <div class="row__autorize__form_title font">{{__('Личный кабинет')}}</div>
                    <div class="autorize__form_inner">
                        <div class="autorize__form_inner_width">
                            <form method="POST" action="{{ route($subdomain.'login') }}">
                                @csrf

                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Логин') }}</label>
                                    </div>
                                    <div class="col-md-12">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Пароль') }}</label>
                                    </div>
                                    <div class="col-md-12">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" style="display: inline" for="remember">
                                                {{ __('Запомнить') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Войти') }}
                                        </button>

                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>

@endsection

@extends('common.layouts.landing')

@section('title', 'Как вернуть жену')

@section('content')
<div class="page-wrapper container-fluid">

@include('common._parts-landing.header')

    <div class="box_n3 row">
        <div class="box_n3_mask"></div>
        <div class="container">
            <div class="box_n3_inners">
                <h3 class="n13_title">Узнай секрет, как легко вернуть жену</h3>
                <p class="n3_longtitle">Нажмите на просмотр видео и прослушайте его очень внимательно</p>
                <div class="n3_video">
                    <div class="container-movie">
                        <div class="video-overlay-bottom hidden-xs"></div>
                        <button class="btn firstvideoload" id="first-video-overlay"></button>
                        <button class="btn pausevideo" id="playing-video-overlay" style="display: none;"></button>
                        <button class="btn playvideo" id="paused-video-overlay" style="display: none;">
                            <h4>Пауза</h4>
                            <img src="https://kakvernutmuzha.com/wp-content/themes/tpl_delichev/landing/img/videoplay.png" alt="" style="margin:0 auto; max-width: 100%;">
                            <h4>Нажмите сюда для продолжения</h4>
                        </button>
                        <iframe width="576" height="324" src="https://www.youtube.com/embed/pS1mHdHHaBU?rel=0&amp;controls=0&amp;showinfo=0&amp;enablejsapi=1&amp;html5=1" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen="" id="video"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('common._parts-landing.index-form')
    <section class="box_n11 row">
        <div class="box_n11_mask"></div>
        <div class="container">
            <div class="box_n11_inners">
                <h3 class="n11_title">Отзывы и признания тех, кто уже вернул своих любимых: </h3>
                <div class="n11_longtitle"></div>
                <ul class="review">
                    <li class="review_item">
                        <div class="review_item_top">
                            <div class="review_item_autor">
                                <img src="/img/vz/1.jpg" alt="комментатор" class="review_item_autor_photo">
                                <div class="review_item_autor_name">
                                    <span>Александр, Мичуринск  </span>
                                    <strong><a href="mailto:sanya8884@rambler.ru">sanya8884@rambler.ru </a></strong>
                                </div>
                            </div>
                            <div class="review_item_text">
                                <h4 class="review_item_text_title">Курс «Как вернуть жену» Данилы Деличева реально работает, это не развод.</h4>
                                <p>Готов подтвердить лично, что мне он действительно помог.</p>
                                <p>Конечно, надо и над собой работать. Но когда я вернул жену,<i>таких чувств у нас даже в медовый месяц не было!</i></p>
                                <p>Хорошее ты делаешь дело, дорогой Человек. С огромной Благодарностью.</p>
                            </div>
                        </div>
                        <div class="review_item_bottom">
                            <div class="review_item_bottom_decore"></div>
                        </div>
                    </li>
                    <li class="review_item">
                        <div class="review_item_top">
                            <div class="review_item_autor">
                                <img src="/img/vz/2.jpg" alt="комментатор" class="review_item_autor_photo">
                                <div class="review_item_autor_name">
                                    <span>Александр, г. Северодвинск </span>
                                    <strong><a href="mailto:alexzee666@gmail.com">alexzee666@gmail.com </a></strong>
                                </div>
                            </div>
                            <div class="review_item_text">
                                <h4 class="review_item_text_title">Это бомба. Спасибо за курс!</h4>
                                <p>Ваш курс мне очень помог, и мы с супругой до сих пор живем вместе и очень счастливы. Черная полоса пройдена благодаря Вам, Данила. Спасибо. Можете опубликовать фото и мои контакты. Буду рад помочь.</p>
                            </div>
                        </div>
                        <div class="review_item_bottom">
                            <div class="review_item_bottom_decore"></div>
                        </div>
                    </li>
                    <li class="review_item">
                        <div class="review_item_top">
                            <div class="review_item_autor">
                                <img src="/img/vz/3.jpg" alt="комментатор" class="review_item_autor_photo">
                                <div class="review_item_autor_name">
                                    <span>Дмитрий, Новороссийск </span>
                                    <strong><a href="mailto:dmitr.kogtev2017@yandex.ru">dmitr.kogtev2017@yandex.ru </a></strong>
                                </div>
                            </div>
                            <div class="review_item_text">
                                <h4 class="review_item_text_title">Послушал курс… появилась надежда!</h4>
                                <p>Много методов перепробовал по совету друзей. Ходил к гадалкам. Все напрасно. Послушал курс... Появилась надежда! <strong>Данила, действительно, впечатляет!</strong></p>
                                <p>Для тех, кто не верит: Скачай методику. Реально мозги на место встанут. Во всяком случае, ничего не потеряешь. У меня все получилось, и ты тоже сможешь.</p>
                            </div>
                        </div>
                        <div class="review_item_bottom">
                            <div class="review_item_bottom_decore"></div>
                        </div>
                    </li>
                    <li class="review_item">
                        <div class="review_item_top">
                            <div class="review_item_autor">
                                <img src="/img/vz/4.jpg" alt="комментатор" class="review_item_autor_photo">
                                <div class="review_item_autor_name">
                                    <span>Евгений, Москва </span>
                                    <strong><a href="mailto:4.8is@inbox.ru">4.8is@inbox.ru </a></strong>
                                </div>
                            </div>
                            <div class="review_item_text">
                                <h4 class="review_item_text_title">Я уже вернул жену… Все твои рекомендации - это то, чего не получишь от друзей и близких</h4>
                                <p><strong>Даниила!))) Ты гений. Твой курс работает по полной.</strong> Я уже вернул жену, вернул благодаря тебе. Все твои рекомендации, это то, чего не получишь от друзей и близких. Я слушал только тебя и получил отличный результат. Хотелось бы помогать тебе. Спасибо!!!!</p>
                                <p>Всем желаю удачи! Готов ответить, поддержать.</p>
                            </div>
                        </div>
                        <div class="review_item_bottom">
                            <div class="review_item_bottom_decore"></div>
                        </div>
                    </li>
                    <li class="review_item">
                        <div class="review_item_top">
                            <div class="review_item_autor">
                                <img src="/img/vz/5.jpg" alt="комментатор" class="review_item_autor_photo">
                                <div class="review_item_autor_name">
                                    <span>Бахтияр, Петропавловск </span>
                                    <strong><a href="mailto:baxtiyar_ctvm@mail.ru">baxtiyar_ctvm@mail.ru </a></strong>
                                </div>
                            </div>
                            <div class="review_item_text">
                                <h4 class="review_item_text_title">Данила, большое спасибо! Твой курс очень полезный и правильный!</h4>
                                <p>Советы, касаемые первых 2-х недель, на мой взгляд, являются ключевыми. <strong>Эффект колоссальный!</strong> Изменения в лучшую сторону заметила не только жена, но и все окружающие.</p>
                                <p>Курс помогает не только вернуть жену, но и переосмыслить своё поведение в целом. <strong>Я становлюсь лучше, и все это видят.</strong> Казалось бы, простые советы, до которых может додуматься каждый, но стоит на деле их применить, и всё меняется. Ещё раз огромное спасибо!.</p>
                            </div>
                        </div>
                        <div class="review_item_bottom">
                            <div class="review_item_bottom_decore"></div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    @include('common._parts-landing.footer')
</div>
@endsection

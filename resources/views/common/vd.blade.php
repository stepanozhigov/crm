@extends('common.layouts.landing')

@section('title', 'Как вернуть девушку')

@section('content')
<div class="page-wrapper container-fluid">
@include('common._parts-landing.header')

    <div class="box_n3 row">
        <div class="box_n3_mask"></div>
        <div class="container">
            <div class="box_n3_inners">
                <h3 class="n13_title">Узнай секрет, как легко вернуть девушку</h3>
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
                        <iframe width="576" height="324" src="https://www.youtube.com/embed/qH_EGRbde0U?rel=0&amp;controls=0&amp;showinfo=0&amp;enablejsapi=1&amp;html5=1" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen="" id="video"></iframe>
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
                                <img src="/img/vd/1.jpg" alt="комментатор" class="review_item_autor_photo">
                                <div class="review_item_autor_name">
                                    <span>Александр Ященко, Севастополь  </span>
                                    <strong><a href="mailto:yashhenko.sanya@mail.ru">yashhenko.sanya@mail.ru </a></strong>
                                </div>
                            </div>
                            <div class="review_item_text">
                                <h4 class="review_item_text_title">Девушка даже с таким характером, как у моей, отреагировала и причем неожиданно быстро и страстно</h4>
                                <p>Моя девушка очень гордая и ушла по причине мелкой обиды.</p>

                                <p>Курс супер! Девушка даже с таким характером, как у моей, отреагировала и причем неожиданно быстро и страстно. Хотя <b>наши отношения не имели даже намека на то, что мы будем вместе</b>. <i>Было развалено все, что только можно развалить.</i></p>

                                <p>Курс действительно учит правильно действовать и правильно мыслить, что тоже немаловажно. <b>Сейчас мы вместе</b>, и я знаю, как строить правильные отношения. Спасибо Даниле.</p>

                            </div>
                        </div>
                        <div class="review_item_bottom">
                            <div class="review_item_bottom_decore"></div>
                        </div>
                    </li>
                    <li class="review_item">
                        <div class="review_item_top">
                            <div class="review_item_autor">
                                <img src="/img/vd/2.jpg" alt="комментатор" class="review_item_autor_photo">
                                <div class="review_item_autor_name">
                                    <span>Сергей Дудник, Москва  </span>
                                    <strong><a href="mailto:dserney@mail.ua">dserney@mail.ua </a></strong>
                                </div>
                            </div>
                            <div class="review_item_text">
                                <h4 class="review_item_text_title">Через две недели… девушка призналась мне, что начинает жалеть о том, что бросила меня</h4>
                                <p>Девушка ушла сама без обид и огорчений. Сказала, что хочет заняться карьерой. <i>Для меня был шок, и я не знал с чего начать</i>.</p>

                                <p>Данила, <b>хочу сказать спасибо за курс. Он мне очень помогает</b>. Начал пользоваться я курсом уже месяц назад. Через две недели после его покупки, девушка призналась мне, что начинает жалеть о том, что бросила меня и т.п. Пару дней мы отлично проводили время — целовались, обнимались, вместе ходили к друзьям. Но потом я опять начал совершать прежние ошибки, и она от меня отстранилась. Пришлось начинать всё заново.</p>

                                <p>И вот прошло 3 недели. <b>Мы хорошо общаемся с друг другом, говорим на интимные темы</b>, даже вместе встретили у друзей  Новый год.</p>

                                <p>В общем, <b>мы решили начать все с начала и восстановить наши отношения</b>. Я знаю, что курс еще во многом мне поможет, ведь в нем много советов о том, как флиртовать и как соблазнять девушку.</p>
                            </div>
                        </div>
                        <div class="review_item_bottom">
                            <div class="review_item_bottom_decore"></div>
                        </div>
                    </li>
                    <li class="review_item">
                        <div class="review_item_top">
                            <div class="review_item_autor">
                                <img src="/img/vd/5.jpg" alt="комментатор" class="review_item_autor_photo">
                                <div class="review_item_autor_name">
                                    <span>Андрей Раздорский </span>
                                    <strong><a href="mailto:a_razdorskiy@mail.ru">a_razdorskiy@mail.ru </a></strong>
                                </div>
                            </div>
                            <div class="review_item_text">
                                <h4 class="review_item_text_title">Наши отношения возобновились, и у нас большие планы на будущее</h4>
                                <p><i>Моя история очень нестандартная</i>. Девушка нашла себе парня в соц сетях и готовилась переехать в другую страну. <b>У меня мало было мало времени, и я доверился Даниле</b>.</p>
                                <p>Спасибо за курс) Не думал, но он действительно сработал!)) Делал всё чётко, как ты говорил. Ситуация у меня была не простая, поэтому сомневался. Так вот, <b>у нас был секс уже 2 встречи и вижу, что она скучает тоже</b>. Наши отношения возобновились, и у нас большие планы на будущее.  Верьте Даниле, и вы вернёте свою любимую.</p>
                            </div>
                        </div>
                        <div class="review_item_bottom">
                            <div class="review_item_bottom_decore"></div>
                        </div>
                    </li>
                    <li class="review_item">
                        <div class="review_item_top">
                            <div class="review_item_autor">
                                <img src="/img/vd/4.jpg" alt="комментатор" class="review_item_autor_photo">
                                <div class="review_item_autor_name">
                                    <span>Юрий Косенко, Минск </span>
                                    <strong><a href="mailto:kosenko.yur@yandex.ru">kosenko.yur@yandex.ru </a></strong>
                                </div>
                            </div>
                            <div class="review_item_text">
                                <h4 class="review_item_text_title">1.5 месяца -- и мы снова вместе</h4>
                                <p>Хочу поделиться своим успехом. Как и в большинстве историй, моя девушка ушла из-за ревности. Спасибо Даниле за консультации. Он отличный специалист в этой теме! 1.5 месяца -- и мы снова вместе. <b>Курс работает, и никакого развода</b>.</p>
                            </div>
                        </div>
                        <div class="review_item_bottom">
                            <div class="review_item_bottom_decore"></div>
                        </div>
                    </li>
                    <li class="review_item">
                        <div class="review_item_top">
                            <div class="review_item_autor">
                                <img src="/img/vd/3.jpg" alt="комментатор" class="review_item_autor_photo">
                                <div class="review_item_autor_name">
                                    <span>Игорь Притыка, Алчевск</span>
                                    <strong><a href="mailto:prityka2018@yandex.ru">prityka2018@yandex.ru </a></strong>
                                </div>
                            </div>
                            <div class="review_item_text">
                                <h4 class="review_item_text_title">Все реально стало работать!.. Она то делает мне комплименты, то пытается вызвать во мне ревность</h4>
                                <p>Мы расстались с девушкой полгода назад. Три месяца я пытался ее уговорить вернуться. <b>Она злилась и игнорировала меня</b>.</p>

                                <p>Я начал искать методы в интернете и доверился курсу Данилы. Данила, спасибо за курс! Все реально стало работать! Я сам вижу, что она то делает мне комплименты, то пытается вызвать во мне ревность. Я естественно не поддаюсь!</p>

                                <p>Супер, <b>без основного и дополнительного курса я бы и дальше делал абсолютно бессмысленные поступки</b>, а так прям, понимаю, что вроде все делаю не напрасно.</p>
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

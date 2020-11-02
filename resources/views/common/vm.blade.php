@extends('common.layouts.landing')

@section('title', 'Как вернуть мужа')

@section('content')
<div class="page-wrapper container-fluid">

@include('common._parts-landing.header')

    <div class="box_n3 row">
        <div class="box_n3_mask"></div>
        <div class="container">
            <div class="box_n3_inners">
                <h3 class="n13_title">Узнай секрет, как легко вернуть мужа</h3>
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
                        <iframe width="576" height="324" src="https://www.youtube.com/embed/a8zNo-6BNKc?rel=0&amp;controls=0&amp;showinfo=0&amp;enablejsapi=1&amp;html5=1" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen="" id="video"></iframe>
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
                                <img src="http://cdn.delichev.com/delichev_lp/img/5.jpg" alt="комментатор" class="review_item_autor_photo">
                                <div class="review_item_autor_name">
                                    <span>Татьяна, Омск   </span>
                                    <strong><a href="mailto:fimosha123@mail.ru">fimosha123@mail.ru </a></strong>
                                </div>
                            </div>
                            <div class="review_item_text">
                                <h4 class="review_item_text_title">Сначала колебалась, боялась, что это лохотрон, но боль была столь высока, что рискнула…</h4>
                                <p>Моя душа разрывалась на части, и я не знала, как взять себя в руки. </p>
                                <p>Потом мне на почту пришла ссылка, я прослушала курс. Все, что Данила рекомендовал, четко исполняла, т.е. <i>поменяла свое поведение</i>. И все пошло как надо! Постепенно мы помирились. Отношения наладились, <strong>сначала подружились, потом на более интимные перешли</strong>. И вот мы снова вместе!</p>
                                <p>Не устаю благодарить за то, что я не побоялась доверится Даниле. Спасибо ему огромное. Без него бы я так и оставалась бы с раздавленной душой. Сейчас осознала все свои ошибки, которые стараюсь не допускать. <strong>Люблю и любима!</strong> Спасибо, ДАНИЛ! <br>
                                    Если кому нужны подробности или подтверждения, пишите мне.
                                </p>
                            </div>
                        </div>
                        <div class="review_item_bottom">
                            <div class="review_item_bottom_decore"></div>
                        </div>
                    </li>
                    <li class="review_item">
                        <div class="review_item_top">
                            <div class="review_item_autor">
                                <img src="http://cdn.delichev.com/delichev_lp/img/1.jpg" alt="комментатор" class="review_item_autor_photo">
                                <div class="review_item_autor_name">
                                    <span>Наталья, Омск  </span>
                                    <strong><a href="mailto:marfa7388@mail.ru">marfa7388@mail.ru </a></strong>
                                </div>
                            </div>
                            <div class="review_item_text">
                                <h4 class="review_item_text_title">Я сомневалась, что получится его вернуть, и все же я это сделала</h4>
                                <p>Даниил спасибо огромное! Не скажу, что все гладко, но мы живем вместе. Шлю наше праздничное фото. Муж сказал, что сделал ошибку, сейчас все осознал: главное в его жизни -- я и наш сын.</p>
                                <p>Девочки, если ваш муж ушел к другой, и вы потеряли надежду, не отчаивайтесь -- курс Данилы Деличева «Как вернуть мужа» обязательно вам поможет, как помогает мне!</p>
                            </div>
                        </div>
                        <div class="review_item_bottom">
                            <div class="review_item_bottom_decore"></div>
                        </div>
                    </li>
                    <li class="review_item">
                        <div class="review_item_top">
                            <div class="review_item_autor">
                                <img src="img/vm/3.jpg" alt="комментатор" class="review_item_autor_photo">
                                <div class="review_item_autor_name">
                                    <span>Наталья, Брянск    </span>
                                    <strong><a href="mailto:tatka4@bk.ru">tatka4@bk.ru </a></strong>
                                </div>
                            </div>
                            <div class="review_item_text">
                                <h4 class="review_item_text_title">Это нельзя рассказать в двух словах, это нужно попробовать самой!</h4>
                                <p>Мне помог Данил Деличев. Я благодарна ему за этот курс. <strong>На курсе я узнала то, что не находила ни в одном источнике.</strong> При этом всё было очень чётко, ясно и понятно. Он не давал волшебные «таблетки», но и не говорил, что ничего не получится. Под его руководством я выполняла определённые шаги. <strong>Муж остался, и теперь мы вместе, и отношения совершенно другие!</strong> </p>
                                <p>Всем советую курс Данилы, даже тем женщинам, у которых муж еще не ушел, просто есть трудности в семье – там очень ценная информация имеется, причём <strong>навыки, которые он даёт, можно развивать сколько угодно</strong>. И цена также приемлемая. Кому важно узнать подробнее, с удовольствием отвечу. </p>
                            </div>
                        </div>
                        <div class="review_item_bottom">
                            <div class="review_item_bottom_decore"></div>
                        </div>
                    </li>
                    <li class="review_item">
                        <div class="review_item_top">
                            <div class="review_item_autor">
                                <img src="http://cdn.delichev.com/delichev_lp/img/11.jpg" alt="комментатор" class="review_item_autor_photo">
                                <div class="review_item_autor_name">
                                    <span>Мария Суворова, г.Омск     </span>
                                    <strong><a href="mailto:ya.hasinta@yandex.ru">ya.hasinta@yandex.ru </a></strong>
                                </div>
                            </div>
                            <div class="review_item_text">
                                <h4 class="review_item_text_title">Ваши курсы стали той первой соломинкой надежды, за которую цепляется утопающий</h4>
                                <p>Данил, я хочу выразить Вам огромную благодарность за Вашу работу. На определенном этапе Ваши курсы стали той первой соломинкой надежды, за которую цепляется утопающий. Они действительно мне помогли вернуть мужа.</p>
                                <p>Курс, который перевернул действительно мое отношение к ситуации – «Как простить обиды». И мне кажется именно включив его в основной курс, как самый первоначальный этап, добиться успеха будет проще. А самое главное, на мой взгляд, — это вернуть женщине любовь к себе, к пониманию своей женской сути, к тому, чтобы абсолютно принять себя, а отсюда - и окружающий мир, и мужа-"подлеца" :)</p>
                                <p>…Ценность отношений после этого для меня изменилась. На первом месте у меня - Я. И я не изменилась внешне, не похудела, не помолодела, но глаза сияют. И я не боюсь жить, не боюсь остаться без мужа, не боюсь жить с мужем, не боюсь. Просто живу, наслаждаюсь каждой минутой, радуюсь, и <strong>я счастлива</strong>. От счастливых женщин мужчины редко уходят :)))</p>
                            </div>
                        </div>
                        <div class="review_item_bottom">
                            <div class="review_item_bottom_decore"></div>
                        </div>
                    </li>
                    <li class="review_item">
                        <div class="review_item_top">
                            <div class="review_item_autor">
                                <img src="http://cdn.delichev.com/delichev_lp/img/9.jpg" alt="комментатор" class="review_item_autor_photo">
                                <div class="review_item_autor_name">
                                    <span>Наталья Ян, Краснодар     </span>
                                    <strong><a href="mailto:td_natali@mail.ru">td_natali@mail.ru </a></strong>
                                </div>
                            </div>
                            <div class="review_item_text">
                                <h4 class="review_item_text_title">Я искала много методов по его возврату и спасибо, что встретила курс Данилы Деличева.</h4>
                                <p>Когда муж ушел, думала умру от переживаний и страданий. Стала искать в Интернете статьи как вернуть мужа, пока не наткнулась на курс Данилы Деличева. Заказала его и уже через час слушала.</p>
                                <p>Я все проделала, что Данил советовал, правда большую часть по телефону, муж не хотел встречаться. И при первой встрече <strong>он сказал, что я шикарно выгляжу. Я сама чувствовала свою энергетику. </strong>Муж признался, что хочет жить моими эмоциями, чтоб я ему рассказывала о своих чувствах желаниях постоянно.</p>
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

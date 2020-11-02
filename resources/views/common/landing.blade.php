@extends('common.layouts.landing')

@section('title', 'Как вернуть любимого человека')

@section('content')

<div class="page-wrapper container-fluid">

@include('common._parts-landing.header')

    <div class="box_n18 row">
        <div class="box_n18_mask"></div>
        <div class="container">
            <div class="box_n18_inners">
                <h1 class="n18_title"><a href="#video" class="smoothScroll">Узнайте секрет, как вернуть <br> любимого человека!</a></h1>
                <div class="n18_info">
                    <p>Я хочу вас уверить, что во всех ситуациях есть выход. И не нужно терять время, полагая, что ситуация разрешится сама собой. Начните решать свою проблему уже сейчас. Ведь затягивая время, вернуть чувства намного сложнее.</p>
                    <p>Начните с прослушивания бесплатных материалов, чтобы сделать первый большой шаг к решению вашей ситуации. </p>
                </div>
                <ul class="n18_more">
{{--                    <li class="n18_more_item"><a href="/vm" class="n18_more_item_link">Как вернуть мужа <span class="n18_more_item_cost">2990 ₽</span> </a></li>--}}
                    <li class="n18_more_item"><a href="/vm" class="n18_more_item_link">Тестовый ОК ВП<span class="n18_more_item_cost">2900 ₽</span> </a></li>
                    <li class="n18_more_item"><a href="/vd" class="n18_more_item_link">Как вернуть девушку<span class="n18_more_item_cost">2990 ₽</span></a></li>
                    <li class="n18_more_item"><a href="/vz" class="n18_more_item_link">Как вернуть жену<span class="n18_more_item_cost">3495 ₽</span></a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="box_n5 row">
        <div class="box_n5_mask"></div>
        <div class="container">
            <div class="box_n5_inners">
                <ul class="n18_achievements">
                    <li class="n18_achievements_item">
                        <span class="n18_achievements_item_value">12562</span>
                        <span class="n18_achievements_item_description">счастливых <br> пар</span>
                    </li>
                    <li class="n18_achievements_item">
                        <span class="n18_achievements_item_value">13</span>
                        <span class="n18_achievements_item_description">лет <br> практики</span>
                    </li>
                    <li class="n18_achievements_item">
                        <span class="n18_achievements_item_value">8</span>
                        <span class="n18_achievements_item_description">лет в <br> интернете</span>
                    </li>
                    <li class="n18_achievements_item">
                        <span class="n18_achievements_item_value">17427</span>
                        <span class="n18_achievements_item_description">прошедших <br> курс</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="box_n3 row">
        <div class="box_n3_mask"></div>
        <div class="container">
            <div class="box_n3_inners">
                <h3 class="n13_title">Обо мне и о моих проектах</h3>
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
                        <iframe width="576" height="324" src="https://www.youtube.com/embed/Z8VBn1xGCto?rel=0&amp;controls=0&amp;showinfo=0&amp;enablejsapi=1&amp;html5=1" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen="" id="video"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="box_n5 row">
        <div class="box_n5_mask"></div>
        <div class="container">
            <div class="box_n5_inners">
                <p>Меня зовут Данила Деличев. Я профессиональный психотерапевт. </p>
                <p>За 12 лет своей практики провел более 6000 консультаций по вопросам личных и семейных отношений. Мною накоплен очень богатый опыт, благодаря которому я помог многим людям справиться даже с самыми тяжелыми ситуациями, вернуть любимых, спасти семью. Я так же создал несколько авторских он-лайн курсов по этой теме. </p>
                <p>Если вы оказались в тупике и не знаете, что делать, чтобы вернуть своего любимого человека, я буду рад вам в этом помочь.</p>
            </div>
        </div>
    </div>
    <section class="box_n11 row">
        <div class="box_n11_mask"></div>
        <div class="container">
            <div class="box_n11_inners">
                <h3 class="n11_title">Они уже вернули своих любимых: </h3>
                <div class="n11_longtitle"></div>
                <ul class="review">
                    <li class="review_item">
                        <div class="review_item_top">
                            <div class="review_item_autor">
                                <img src="https://cdn.delichev.com/delichev_lp/img/1.jpg" alt="комментатор" class="review_item_autor_photo">
                                <div class="review_item_autor_name">
                                    <span>Наталья, Омск  </span>
                                    <strong><a href="mailto:marfa7388@mail.ru">marfa7388@mail.ru </a></strong>
                                </div>
                            </div>
                            <div class="review_item_text">
                                <h4 class="review_item_text_title">Я сомневалась, что получится его вернуть, и все же я это сделала</h4>
                                <p>Даниил спасибо огромное! Не скажу, что все гладко, но мы живем вместе. Шлю наше фото. Сказал, что сделал ошибку, сейчас все осознал: главное в его жизни -- я и наш сын. <strong>Девочки, курс Данилы работает!</strong> Если есть сомнения – пишите, поделюсь своим впечатлением.</p>
                            </div>
                        </div>
                        <div class="review_item_bottom">
                            <div class="review_item_bottom_decore"></div>
                        </div>
                    </li>
                    <li class="review_item">
                        <div class="review_item_top">
                            <div class="review_item_autor">
                                <img src="https://cdn.delichev.com/delichev_lp/img/2.jpg" alt="комментатор" class="review_item_autor_photo">
                                <div class="review_item_autor_name">
                                    <span>Александр, г. Северодвинск </span>
                                    <strong><a href="mailto:alexzee666@gmail.com">alexzee666@gmail.com</a></strong>
                                </div>
                            </div>
                            <div class="review_item_text">
                                <h4 class="review_item_text_title">Это бомба. Спасибо за курс!</h4>
                                <p>Данила, Ваш курс мне очень помог. Черная полоса пройдена благодаря Вам, и мы с супругой до сих пор живем вместе и очень счастливы. Спасибо. Можете опубликовать фото и мои контакты. Буду рад помочь.</p>
                            </div>
                        </div>
                        <div class="review_item_bottom">
                            <div class="review_item_bottom_decore"></div>
                        </div>
                    </li>
                    <li class="review_item">
                        <div class="review_item_top">
                            <div class="review_item_autor">
                                <img src="https://cdn.delichev.com/delichev_lp/img/3.jpg" alt="комментатор" class="review_item_autor_photo">
                                <div class="review_item_autor_name">
                                    <span>Олександр Жилка, Рівне Україна  </span>
                                    <strong><a href="mailto:zhylka11@gmail.com">zhylka11@gmail.com</a></strong>
                                </div>
                            </div>
                            <div class="review_item_text">
                                <h4 class="review_item_text_title">Метод Деличева по-настоящему работает.</h4>
                                <p>Спасибо тебе, Данила. Мы – вместе. Шлю тебе эту фотографию, которая сильнее сотни слов</p>
                                <p>Тем, кто сомневается, могу уверенно сказать: с трудностями можно справиться, если есть такая поддержка. Кому сложно решиться и поверить в это, просто напишите мне, отвечу.</p>
                            </div>
                        </div>
                        <div class="review_item_bottom">
                            <div class="review_item_bottom_decore"></div>
                        </div>
                    </li>
                    <li class="review_item">
                        <div class="review_item_top">
                            <div class="review_item_autor">
                                <img src="https://cdn.delichev.com/delichev_lp/img/4.jpg" alt="комментатор" class="review_item_autor_photo">
                                <div class="review_item_autor_name">
                                    <span>Евгений, Москва, </span>
                                    <strong><a href="mailto:4.8is@inbox.ru">4.8is@inbox.ru</a></strong>
                                </div>
                            </div>
                            <div class="review_item_text">
                                <h4 class="review_item_text_title">Я уже вернул жену… Все твои рекомендации -- это то, чего не получишь от друзей и близких</h4>
                                <p><strong>Даниила!))) Ты гений. Твой курс работает по полной.</strong> Я уже вернул жену, вернул благодаря тебе. Все твои рекомендации, это то, чего не получишь от друзей и близких. Я слушал только тебя и получил отличный результат. Хотелось бы помогать тебе. Спасибо!!!! </p>
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
                                <img src="https://cdn.delichev.com/delichev_lp/img/5.jpg" alt="комментатор" class="review_item_autor_photo">
                                <div class="review_item_autor_name">
                                    <span>Татьяна. Г. Омск.  </span>
                                    <strong><a href="mailto:fimosha123@mail.ru">fimosha123@mail.ru</a></strong>
                                </div>
                            </div>
                            <div class="review_item_text">
                                <h4 class="review_item_text_title">Сначала колебалась, боялась, что это лохотрон, но боль была столь высока, что рискнула. </h4>
                                <p>Мне на почту пришла ссылка, я прослушала курс. Все, что Данила рекомендовал, четко исполняла, т.е. поменяла свое поведение. И все пошло как надо! Постепенно мы помирились. Отношения наладились, <strong>сначала подружились, потом на более интимные перешли</strong>. И вот мы снова вместе! </p>
                                <p>Не устаю благодарить за то, что я не побоялась доверится Даниле. Спасибо ему огромное. Без него бы я так и оставалась бы с раздавленной душой. Сейчас осознала все свои ошибки, которые стараюсь не допускать. <strong>Люблю и любима!</strong> Спасибо, ДАНИЛ!</p>
                            </div>
                        </div>
                        <div class="review_item_bottom">
                            <div class="review_item_bottom_decore"></div>
                        </div>
                    </li>
                    <li class="review_item">
                        <div class="review_item_top">
                            <div class="review_item_autor">
                                <img src="https://cdn.delichev.com/delichev_lp/img/6.jpg" alt="комментатор" class="review_item_autor_photo">
                                <div class="review_item_autor_name">
                                    <span>Влад, Санкт-Петербург  </span>
                                </div>
                            </div>
                            <div class="review_item_text">
                                <h4 class="review_item_text_title">Данила, спасибо огромное. Ты – человек, который спасает не только отношения, но и жизни людей. </h4>
                                <p>Должен признаться, я обязан тебе жизнью, Данила. Ты тот, кто реально спас меня в день, когда я осознал, что не смогу провести еще хотя бы день без нее. Настолько сильно было больно. До сих пор помню состояние как будто время остановилось и все плыло перед глазами, когда стоял на самом краю крыши. Я хотел только одного – избавиться от боли и отчаяния. Слава богу, что тогда остановился. Решил дать себе последний шанс. </p>
                                <p>Не помню, как нашел твое видео, но когда посмотрел, почувствовал, что ты как будто взял меня за руку и вытащил из беспросветного тупика.</p>
                                <p>Одно только то, что я успокоился и поверил в себя - уже стоит большой благодарности! Мне стало ясно, что надежда вернуть ее – есть. Очень помогал в тяжелые моменты аудио сеанс: “Как избавиться от душевной боли”. Да и все советы были в жилу. Она вернулась через полтора месяца. Мое счастье со мной, я ее так люблю!</p>
                                <p>Данила, спасибо огромное. Ты – человек, который спасает не только отношения, но и жизни людей. Когда-нибудь, я думаю, это тебе зачтется. <br>
                                    (Просьба мои контакты не светить по понятным причинам).
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
                                <img src="https://cdn.delichev.com/delichev_lp/img/7.jpg" alt="комментатор" class="review_item_autor_photo">
                                <div class="review_item_autor_name">
                                    <span>Александр Вьюн г. Спасск-Дальний Приморский край  </span>
                                    <strong><a href="mailto:aleksandr.vjun555@mail.ru">aleksandr.vjun555@mail.ru</a></strong>
                                </div>
                            </div>
                            <div class="review_item_text">
                                <h4 class="review_item_text_title">Мы наконец-то снова оба счастливы. </h4>
                                <p>Я вернул свою любимую, хотя ситуация была очень тяжелая, в двух словах не расскажешь.</p>
                                <p>Даю свои подлинные контакты и готов подтвердить лично, что мне действительно помог курс <strong>«Как вернуть девушку»</strong> Данилы Деличева, за что я ему очень благодарен.</p>
                            </div>
                        </div>
                        <div class="review_item_bottom">
                            <div class="review_item_bottom_decore"></div>
                        </div>
                    </li>
                    <li class="review_item">
                        <div class="review_item_top">
                            <div class="review_item_autor">
                                <img src="https://cdn.delichev.com/delichev_lp/img/8.jpg" alt="комментатор" class="review_item_autor_photo">
                                <div class="review_item_autor_name">
                                    <span>Денис Плотников Челябинск  </span>
                                    <strong><a href="mailto:diewithhodir@mail.ru">diewithhodir@mail.ru</a></strong>
                                </div>
                            </div>
                            <div class="review_item_text">
                                <h4 class="review_item_text_title">Признаться, поначалу думал, что метод не мой ;) Но он сработал. </h4>
                                <p>До того, как «наткнулся» на видео Данилы, перепробовал все, цветы, кольцо, стихи…ВСЕ. Она не хотела меня видеть. Даже уже ухажер появился. Не знал, что делать. Разошлись.</p>
                                <p>Когда услышал первую аудиозапись, понял, что уже совершил миллион ошибок. Все надо делать по-другому. Признаться, поначалу думал, что метод не мой ;) Но он сработал.</p>
                                <p>Данила все рассказывает очень понятно и подробно. Рекомендую послушать. Хотя бы для общего развития.</p>
                                <p>А мы 2 месяца назад сошлись, живем теперь душа в душу.</p>
                            </div>
                        </div>
                        <div class="review_item_bottom">
                            <div class="review_item_bottom_decore"></div>
                        </div>
                    </li>
                    <li class="review_item">
                        <div class="review_item_top">
                            <div class="review_item_autor">
                                <img src="https://cdn.delichev.com/delichev_lp/img/9.jpg" alt="комментатор" class="review_item_autor_photo">
                                <div class="review_item_autor_name">
                                    <span>Наталья Ян, Краснодар, </span>
                                    <strong><a href="mailto:td_natali@mail.ru">td_natali@mail.ru</a></strong>
                                </div>
                            </div>
                            <div class="review_item_text">
                                <h4 class="review_item_text_title">Я искала много методов по его возврату и спасибо, что встретила курс Данилы Деличева.  </h4>
                                <p>Я все проделала, правда большую часть по телефону, он не хотел встречаться. И при первой встрече <strong>муж сказал, что я шикарно выгляжу. Я сама чувствовала свою энергетику.</strong> Муж признался, что хочет жить моими эмоциями, чтоб я ему рассказывала о своих чувствах желаниях постоянно.</p>
                            </div>
                        </div>
                        <div class="review_item_bottom">
                            <div class="review_item_bottom_decore"></div>
                        </div>
                    </li>
                    <li class="review_item">
                        <div class="review_item_top">
                            <div class="review_item_autor">
                                <img src="https://cdn.delichev.com/delichev_lp/img/10.jpg" alt="комментатор" class="review_item_autor_photo">
                                <div class="review_item_autor_name">
                                    <span>Сергей Юркин, Москва, </span>
                                    <strong><a href="mailto:sv2233@mail.ru">sv2233@mail.ru</a></strong>
                                </div>
                            </div>
                            <div class="review_item_text">
                                <h4 class="review_item_text_title">Сказала, что я не то, что ей нужно. Вернул после первой недели курса</h4>
                                <p>Моя девушка сказала, что я не то, что ей нужно. Вернул после первой недели курса. По ее словам, она плакала и думала, что профукала отношения.</p>
                                <p>В общем, Даниле, спасибо за курс и письмо, в частности. Он гениален! Мужики, кто это прочитает, мой совет: пытайтесь вернуть, только если понимаете на холодную голову, что потерял</p>
                            </div>
                        </div>
                        <div class="review_item_bottom">
                            <div class="review_item_bottom_decore"></div>
                        </div>
                    </li>
                    <li class="review_item">
                        <div class="review_item_top">
                            <div class="review_item_autor">
                                <img src="https://cdn.delichev.com/delichev_lp/img/11.jpg" alt="комментатор" class="review_item_autor_photo">
                                <div class="review_item_autor_name">
                                    <span>Мария Суворова, г.Омск, </span>
                                    <strong><a href="mailto:ya.hasinta@yandex.ru">ya.hasinta@yandex.ru</a></strong>
                                </div>
                            </div>
                            <div class="review_item_text">
                                <h4 class="review_item_text_title">Ваши курсы стали той первой соломинкой надежды, за которую цепляется утопающий</h4>
                                <p>Данил, я хочу выразить Вам огромную благодарность за Вашу работу. На определенном этапе Ваши курсы стали той первой соломинкой надежды, за которую цепляется утопающий. Они действительно мне помогли вернуть мужа. </p>
                                <p>Курс, который перевернул действительно мое отношение к ситуации – «Как простить обиды». И мне кажется именно включив его в основной курс, как самый первоначальный этап, добиться успеха будет проще. А самое главное, на мой взгляд, - это вернуть женщине любовь к себе, к пониманию своей женской сути, к тому, чтобы абсолютно принять себя, а отсюда - и окружающий мир, и мужа-"подлеца" :) </p>
                                <p>…Ценность отношений после этого для меня изменилась. На первом месте у меня - Я. И я не изменилась внешне, не похудела, не помолодела, но глаза сияют. И я не боюсь жить, не боюсь остаться без мужа, не боюсь жить с мужем, не боюсь. Просто живу, наслаждаюсь каждой минутой, радуюсь, и я счастлива. От счастливых женщин мужчины редко уходят :)))</p>
                            </div>
                        </div>
                        <div class="review_item_bottom">
                            <div class="review_item_bottom_decore"></div>
                        </div>
                    </li>
                    <li class="review_item">
                        <div class="review_item_top">
                            <div class="review_item_autor">
                                <img src="https://cdn.delichev.com/delichev_lp/img/12.jpg" alt="комментатор" class="review_item_autor_photo">
                                <div class="review_item_autor_name">
                                    <span>Дмитрий, Новороссийск, </span>
                                    <strong><a href="mailto:dmitr.kogtev2017@yandex.ru">dmitr.kogtev2017@yandex.ru</a></strong>
                                </div>
                            </div>
                            <div class="review_item_text">
                                <h4 class="review_item_text_title">Послушал курс… появилась надежда!</h4>
                                <p>Много методов перепробовал по совету друзей. Ходил к гадалкам. Все напрасно. Послушал курс... Появилась надежда! <strong>Данила, действительно, впечатляет!</strong> </p>
                                <p>Для тех, кто не верит: Скачай методику. Реально мозги на место встанут. Во всяком случае, ничего не потеряешь.  У меня все получилось, и ты тоже сможешь.  </p>
                            </div>
                        </div>
                        <div class="review_item_bottom">
                            <div class="review_item_bottom_decore"></div>
                        </div>
                    </li>
                    <li class="review_item">
                        <div class="review_item_top">
                            <div class="review_item_autor">
                                <img src="https://cdn.delichev.com/delichev_lp/img/13.jpg" alt="комментатор" class="review_item_autor_photo">
                                <div class="review_item_autor_name">
                                    <span>Натэлла, Санкт-Петербург, </span>
                                    <strong><a href="mailto:popovanatella@yandex.ru">popovanatella@yandex.ru</a></strong>
                                </div>
                            </div>
                            <div class="review_item_text">
                                <h4 class="review_item_text_title">У меня своя новая счастливая жизнь!!! Данила нашёл слова, необходимые в тот момент, когда не хочется жить&gt;</h4>
                                <p>Мой муж твердил мне, что у него нет чувств ко мне. Начала слушать курс Данилы! Он мне очень помог.<strong> Я поняла, что делала не так в своей семье. </strong></p>
                                <p>У меня снова счастливая жизнь!!! <strong>Я изменилась сама и ещё меняюсь.</strong> Данила нашёл слова, необходимые в тот момент, когда не хочется жить, а потом жизнь наладилась. Нужно только поверить в это!!! Это прекрасно!!! Всем счастья и любви!!!</p>
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
    <div class="box_n19 row">
        <div class="box_n19_mask"></div>
        <div class="container">
            <div class="box_n19_inners">
                <img src="https://cdn.delichev.com/delichev_lp/img/delichev.jpg" alt="Данил Деличев" class="n18_info_img">
                <p>Мне приходит огромное количество благодарных отзывов. Я делюсь ими здесь потому, что позитивный опыт укрепляет веру в счастливый исход тем, кому это сейчас нужнее всего.</p>
                <p>Так же я продолжаю отвечать в переписке и на внутренних форумах тем, у кого есть сложные вопросы. Моя команда службы клиентской поддержки внимательна к каждому входящему звонку или письму, потому что я сам когда-то прошел тяжелейший опыт в личной жизни и очень хочу, чтобы как можно больше пар оставались счастливыми вместе. </p>
                <p>С наилучшими пожеланиями,</p>
                <p>Данил Деличев</p>
                <div class="n19_social">
                    <a target="_blank" class="n19_social_link n19_social_inst" href="https://www.instagram.com/d.delichev/"></a><br>
                    <a target="_blank" class="n19_social_link n19_social_vk" href="https://vk.com/d.delichev"></a><br>
                    <a target="_blank" class="n19_social_link n19_social_ok" href="https://ok.ru/profile/571222122352"></a><br>
                    <a target="_blank" class="n19_social_link n19_social_fb" href="https://www.facebook.com/profile.php?id=100023871133089"></a>
                </div>
            </div>
        </div>
    </div>

</div>

@include('common._parts-landing.footer')

@endsection

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dance Studio 54</title>
    {{--<link rel="stylesheet" href="css/style.css">--}}
    {!! Html::style('css/style.css') !!}
    <!--    <link rel="stylesheet" href="css/owl.carousel.css">-->
    {{--<script src="js/jquery-1.7.2.min.js"></script>--}}

    <!--    <script type="text/javascript" src="js/owl.carousel.min.js"></script>-->
    {{--<script src="js/jquery.fullPage.min.js"></script>--}}
    {{--<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>--}}
    {{--<script src="js/jquery.showcase-slider.js"></script>--}}
</head>
<body>
@include('base.header')

{{--<header>--}}
    {{--<div class="h_logo"><a href="/#s_intro">--}}
            {{--{!! HTML::image('images/main_logo_2.png', 'Logo Dance Studio 54' )!!}--}}
            {{--<img src="images/main_logo_2.png">--}}
    {{--</div></a>--}}
    {{--<div class="h_divider"></div>--}}
    {{--<nav>--}}
        {{--<a href="/#s_directions" class="link_01">НАПРАВЛЕНИЯ</div></a>--}}
        {{--<a href="/#s_masters" class="link_02">ХОРЕОГРАФЫ</div></a>--}}
        {{--<a href="/#s_studio" class="link_03">СТУДИЯ</div></a>--}}
        {{--<a href="/#s_application" class="link_04">ЗАПИСЬ НА ОБУЧЕНИЕ</div></a>--}}
        {{--<a href="/#s_inform" class="link_05">НАЙТИ НАС</div></a>--}}
    {{--</nav>--}}
    {{--<div class="h_divider"></div>--}}
    {{--<div class="h_number">8 (4012) 37-74-54</div>--}}
{{--</header>--}}
<div class="main_wrapper">
    @include('sections.s_intro')
    <section id="s_directions" class="section">
        <div class="directions__text-head">
            Мы предлагаем запись на обучение по множеству танцевальных направлений.
            Наши педагоги проводят тренировки как по современным танцам, так и по классической хореографии.
            В нашей студии можно подготовится к мероприятиям различного уровня, от танца в клубе, до профессионального
            выступления на чемпионатах мирового уровня.
        </div>
        <div class="directions__nav">
            <div class="active_dir" id="nv_1">jazz modern</div>
            <div id="nv_2">Go-Go</div>
            <div id="nv_3">jazz funk</div>
            <div id="nv_4">dance show</div>
            <div id="nv_5">strip dance</div>
            <div id="nv_6">latina solo</div>
            <div id="nv_7">disco</div>
            <div id="nv_8">pilates</div>
            <div id="nv_9">stretching</div>
            <div id="nv_10">Хореография</div>
            <div id="nv_0">постановка Свадебного танца
            </div>
        </div>
        <?
        $directionsName = "Jazz Modern";
        ?>
        <div class="directions_text">
            <h1>Jazz Modern</h1>

            <p>Безграничная свобода в выражении себя посредством танца – основная суть направления джаз модерн.
                Движения, свободные от условностей и стилизаций, наиболее полно и правдиво передают душевное состояние
                танцора.
            </p>

            <p>Позитивная энергетика этого танца позволяет раскрыться эмоционально, стать увереннее и чувственнее.
                Разнообразие движений – от легких и плавных до энергичных и резких – поможет телу обрести гибкость и
                пластичность, силу и выносливость.
                В результате занятия джаз модерном позволят Вам не только научиться владеть своим телом, но и
                позаботиться о своей фигуре.</p>
            <ul>
                <a href="javascript:none;">
                    <li class="video">Смотреть видео</li>
                </a>
                <a href="javascript:none;">
                    <li class="applicate">Записаться на Jazz Modern</li>
                </a>
            </ul>
        </div>
        <div class="directions__slider">
            <div class="backscreen" id="bs_0">
                <img src="images/jazz_modern0.png" alt=""/>
            </div>
            <div class="backscreen center" id="bs_1">
                <img src="images/jazz_modern1.png" alt=""/>
            </div>
            <div class="backscreen" id="bs_2">
                <img src="images/jazz_modern2.png" alt=""/>
            </div>
            <div class="backscreen" id="bs_3">
                <img src="images/jazz_modern3.png" alt=""/>
            </div>
            <div class="backscreen" id="bs_4">
                <img src="images/jazz_modern4.png" alt=""/>
            </div>
            <div class="backscreen" id="bs_5">
                <img src="images/jazz_modern5.png" alt=""/>
            </div>
            <div class="backscreen" id="bs_6">
                <img src="images/jazz_modern6.png" alt=""/>
            </div>
            <div class="backscreen" id="bs_7">
                <img src="images/jazz_modern7.png" alt=""/>
            </div>
            <div class="backscreen" id="bs_8">
                <img src="images/jazz_modern8.png" alt=""/>
            </div>
            <div class="backscreen" id="bs_9">
                <img src="images/jazz_modern9.png" alt=""/>
            </div>
            <div class="backscreen" id="bs_10">
                <img src="images/jazz_modern10.png" alt=""/>
            </div>
        </div>
        <svg width="53" height="53">
            <circle r="25" cx="27" cy="27"
                    fill="none" stroke="#dc241c" stroke-width="2" />
            <line x1="40" y1="20" x2="26" y2="34"></line>
            <line x1="15" y1="20" x2="26" y2="34"></line>
        </svg>
    </section>
    <section id="s_masters" class="section">
        <div class="masters__head">В нашей студии преподаванием занимаются опытные хореографы,
            которые прошли не один десяток мастер-классов, состоялись как профессиональные
            танцоры и подготовили множество юных спортсменов к соревнованиям и выступлениям.
        </div>
        <div class="masters__teacher">
            <?
            for ($i = 0; $i < 6; $i++) {
            ?>
            <div class="teachers">
                <div class="ico">
                    <img src="images/foto_teacher.png" alt="foto_teacher"/>
                </div>
                <div class="description">
                    <h1>Ксения
                        Тагильцева</h1>

                    <p>Замечательный хореограф, опыт более 10 лет, победительница таких соревнований
                        как FGW Dance Competition и многих других, зарекомендовала себя как хороший лидер.</p>
                    <a class="more" href="javascript:none">Узнать больше</a></br>
                    <a class="applicate" href="javascript:none;">Записаться к этом у хореографу

                    </a>
                </div>
            </div>

            <?
            }
            ?>
        </div>
        <svg width="53" height="53">
            <circle r="25" cx="27" cy="27"
                    fill="none" stroke="#dc241c" stroke-width="2" />
            <line x1="40" y1="20" x2="26" y2="34"></line>
            <line x1="15" y1="20" x2="26" y2="34"></line>
        </svg>

    </section>
    <section id="s_studio" class="section">
        <div class="studio__head">
            Мы находимся в постоянном развитии и самосовершенствовании.
            Жизнь в студии кипит и пополняет наши альбомы отличными
            моментами с соревнований или выступлений.
        </div>
        <div class="studio__information">
            <?
            for ($i = 0; $i < 6; $i++) {
            ?>
            <div class="studios">
                <div class="foto">
                    <img src="images/temp-events.jpg" alt="90e"/>
                </div>
                <div class="description">
                    <h1>Дискотека
                        90-х</h1>

                    <p>Выступление с Иванушками.</p>

                    <p class="data">10.01.2014</p>
                    <a class="more" href="javascript:none">Узнать больше</a></br>
                    </a>
                </div>
            </div>

            <?
            }
            ?>
        </div>
        <svg width="53" height="53">
            <circle r="25" cx="27" cy="27"
                    fill="none" stroke="#dc241c" stroke-width="2" />
            <line x1="40" y1="20" x2="26" y2="34"></line>
            <line x1="15" y1="20" x2="26" y2="34"></line>
        </svg>
    </section>
    <section id="s_application" class="section">
        <div class="application__head">Сейчас идет набор в группы</div>
        <div class="application__inform">
            <div class="now">
                <?
                for ($i = 0; $i < 3; $i++) {
                ?>
                <div>
                    <h1>Strip / Go-go</h1>

                    <p>Условия набора</p>
                    <p class="data">
                        Девушки, 16 - 22 года;</br>
                        Спортивное телосложение;</br>
                        Тренировки пн-чт, с 16:00 до 18:00;</br>
                        Зал на пр.Мира, тц "Спутник" , 4 этаж;</br>
                    </p>
                    <a class="applicate" href="javascript:none">Записаться на Strip / Go-go</a>

                </div>


                <?
                }
                ?>
            </div>
            <div class="divider">

            </div>
            <div class="image-b"><img src="images/button_big_lines.png"/></div>
            <div class="load">
                <a href="javascript:none;">
                    Скачать
                    расписание
                    тренировок</a>

            </div>

        </div>
        <div class="application__form">
            <form action="handler.php" id="send_form">
                <div class="form-subheader">Запись на обучение</div>
                <div class="form-left">
                    <div class="line_1">
                        <p>ФИО</p>
                        <input type="text"/>
                    </div>
                    <div class="line_2">
                        <p>Дата рождения</p>
                        <input type="date"/>
                    </div>
                    <div class="line_3">
                        <p id="l_31">Рост (см)</p>
                        <input type="text" id="l_32"/>
                        <p id="l_33">Вес (кг)</p>
                        <input type="text" id="l_34"/>
                    </div>
                    <div class="line_4">
                        <p>Контактный телефон</p>
                        <input type="text" placeholder="+7(___) ___ __ __" id="user_phone" class="rfield" />
                    </div>
                </div>
                <div class="form-middle">
                    <div>

                        <p>Выберите танцевальное направление</p>
                        <select name="" id="send_direction">
                            <option value="">Juzz Funk</option>
                            <option value="">Dance Show</option>
                            <option value="">Disco</option>
                        </select>

                    </div>
                    <div>

                        <p>Выберите удобный для Вас зал</p>
                        <select name="" id="send_location">
                            <option value="">студия На «МИРА»</option>
                            <option value="">студия На «ГОРЬКОГО»</option>
                        </select>

                    </div>

                </div>
                <div class="form-right">
                    <a href="#" onclick="$('#send_form').submit(); return false;">
                        <img src="images/button_big_check.png" alt="Запись на обучение в танцкласс"/>
                        <p>Отправить заявку</p>
                    </a>
                </div>
            </form>
        </div>
        <svg width="53" height="53">
            <circle r="25" cx="27" cy="27"
                    fill="none" stroke="#dc241c" stroke-width="2" />
            <line x1="40" y1="20" x2="26" y2="34"></line>
            <line x1="15" y1="20" x2="26" y2="34"></line>
        </svg>
    </section>
    <section id="s_inform" class="section">
        <div class="inform__studio">
            <div class="inform">
                <div class="image">
                    <img src="images/studio_mira.png" alt="Танцевальная студия на проспекте Мира"/>
                </div>
                <div class="description">
                    <h1>студия На «Мира»</h1>
                    <p>Адрес: пр-т Мира, д. 61, ТЦ СПУТНИК, 4 этаж</p>
                    <p>
                        Ориентир: Парк Калинина
                    </p>

                    <p class="phone">Телефон: 8 (4012) 37-74-54</p>
                </div>
            </div>
            <div class="location" id="st_01">

            </div>
        </div>
        <div class="inform__studio line2">
            <div class="inform">
                <div class="image">
                    <img src="images/studio_gorkiy.png" alt="Танцевальная студия на улице Горького"/>
                </div>
                <div class="description">
                    <h1>студия На «Горького»</h1>

                    <p>Адрес: ул. Горького 170В</p>
                    <p>
                        Ориентир: Магазин «Семья»
                    </p>

                    <p class="phone">Телефон: 8 (4012) 37-74-54</p>
                </div>
            </div>
            <div class="location" id="st_02"></div>
        </div>
    </section>
    <footer>
        <div class="footer__info">
            <p>Dance 54 Studio, школа современных танцев в Калининграде
            </p>

            <p> © 2015
            </p>
        </div>
        <div class="footer__developer">
            Сделано в студии <a href="#">xxXxxxxx</a>
        </div>
    </footer>
</div>

{!! Html::script('js/jquery-1.7.2.min.js') !!}
{!! Html::script('js/jquery.fullPage.min.js') !!}
{!! Html::script('https://maps.googleapis.com/maps/api/js?v=3.exp') !!}
{!! Html::script('js/jquery.showcase-slider.js') !!}
{!! Html::script('js/main.js') !!}
</body>

</html>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dance Studio 54</title>
    <link rel="stylesheet" href="css/style.css">
    <!--    <link rel="stylesheet" href="css/owl.carousel.css">-->
    <script src="js/jquery-1.7.2.min.js"></script>
    <!--    <script type="text/javascript" src="js/owl.carousel.min.js"></script>-->
    <script src="js/jquery.fullPage.min.js"></script>
</head>
<body>
<header>
    <div class="h_logo"><img src="images/main_logo_2.png"></div>
    <div class="h_divider"></div>
    <nav>
        <div class="link_01">НАПРАВЛЕНИЯ</div>
        <div class="link_02">ХОРЕОГРАФЫ</div>
        <div class="link_03">СТУДИЯ</div>
        <div class="link_04">ЗАПИСЬ НА ОБУЧЕНИЕ</div>
        <div class="link_05">НАЙТИ НАС</div>
    </nav>
    <div class="h_divider"></div>
    <div class="h_number">8 (4012) 37-74-54</div>
</header>
<div class="main_wrapper">
    <section class="s_intro section">
        <div class="intro__main_logo"></div>
        <article class="intro__main_text">
            <h1>Современные танцы</br>
                и хореография </br>
                в калининграде</h1>

            <p>Студия «Dance54» ставит танцевальные постановки и готовит </br>профессиональных танцоров с 2012 года.</p>

            <p>Наша студия - это не только большой выбор стилей и направлений,
                талантливые педагоги, индивидуальный подход к обучению,
                но и удобные залы в разных частях города Калининграда.</p>

            <p> У нас занимаются девочки и мальчики, девушки и парни, женщины и мужчины.
                Мы рады всем, кто любит танцы так же сильно, как любим мы.</p>

        </article>
        <div class="intro__backscreen"></div>
    </section>
    <section class="s_directions section">
        <div class="directions__text-head">
            Мы предлагаем запись на обучение по множеству танцевальных направлений.
            Наши педагоги проводят тренировки как по современным танцам, так и по классической хореографии.
            В нашей студии можно подготовится к мероприятиям различного уровня, от танца в клубе, до профессионального
            выступления на чемпионатах мирового уровня.
        </div>
        <div class="directions__nav">
            <div class="nav_1 active_dir">jazz modern</div>
            <div class="nav_2">Go-Go</div>
            <div class="nav_3">jazz funk</div>
            <div class="nav_4">dance show</div>
            <div class="nav_5">strip dance</div>
            <div class="nav_6">latina solo</div>
            <div class="nav_7">disco</div>
            <div class="nav_8">pilates</div>
            <div class="nav_9">stretching</div>
            <div class="nav_10">Хореография</div>
            <div class="nav_11">постановка Свадебного танца
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
                    <li class="content_video"></li>
                </a>
                <a href="javascript:none;">
                    <li class="content_applicate">Записаться на Jazz Modern</li>
                </a>
            </ul>
        </div>
        <div class="directions__slider">
            <div class="backscreen"></div>
            <div class="backscreen center"></div>
            <div class="backscreen"></div>
            <div class="backscreen"></div>
            <div class="backscreen"></div>
            <div class="backscreen"></div>
            <div class="backscreen"></div>
            <div class="backscreen"></div>
            <div class="backscreen"></div>
            <div class="backscreen"></div>
            <div class="backscreen"></div>
            <div class="backscreen"></div>
        </div>

    </section>
    <section class="s_studio section">
        <div class="studio__head">В нашей студии преподаванием занимаются опытные хореографы,
            которые прошли не один десяток мастер-классов, состоялись как профессиональные
            танцоры и подготовили множество юных спортсменов к соревнованиям и выступлениям.
        </div>
        <div class="studio__teacher">
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

    </section>
    <section class="s_event section">
        <div class="event__head">Мы находимся в постоянном развитии и самосовершенствовании.
            Жизнь в студии кипит и пополняет наши альбомы отличными моментами с соревнований или выступлений.
        </div>
        <div class="event__information">
            <?
            for ($i = 0; $i < 6; $i++) {
                ?>
                <div class="events">
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
    </section>
    <section class="s_application section">
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
                                Девушки, 16 - 22 года;
                                Спортивное телосложение;
                                Тренировки пн-чт, с 16:00 до 18:00;
                                Зал на пр.Мира, тц "Спутник" , 4 этаж;
                                </p>
                                <a class="applicate" href="javascript:none">Записаться на Strip / Go-go</a></br>
                                </a>
                                    </div>


                    <?
                }
                ?>
            </div>
            <div class="divider"></div>
            <div class="load">
                Скачать
                расписание
                тренировок
            </div>

        </div>
        <div class="application__form">
            <form action="handler.php" id="send_form">
                <div class="form-left">
                    <div>
                        <p>ФИО</p>
                        <input type="text"/>
                    </div>
                    <div>
                        <p>Дата рождения</p>
                        <input type="date"/>
                    </div>
                    <div>
                        <p>Рост (см)</p>
                        <input type="text"/>
                        <p>Вес (кг)</p>
                        <input type="text"/>
                    </div>
                    <div>
                        <p>Контактный телефон</p>
                        <input type="text" placeholder="(___) ___ __ __" id="user_phone" class="rfield" />
                    </div>
                </div>
                <div class="form-middle">
                    <p>Выберите танцевальное направление</p>
                    <select name="" id="send_direction">
                        <option value="">Juzz Funk</option>
                        <option value="">Dance Show</option>
                        <option value="">Disco</option>
                    </select>
                    <p>Выберите удобный для Вас зал</p>
                    <select name="" id="send_location">
                        <option value="">студия На «МИРА»</option>
                        <option value="">студия На «ГОРЬКОГО»</option>
                    </select>
                </div>
                <div class="form-right">
                    <a href="#" onclick="$('#send_form').submit(); return false;">
                        <img src="images/button_big_check.png" alt="Запись на обучение"/>
                        <p>Отправить заявку</p>
                    </a>
                </div>
            </form>
        </div>

    </section>
    <section class="s_inform section"></section>
</div>
<script>
    function slider(direct) {
        setTimeout(function () {
            $(".backscreen .center").removeClass("center");
            if (direct === "last") {
                $(".directions__slider").css({left: "8.3333%"}).prepend($(".directions__slider div:last"));
            }
            else {
                $(".directions__slider").css({left: "-8.3333%"}).append($(".directions__slider div:first"));
            }
        }, 250);

    }

    //        $('.s_directions .directions__nav .nav_1').click(function(){
    //            slider();
    //        });
    $(document).ready(function () {
        $('.main_wrapper').fullpage();

        $('.nav_1').click(function () {
                slider('last');
            }
        );
        $('.nav_2').click(function () {
                slider('first');
            }
        );
    });

</script>
</body>

</html>
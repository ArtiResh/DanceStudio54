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
                В нашей студии можно подготовится к мероприятиям различного уровня, от танца в клубе, до профессионального выступления на чемпионатах мирового уровня.
            </div>
            <div class="directions__nav">
                <div class="nav_01 active_dir">jazz modern</div>
                <div class="nav_02">Go-Go</div>
                <div class="nav_03">jazz funk</div>
                <div class="nav_04">dance show</div>
                <div class="nav_05">strip dance</div>
                <div class="nav_06">latina solo</div>
                <div class="nav_07">disco</div>
                <div class="nav_08">pilates</div>
                <div class="nav_09">stretching</div>
                <div class="nav_10">Хореография</div>
                <div class="nav_11">постановка Свадебного танца
                </div>
            </div>
            <?
                $directionsName="Jazz Modern";
            ?>
            <div class="directions_text">
                <h1>Jazz Modern</h1>

                <p>Безграничная свобода в выражении себя посредством танца – основная суть направления джаз модерн.
                    Движения, свободные от условностей и стилизаций, наиболее полно и правдиво передают душевное состояние танцора.
                </p>

                <p>Позитивная энергетика этого танца позволяет раскрыться эмоционально, стать увереннее и чувственнее.
                    Разнообразие движений – от легких и плавных до энергичных и резких – поможет телу обрести гибкость и пластичность, силу и выносливость.
                    В результате занятия джаз модерном позволят Вам не только научиться владеть своим телом, но и позаботиться о своей фигуре.</p>
                <ul>
                    <a href="javascript:none;"><li class="content_video"></li></a>
                    <a href="javascript:none;"><li class="content_applicate">Записаться на Jazz Modern</li></a>
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
        <section class="s_studio section"></section>
        <section class="s_application section"></section>
        <section class="s_information section"></section>
    </div>
    <script>
        $(document).ready(function() {
           $('.main_wrapper').fullpage();
            setTimeout(function(){
                if(direction == "+"){
                    $(".slider_promo_au").css({left:"-740px"}).prepend($(".slider_promo_au li:last"));
                    $(".slider_promo_au").animate({left:direction+"=740"}, 500, 'easeOutBack', function(){
                        $(".item_img").removeClass("blur");
                        $(".item_img:first").addClass("active");
                        $(".bg:first").addClass("active");
                        $(".bg").removeClass("blur");
                    });
                } else {
                    $(".slider_promo_au").animate({left:direction+"=740"}, 500, 'easeOutBack', function(){
                        $(this).css({left:"0"}).append($(".slider_promo_au li:first"));
                        $(".item_img").removeClass("blur");
                        $(".item_img:first").addClass("active");
                        $(".bg:first").addClass("active");
                        $(".bg").removeClass("blur");
                    });
                };
            }, 250);
        }
        });
    </script>
</body>

</html>
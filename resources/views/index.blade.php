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
    @include('sections.s_directions')
    @include('sections.s_masters')
    @include('sections.s_events')
    @include('sections.s_groups')
    @include('sections.s_map')
    @include('base.footer')
</div>

{!! Html::script('js/jquery-1.11.3.min.js') !!}
{!! Html::script('js/jquery.fullPage.min.js') !!}
{!! Html::script('https://maps.googleapis.com/maps/api/js?v=3.exp') !!}
{!! Html::script('js/jquery.showcase-slider.js') !!}
{!!Html::script('js/jquery.mask.min.js')!!}
{!! Html::script('js/main.js') !!}
</body>

</html>
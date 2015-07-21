<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dance Studio 54</title>
    {!! Html::style('css/style.css') !!}
</head>
<body>
@include('base.header')
<div class="main_wrapper">
    <div class="inner_section" id="in_directions">
        <section class="vertical_menu"></section>
        <section class="content"></section>
    </div>
    @include('base.footer')
</div>

{!! Html::script('js/jquery-1.11.3.min.js') !!}
{{--{!! Html::script('https://maps.googleapis.com/maps/api/js?v=3.exp') !!}
{!! Html::script('js/jquery.showcase-slider.js') !!}
{!! Html::script('js/main.js') !!}--}}
</body>

</html>
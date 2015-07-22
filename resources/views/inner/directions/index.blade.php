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
        <div class="text-head">Мы предлагаем запись на обучение по множеству танцевальных направлений. Наши педагоги проводят тренировки как по современным танцам, так и по классической хореографии. В нашей студии можно подготовится к мероприятиям различного уровня, от танца в клубе, до профессионального выступления на чемпионатах мирового уровня.</div>
        <section class="vertical_menu">
            <ul>
                @foreach($directions as $key => $direction)
                    <li id="dir_{{$key}}">{{$direction['name']}}</li>
                @endforeach
            </ul>
        </section>
        @foreach($directions as $key => $direction)
            <section class="content" id="cont_{{$key}}">
                <div class="img_wrap">
                    {!! HTML::Image($direction['images'][0], $direction['name']) !!}
                </div>
                <div class="desc_wrap">
                    <h1>{{ $direction['name'] }}</h1>
                    {!! $direction['desc'] !!}
                </div>
            </section>
        @endforeach
        <div class="clear"></div>
    </div>
    @include('base.footer')
</div>

{!! Html::script('js/jquery-1.11.3.min.js') !!}
{!! Html::script('js/inner-page.js') !!}
</body>

</html>
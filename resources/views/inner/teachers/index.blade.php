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
    <div class="inner_section" id="in_teachers">
        <div class="text-head">В нашей студии преподаванием занимаются опытные хореографы, которые прошли не один десяток мастер-классов, состоялись как профессиональные танцоры и подготовили множество юных спортсменов к соревнованиям и выступлениям.</div>
        <section class="vertical_menu">
            <ul>
                @foreach($teachers as $key => $teacher)
                    <li class="black_arrow" id="menu_{{$key}}">{{$teacher['name']}}</li>
                @endforeach
            </ul>
        </section>
        @foreach($teachers as $key => $teacher)
            <section class="content" id="cont_{{$key}}">
                <div class="img_wrap">
                    <div class="active">{!! HTML::Image($teacher['images'][1], $teacher['name']) !!}</div>
                </div>
                <div class="desc_wrap">
                    <h1>{{ $teacher['name'] }}</h1>
                    {!! $teacher['desc'] !!}
                </div>
                <div class="clear"></div>
                @if($teacher['desc_detail'] != "")
                    <div class="desc_detail">
                        {!! $teacher['desc_detail'] !!}
                        <div class="clear"></div>
                    </div>
                @endif
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
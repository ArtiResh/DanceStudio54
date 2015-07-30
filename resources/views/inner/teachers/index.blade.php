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
                @foreach($teachers as $teacher)
                    <li class="black_arrow" id="menu_{{$teacher['id']}}">{{$teacher['name']}}</li>
                @endforeach
            </ul>
        </section>
        @foreach($teachers as $key => $teacher)
            <section class="content" id="cont_{{$teacher['id']}}">
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
            <h1>Запись на обучение</h1>
            <div class="application__form">
                <form action="handler.php" id="send_form">
                    <div class="form-left">
                        <div class="line_1">
                            <p>ФИО</p>
                            <input type="text"/>
                        </div>
                        <div class="line_2">
                            <p>Дата рождения</p>
                            <input type="date"/>
                        </div>
                        {{--<div class="line_3">--}}
                        {{--<p id="l_31">Рост (см)</p>--}}
                        {{--<input type="text" id="l_32"/>--}}
                        {{--<p id="l_33">Вес (кг)</p>--}}
                        {{--<input type="text" id="l_34"/>--}}
                        {{--</div>--}}
                        <div class="line_4">
                            <p>Контактный телефон</p>
                            <input type="text" placeholder="+7(___) ___ __ __" id="user_phone" class="rfield" />
                        </div>
                    </div>
                    <div class="form-middle">
                        <div>

                            <p>Выбранный учитель</p>
                            <select name="" id="send_direction">

                                <option value="">{{$teacher['name']}}</option>

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
                            {!! HTML::image('images/button_big_check.png', 'Запись на обучение в танцкласс' )!!}
                            <p>Отправить заявку</p>
                        </a>
                    </div>
                </form>
            </div>
        @endforeach
        <div class="clear"></div>
    </div>
    @include('base.footer')
</div>

{!! Html::script('js/jquery-1.11.3.min.js') !!}
{!! Html::script('js/inner-page.js') !!}
</body>

</html>
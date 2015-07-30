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
                @foreach($directions as $direction)
                    <li class="white_arrow" id="menu_{{$direction['id']}}">{{$direction['name']}}</li>
                @endforeach
            </ul>
        </section>
        @foreach($directions as $key => $direction)
            <section class="content" id="cont_{{$direction['id']}}">
                <div class="img_wrap">
                    @foreach($direction['images'] as $key => $image)
                        @if($key == 0)
                            <div class="active" id="img_{{$key}}" style="opacity: 1">{!! HTML::Image($image, $direction['name']) !!}</div>
                        @else
                            <div id="img_{{$key}}">{!! HTML::Image($image, $direction['name']) !!}</div>
                        @endif
                    @endforeach
                </div>
                <div class="desc_wrap">
                    <h1>{{ $direction['name'] }}</h1>
                    {!! $direction['desc'] !!}
                </div>
                <div class="clear"></div>
                @if($direction['video'] != "")
                    <div class="video">
                        <h1>Как танцуют {{ $direction['name'] }}?</h1>
                        <iframe width="960" height="540" src="{{$direction['video']}}" frameborder="0" allowfullscreen></iframe>
                    </div>
                @endif
                @if($direction['desc_detail'] != "")
                    <div class="desc_detail">
                        {!! $direction['desc_detail'] !!}
                        <div class="clear"></div>
                    </div>
                @endif
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

                                <p>Выбранное танцевальное направление</p>
                                <select name="" id="send_direction">

                                        <option value="">{{$direction['name']}}</option>

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
            </section>
        @endforeach
        <div class="clear"></div>
    </div>
    @include('base.footer')
</div>

{!! Html::script('js/jquery-1.11.3.min.js') !!}
{!! Html::script('js/jquery.mask.min.js') !!}
{!! Html::script('js/inner-page.js') !!}
</body>

</html>
<section id="s_application" class="section">
    <div class="application__head">Сейчас идет набор в группы</div>
    <div class="application__inform">
        <div class="now">

            @foreach($groups as $group)

                <div>
                    <h1>{{$group['name']}}</h1>

                    <p>Условия набора</p>
                    <p class="data">
                        {!!$group['desc']!!}
                    </p>
                    <a class="applicate" href="">Записаться на <span>{{$group['name']}}</span></a>
                </div>


            @endforeach




        </div>
        <div class="divider">

        </div>
        <div class="image-b">{!! HTML::image('images/button_big_lines.png', '90e' )!!}</div>
        <div class="load">
            <a href="javascript:void(0);">Скачать расписание тренировок</a>
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

                    <p>Выберите танцевальное направление</p>
                    <select name="" id="send_direction">
                        @foreach($directions as $direction)

                            <option value="">{{$direction['name']}}</option>
                        @endforeach
                        {{--<option value="">Juzz Funk</option>--}}
                        {{--<option value="">Dance Show</option>--}}
                        {{--<option value="">Disco</option>--}}
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
    <div class="wrapper-movedown">
        <svg width="53" height="53" class="moveDown">
            <circle r="25" cx="27" cy="27"
                    fill="none" stroke="#dc241c" stroke-width="2" />
            <line x1="40" y1="20" x2="26" y2="34"></line>
            <line x1="15" y1="20" x2="26" y2="34"></line>
        </svg>
    </div>
</section>
<section id="s_directions" class="section">
    <div class="directions__text-head">
        Мы предлагаем запись на обучение по множеству танцевальных направлений.
        Наши педагоги проводят тренировки как по современным танцам, так и по классической хореографии.
        В нашей студии можно подготовится к мероприятиям различного уровня, от танца в клубе, до профессионального
        выступления на чемпионатах мирового уровня.
    </div>
    <div class="directions__nav">
        @foreach($directions as $direction)

            <div id="nv_{{$direction['id']}}"
                @if($direction['id']===1)
                    class="active_dir"
                @endif
                >{{$direction['name']}}</div>
        @endforeach
    </div>
    @foreach($directions as $direction)
        <div class="directions_text" id="desc_{{$direction['id']}}">
            <h1>{{$direction['name']}}</h1>

            {!! $direction['desc'] !!}
            <ul>
                <a href="{{$direction['video']}}">
                    <li class="video">Смотреть видео</li>
                </a>
                <a href="/directions?id={{$direction['id']}}">
                    <li class="applicate">Записаться на {{$direction['name']}}</li>
                </a>
            </ul>
        </div>
    @endforeach
    <div class="directions__slider">


        @foreach($directions as $direct)
            <div class="backscreen" id="bs_{{$direct['id']}}">
                {!! HTML::image($direct['images'][0], 'Танцуют '.$direct['name'].' в Калининграде', ['class' => 'mainimg'] )!!}
                @if(isset($direct['images'][1]))
                    {!! HTML::image($direct['images'][1], 'Танцуют '.$direct['name'].' в Калининграде', ['class' => 'secondimg'] )!!}
                    @endif
            </div>
        @endforeach
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
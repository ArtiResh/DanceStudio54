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
    {{--@foreach($directions as $direction)--}}
        {{--<div class="directions_text">--}}
            {{--<h1>{{$direction['name']}}</h1>--}}

            {{--{{$direction['description']}}--}}
            {{--<ul>--}}
                {{--<a href="javascript:void(0);">--}}
                    {{--<li class="video">Смотреть видео</li>--}}
                {{--</a>--}}
                {{--<a href="javascript:void(0);">--}}
                    {{--<li class="applicate">Записаться на Jazz Modern</li>--}}
                {{--</a>--}}
            {{--</ul>--}}
        {{--</div>--}}
    {{--@endforeach--}}
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
            <a href="javascript:void(0);">
                <li class="video">Смотреть видео</li>
            </a>
            <a href="javascript:void(0);">
                <li class="applicate">Записаться на Jazz Modern</li>
            </a>
        </ul>
    </div>

    <div class="directions__slider">


        @foreach($directions as $direct)
            <div class="backscreen" id="bs_{{$direct['id']}}">
                {!! HTML::image($direct['images'][0], 'Танцуют '.$direct['name'].' в Калининграде' )!!}
            </div>
        @endforeach

        {{--<div class="backscreen" id="bs_2">--}}
            {{--{!! HTML::image('images/jazz_modern2.png', 'Logo Dance Studio 54' )!!}--}}
        {{--</div>--}}
        {{--<div class="backscreen" id="bs_3">--}}
            {{--{!! HTML::image('images/jazz_modern3.png', 'Logo Dance Studio 54' )!!}--}}
        {{--</div>--}}
        {{--<div class="backscreen" id="bs_4">--}}
            {{--{!! HTML::image('images/jazz_modern4.png', 'Logo Dance Studio 54' )!!}--}}
        {{--</div>--}}
        {{--<div class="backscreen" id="bs_5">--}}
            {{--{!! HTML::image('images/jazz_modern5.png', 'Logo Dance Studio 54' )!!}--}}
        {{--</div>--}}
        {{--<div class="backscreen" id="bs_6">--}}
            {{--{!! HTML::image('images/jazz_modern6.png', 'Logo Dance Studio 54' )!!}--}}
        {{--</div>--}}
        {{--<div class="backscreen" id="bs_7">--}}
            {{--{!! HTML::image('images/jazz_modern7.png', 'Logo Dance Studio 54' )!!}--}}
        {{--</div>--}}
        {{--<div class="backscreen" id="bs_8">--}}
            {{--{!! HTML::image('images/jazz_modern8.png', 'Logo Dance Studio 54' )!!}--}}
        {{--</div>--}}
        {{--<div class="backscreen" id="bs_9">--}}
            {{--{!! HTML::image('images/jazz_modern9.png', 'Logo Dance Studio 54' )!!}--}}
        {{--</div>--}}
        {{--<div class="backscreen" id="bs_10">--}}
            {{--{!! HTML::image('images/jazz_modern10.png', 'Logo Dance Studio 54' )!!}--}}
        {{--</div>--}}
    </div>



    <svg width="53" height="53">
        <circle r="25" cx="27" cy="27"
                fill="none" stroke="#dc241c" stroke-width="2" />
        <line x1="40" y1="20" x2="26" y2="34"></line>
        <line x1="15" y1="20" x2="26" y2="34"></line>
    </svg>
</section>
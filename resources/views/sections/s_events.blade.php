<section id="s_studio" class="section">
    <div class="studio__head">
        Мы находимся в постоянном развитии и самосовершенствовании.
        Жизнь в студии кипит и пополняет наши альбомы отличными
        моментами с соревнований или выступлений.
    </div>
    <div class="studio__information">
        @foreach($events as $event)
            {{$event}}
        {{--<div class="studios">
            <div class="foto">
                {!! HTML::image('images/temp-events.jpg', '90e' )!!}
            </div>
            <div class="description">
                <h1>Дискотека
                    90-х</h1>

                <p>Выступление с Иванушками.</p>

                <p class="data">10.01.2014</p>
                <a class="more" href="javascript:void(0)">Узнать больше</a></br>
                </a>
            </div>
        </div>--}}

        @endforeach
    </div>
    <svg width="53" height="53">
        <circle r="25" cx="27" cy="27"
                fill="none" stroke="#dc241c" stroke-width="2" />
        <line x1="40" y1="20" x2="26" y2="34"></line>
        <line x1="15" y1="20" x2="26" y2="34"></line>
    </svg>
</section>
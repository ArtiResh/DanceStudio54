<section id="s_studio" class="section">
    <div class="studio__head">
        Мы находимся в постоянном развитии и самосовершенствовании.
        Жизнь в студии кипит и пополняет наши альбомы отличными
        моментами с соревнований или выступлений.
    </div>
    <div class="studio__information">
        @foreach($events as $event)
            <div class="studios">
                <div class="foto">
                    {!! HTML::image($event['images'][0], $event['name'] ) !!}
                </div>
                <div class="description">
                    <h1>{{$event['name']}}</h1>
                    <p>{{$event['desc']}}</p>
                    <p class="data">{{$event['event_date']}}</p>
                    <a class="more" href="/events?id={{$event['id']}}">Узнать больше</a></br>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
    <svg width="53" height="53">
        <circle r="25" cx="27" cy="27"
                fill="none" stroke="#dc241c" stroke-width="2" />
        <line x1="40" y1="20" x2="26" y2="34"></line>
        <line x1="15" y1="20" x2="26" y2="34"></line>
    </svg>
</section>
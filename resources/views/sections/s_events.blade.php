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
                    @if (count($event['images']) > 1)
                        <div id="f1_container">
                            <div id="f1_card" class="shadow">
                                <div class="front face">
                                    {!! HTML::image($event['images'][0], $event['name']) !!}
                                </div>
                                <div class="back face center">
                                    {!! HTML::image($event['images'][1], $event['name']) !!}
                                </div>
                            </div>
                        </div>
                    @else
                        {!! HTML::image($event['images'][0], $event['name']) !!}
                    @endif
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
    <div class="wrapper-movedown">
        <svg width="53" height="53" class="moveDown">
            <circle r="25" cx="27" cy="27"
                    fill="none" stroke="#dc241c" stroke-width="2" />
            <line x1="40" y1="20" x2="26" y2="34"></line>
            <line x1="15" y1="20" x2="26" y2="34"></line>
        </svg>
    </div>
</section>
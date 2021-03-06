<section id="s_masters" class="section">
    <div class="masters__head">В нашей студии преподаванием занимаются опытные хореографы,
        которые прошли не один десяток мастер-классов, состоялись как профессиональные
        танцоры и подготовили множество юных спортсменов к соревнованиям и выступлениям.
    </div>
    <div class="masters__teacher">

        @foreach($teachers as $teacher)
            <div class="teachers">
                <div class="ico">
                    @if (count($teacher['images']) > 1)
                        <div id="f1_container">
                            <div id="f1_card" class="shadow">
                                <div class="front face">
                                    {!! HTML::image($teacher['images'][0], $teacher['name']) !!}
                                </div>
                                <div class="back face center">
                                    {!! HTML::image($teacher['images'][1], $teacher['name']) !!}
                                </div>
                            </div>
                        </div>
                    @else
                        {!! HTML::image($teacher['images'][0], $teacher['name']) !!}
                    @endif
                </div>
                <div class="description">
                    <h1>{{ $teacher['name'] }}</h1>

                    <p>{{ $teacher['desc'] }}</p>
                    <a class="more" href="/teachers?id={{$teacher['id']}}">Узнать больше</a></br>
                    <a class="applicate" href="javascript:void(0);">Записаться к этом у хореографу</a>
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
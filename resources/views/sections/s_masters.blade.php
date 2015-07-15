<section id="s_masters" class="section">
    <div class="masters__head">В нашей студии преподаванием занимаются опытные хореографы,
        которые прошли не один десяток мастер-классов, состоялись как профессиональные
        танцоры и подготовили множество юных спортсменов к соревнованиям и выступлениям.
    </div>
    <div class="masters__teacher">
        <?
        for ($i = 0; $i < 6; $i++) {
        ?>
        <div class="teachers">
            <div class="ico">
                {!! HTML::image('images/foto_teacher.png', 'Учитель...' )!!}
            </div>
            <div class="description">
                <h1>Ксения
                    Тагильцева</h1>

                <p>Замечательный хореограф, опыт более 10 лет, победительница таких соревнований
                    как FGW Dance Competition и многих других, зарекомендовала себя как хороший лидер.</p>
                <a class="more" href="javascript:void(0)">Узнать больше</a></br>
                <a class="applicate" href="javascript:void(0);">Записаться к этом у хореографу

                </a>
            </div>
        </div>

        <?
        }
        ?>
    </div>
    <svg width="53" height="53">
        <circle r="25" cx="27" cy="27"
                fill="none" stroke="#dc241c" stroke-width="2" />
        <line x1="40" y1="20" x2="26" y2="34"></line>
        <line x1="15" y1="20" x2="26" y2="34"></line>
    </svg>
</section>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dance Studio 54</title>
    {!! Html::style('css/style.css') !!}
    {!! Html::style('js/fancybox/jquery.fancybox.css') !!}
    {!! Html::style('js/fancybox/helpers/jquery.fancybox-thumbs.css') !!}
    {!! Html::style('js/fancybox/helpers/jquery.fancybox-buttons.css') !!}
</head>
<body>
@include('base.header')
<div class="main_wrapper">
    <div class="inner_section" id="in_events">
        <div class="text-head">Мы находимся в постоянном развитии и самосовершенствовании. Жизнь в студии кипит и пополняет наши альбомы отличными моментами с соревнований или выступлений.</div>
        <section class="vertical_menu">
            <ul>
                @foreach($events as $event)
                    <li class="black_arrow" id="menu_{{$event['id']}}">{{$event['name']}}</li>
                @endforeach
            </ul>
        </section>
        @foreach($events as $key => $event)
            <section class="content" id="cont_{{$event['id']}}">
                <div class="img_wrap">
                    <div class="active">{!! HTML::Image($event['images'][0], $event['name']) !!}</div>
                </div>
                <div class="desc_wrap">
                    <h1>{{ $event['name'] }}</h1>
                    {!! $event['desc'] !!}
                </div>
                <div class="clear"></div>
                <div class="gallery">
                    <h1>Фотогалерея</h1>
                    @foreach($event['albums']['images'] as $image)
                        <a class="gallery_img" rel="gallery_img" href="{{$image}}"><img src="{{$image}}" /></a>
                    @endforeach
                    <div class="clear"></div>
                </div>
                @if($event['desc_full'] != "")
                    <div class="desc_detail">
                        {!! $event['desc_full'] !!}
                        <div class="clear"></div>
                    </div>
                @endif
            </section>
        @endforeach
        <div class="clear"></div>
    </div>
    @include('base.footer')
</div>

{!! Html::script('js/jquery-1.11.3.min.js') !!}
{!! Html::script('js/fancybox/jquery.fancybox.pack.js') !!}
{!! Html::script('js/fancybox/helpers/jquery.fancybox-thumbs.js') !!}
{!! Html::script('js/fancybox/helpers/jquery.fancybox-buttons.js') !!}
{!! Html::script('js/inner-page.js') !!}
{!! Html::script('js/events-gallery-init.js') !!}
</body>

</html>
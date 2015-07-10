/**
 * Created by Максим on 09.07.2015.
 */

(function($) {
    $.fn.showcaseSlider = function(options){



        function Showcase(element,options){

            this.settings = null;

            this.options = $.extend({},Showcade.Defaults,options);

            this.$element = $(element);

            this.state = $.extend({}, state);

            /**
             * Absolute current position.
             * @protected
             */
            this._current = null;

            /**
             * Animation speed in milliseconds.
             * @protected
             */
            this._speed = null;

            /**
             * Current width of the plugin element.
             */
            this._width = null;

            /**
             * All real items.
             * @protected
             */
            this._items = [];

            /**
             * All cloned items.
             * @protected
             */
            this._clones = [];

            /**
             * Merge values of all items.
             * @todo Maybe this could be part of a plugin.
             * @protected
             */
            this._mergers = [];

            /**
             * Invalidated parts within the update process.
             * @protected
             */
            this._invalidated = {};

            /**
             * Ordered list of workers for the update process.
             * @protected
             */
            this._pipe = [];


            this.setup();
            this.initialize();

        }

        Showcase.Defualts = {

        };

        return this;
    };
})(jQuery);

function getProductId(elem){
    return $(elem).attr('id').substr(2);
}

(function ($) {

    $.fn.getWidthInPercent = function () {
        var width = parseFloat($(this).css('width'))/parseFloat($(this).parent().css('width'));
        return (100*width);
    };

})(jQuery);


var naturalWidthFuture=[];
$(document).ready(function(){
    $(".backscreen").on('click', function(event){
        if(jQuery.isEmptyObject(naturalWidthFuture)){
            $(".backscreen").each(function(){
                id = getProductId($(this));
                naturalWidthFuture[id] = $(this).getWidthInPercent();
                if ($(this).hasClass("center"))naturalWidthFuture[id] = naturalWidthFuture[id]/2;
            });
        }

        var selected = $(this);
        /*** @@@@@ ***/
        var leftPart = [];
        var rightPart = [];
        var marginLeft,marginRight, sideOfMovement;
            marginLeft = 0.5;
            marginRight = 1.5;
        $(".directions__slider").children('.backscreen').each(function(){
            (getProductId($(this)) < getProductId(selected))?leftPart.push($(this)):rightPart.push($(this));
        });

        leftPart.reverse();
        /*** @@@@@ ***/

       // (getProductId($(this)) < getProductId($(".center")))?leftPart.push($(this)):rightPart.push($(this));
            /** Определяем в какую сторону смещение относительно родительского элемента */

                sideOfMovement = $(selected).position().left - $(".center").position().left;
                sideOfMovement<0?sideOfMovement="left":sideOfMovement=-"right";


        $(".center").animate({paddingTop:"4.5%", height:"50%"},150,function(){
            if(sideOfMovement==="left"){
               $(".directions__slider").css({left: -naturalWidthFuture[getProductId(".directions__slider .backscreen:last")]+"%"}).prepend($(".directions__slider .backscreen:last"));
               // $(".directions__slider").prepend($(".directions__slider .backscreen:last"));
                /**Получение позиции смещения*/
                offset = 0;
                //var leftVar =(parseFloat($(".directions__slider").position().left)/parseFloat($(".directions__slider").parent().css('width'))*100);
                //offset = 0;
                //offset = (leftVar - offset)+'%';
                selected.animate({width:naturalWidthFuture[getProductId(selected)]*2+"%",marginRight:marginRight+"%",marginLeft:marginLeft+"%"},500);
                $(this).removeClass("center");
                $(".directions__slider").animate({left:offset+"%"},500);

            }
            else{
                //$(".directions__slider").css({left: naturalWidthFuture[getProductId(".directions__slider .backscreen:last")]}).prepend($(".directions__slider .backscreen:last"));
                //selected.width(naturalWidthFuture[getProductId(selected)]*2+"%");

                $(selected).css({width:naturalWidthFuture[getProductId(this)]*2+"%",marginRight:marginRight+"%"});
                $(".center").animate({width:naturalWidthFuture[getProductId(this)]+"%",marginRight:0,marginLeft:0},1000);
                $(selected).animate({marginLeft:marginLeft+"%"},500);
                //offset = -naturalWidthFuture[getProductId($(this))];
                offset = 0;
                $(".directions__slider").animate({left:offset+"%"},500);

                $(this).removeClass("center");
                $(".directions__slider").append($(".directions__slider .backscreen:first"));

            }


           // $(this).animate({width:(naturalWidthFuture[getProductId(".center")]/2+"%")},250);

          //  sideOfMovement==="right"?$(".directions__slider").append($(".directions__slider .backscreen:first")):null;
            $(selected).animate({height:"86%",paddingTop:"0%"},250,function(){
                $(this).addClass("center");
                $(this).next().css({width:naturalWidthFuture[getProductId(this)]+"%",marginRight:0});
            });

        });



    });
});



//$(".backscreen").on('click', function(event){
//    if(jQuery.isEmptyObject(naturalWidthFuture)){
//        $(".backscreen").each(function(){
//            id = getProductId($(this));
//            naturalWidthFuture[id] = $(this).width();
//        });
//    }
//    var leftPart = [];
//    var rightPart = [];
//    var selected = $(this);
//
//    $(".future_wrap .flex-wrap div").children('.backscreen').each(function(){
//        if(getProductId($(this)) < getProductId(selected)){
//            leftPart.push($(this));
//        } else if(getProductId($(this)) > getProductId(selected)) {
//            rightPart.push($(this))
//        }
//    });
//
//    var selectedPos = -($(selected).offset().left - $(".future_wrap").offset().left + $(selected).width() / 2);
//
//    /** Уменьшение размера картинки центрального выбранного элемента до исходного размера и смещение*/
//    widtWhGrow = $(".backscreen.center").width() - naturalWidthFuture[getProductId($(".backscreen.center"))];
//
//    $(selected).addClass("active").animate({width:'7.63359%', height:'50%'}, 250, function(){
//        $(selected).animate({left:selectedPos}, 250);
//    });
//
//    leftPart.reverse();
//
//    $(leftPart).each(function(k, v){
//        if(k == 0){
//            leftPos = -($(this).offset().left - $(".future_wrap").offset().left + ($(this).width()  / 2) - (img_width - $(selected).width()) / 2);
//        }
//        $(this).animate({left:leftPos}, 350);
//    });
//
//    /** Смещение в право {расчет смещения не очень понятен}*/
//    $(rightPart).each(function(k, v){
//        if(k == 0){
//            rightPos = $(".future_wrap").width() - ($(this).offset().left - $(".future_wrap").offset().left + ($(this).width() / 2) + (img_width - $(selected).width()) / 2);
//        }
//        $(this).animate({left:rightPos}, 350);
//    });
//});

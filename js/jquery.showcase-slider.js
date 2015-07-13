///**
// * Created by Максим on 09.07.2015.
// */
//
//(function($) {
//    $.fn.showcaseSlider = function(options){
//
//
//
//        function Showcase(element,options){
//
//            this.options = $.extend({},Showcade.Defaults,options);
//
//            this.$element = $(element);
//
//            this._current = null;
//
//            /**
//             * Animation speed in milliseconds.
//             * @protected
//             */
//            this._speed = null;
//
//            /**
//             * Current width of the plugin element.
//             */
//            this._width = null;
//
//            /**
//             * All real items.
//             * @protected
//             */
//            this._items = [];
//
//            /**
//             * All cloned items.
//             * @protected
//             */
//            this._clones = [];
//
//            /**
//             * Merge values of all items.
//             * @todo Maybe this could be part of a plugin.
//             * @protected
//             */
//            this._mergers = [];
//
//            /**
//             * Invalidated parts within the update process.
//             * @protected
//             */
//            this._invalidated = {};
//
//            /**
//             * Ordered list of workers for the update process.
//             * @protected
//             */
//            this._pipe = [];
//
//
//            this.setup();
//            this.initialize();
//
//        }
//
//        Showcase.Defualts = {
//            marginLeft: 0,
//            marginRight : 0,
//            slider: ".Showcase-slider",
//            blockImage:".Showcase-image"
//        };
//    };
//    $.fn.showcaseSlider = function ( options ) {
//        return this.each(function () {
//            if (!$.data(this, 'plugin_' + Showcase)) {
//                $.data(this, 'plugin_' + Showcase,
//                    new Plugin( this, options ));
//            }
//        });
//    }
//})(jQuery);
//
//;(function ( $, window, document, element,options ) {
//
//    var pluginName = 'showcaseSlider';
//
//    function Showcase( element, options ) {
//        this.element = element;
//
//        this.options = $.extend({},Showcade.Defaults,options);
//
//        this._defaults = defaults;
//        this._name = pluginName;
//
//        this.init();
//    }
//
//    Showcase.Defualts = {
//        height: "50%",
//        paddingTop: 0,
//        marginLeft: 0,
//        marginRight : 0,
//        slider: ".Showcase-slider",
//        blockImage:".Showcase-image"
//    };
//
//    Showcase.prototype.init = function () {
//        this.trigger('initialize');
//
//    };
//
//    Showcase.prototype.getProductId = function(elem){
//        var countOfNum = 3;
//        return parseInt($(elem).attr('id').substr(countOfNum));
//    }
//
//    Showcase.prototype.getWidthInPercent = function () {
//        var width = parseFloat($(this).css('width'))/parseFloat($(this).parent().css('width'));
//        return (100*width);
//    };
//
//    $.fn.showcaseSlider = function ( options ) {
//        return this.each(function () {
//            if (!$.data(this, 'plugin_' + pluginName)) {
//                $.data(this, 'plugin_' + pluginName,
//                    new Showcase( this, options ));
//            }
//        });
//    }
//
//})( jQuery, window, document );



/** */
/**
 * Функция для получения порядковых номеров элементов (по умолчанию 3)
 * */

function getProductId(elem){
    var countOfNum = 3;
    return parseInt($(elem).attr('id').substr(countOfNum));
}


/**
 * Функция jQuery по переводу пикселей в проценты
 * */
(function ($) {
    $.fn.getWidthInPercent = function () {
        var width = parseFloat($(this).css('width'))/parseFloat($(this).parent().css('width'));
        return (100*width);
    };
})(jQuery);


/**
 * Слайдер
 * */

function Slider(sideOfMovement,selected) {
    var marginLeft,marginRight, sideOfMovement;
    marginLeft = 0.5;
    marginRight = 1.5;
    $(".center").animate({paddingTop:"4.5%", height:"50%"},150,function(){
        if(sideOfMovement==="left"){
            temp = -naturalWidthFuture[getProductId(".directions__slider .backscreen:last")]+"%";
            $(".directions__slider").css({left: -naturalWidthFuture[getProductId(".directions__slider .backscreen:last")]*3+"%"}).prepend($(".directions__slider .backscreen:last"));
            // $(".directions__slider").prepend($(".directions__slider .backscreen:last"));
            /**Получение позиции смещения*/
            offset = 0;
            //var leftVar =(parseFloat($(".directions__slider").position().left)/parseFloat($(".directions__slider").parent().css('width'))*100);
            //offset = 0;
            //offset = (leftVar - offset)+'%';
            selected.animate({width:naturalWidthFuture[getProductId(selected)]*2+"%",marginRight:marginRight+"%",marginLeft:marginLeft+"%"},500);
            $(this).removeClass("center");
            $(".directions__slider").animate({left:offset+"%"},500);
            $(selected).animate({height:"86%",paddingTop:"0%"},400,function(){
                $(this).addClass("center");
                $(this).next().css({width:naturalWidthFuture[getProductId(this)]+"%",marginRight:0});
            });

        }
        else{
            //$(".directions__slider").css({left: naturalWidthFuture[getProductId(".directions__slider .backscreen:last")]}).prepend($(".directions__slider .backscreen:last"));
            //selected.width(naturalWidthFuture[getProductId(selected)]*2+"%");

            $(selected).css({width:naturalWidthFuture[getProductId(this)]*2+"%",marginRight:marginRight+"%",marginLeft:marginLeft+"%"});

            //$(selected).animate({marginLeft:marginLeft+"%"},10);
            offset = -naturalWidthFuture[getProductId($(this))]*2;
            //offset = 0;
            $(".directions__slider").animate({left:offset+"%"},100,function(){

                $(".directions__slider").css({left:0}).append($(".directions__slider .backscreen:first"));
                $(".center").animate({width:naturalWidthFuture[getProductId(".center")]+"%",marginRight:"0",marginLeft:"0"},300,function(){

                    $(this).removeClass("center");
                    $(selected).animate({height:"86%",paddingTop:"0%",marginLeft:marginLeft+"%"},400,function(){
                        $(this).addClass("center");
                        $(this).next().css({width:naturalWidthFuture[getProductId(this)]+"%",marginRight:0});
                    });
                });

            });




        }

    });

};




var naturalWidthFuture=[];
$(document).ready(function(){
    $(".directions__nav div").click(function(){
       /** не вызывает пункт мнюю который уже открыт*/
       if( $(this).hasClass("active_dir"))return false;
       /** смена пунктов меню*/
        $(".directions__nav div").removeClass("active_dir");
        $(this).addClass("active_dir");

        var idCenter, idDir, idMax,leftSide,rightSide,itter,sideOfMovement;
        idMax = $('.directions__nav').children().length;

        /** Получение номера id центрального элемента и вызываемого пункта*/
        idDir = parseInt(getProductId($(this)));
        idCenter = parseInt(getProductId(".center"));

        /** Рассчет на сколько небходимо сдвинуться вправо и влево для смены*/
        if(idDir<idCenter){
            rightSide = idCenter - idDir;
            leftSide = (idMax - idCenter) + idDir;
        }
        else{
            leftSide = idDir - idCenter;
            rightSide = (idMax - idDir) + idCenter;
        }
       // leftSide<rightSide?itter=leftSide:itter=rightSide;
        /** Выбор кратчайшего смещения и сторону смещения*/
        itter = leftSide<rightSide?leftSide:rightSide;
        sideOfMovement = rightSide<leftSide?"left":"right";

        for(var i=0;i<itter;i++){

            setTimeout(Slider(sideOfMovement,$("#bs_"+idDir)), 700);

        }
    });



    $(".backscreen").on('click', function(event){
        if( $(this).hasClass("center"))return false;
        if(jQuery.isEmptyObject(naturalWidthFuture)){
            $(".backscreen").each(function(){
                id = getProductId($(this));
                naturalWidthFuture[id] = $(this).getWidthInPercent();
                if ($(this).hasClass("center"))naturalWidthFuture[id] = naturalWidthFuture[id]/2;
            });
        }

        //var selected = $(this);
        //var marginLeft,marginRight, sideOfMovement;
        var sideOfMovement;
        //marginLeft = 0.5;
        //marginRight = 1.5;

       // (getProductId($(this)) < getProductId($(".center")))?leftPart.push($(this)):rightPart.push($(this));
            /** Определяем в какую сторону смещение относительно родительского элемента */

                sideOfMovement =$(this).position().left - $(".center").position().left;
                sideOfMovement<0?sideOfMovement="left":sideOfMovement=-"right";

                Slider(sideOfMovement,$(this));

    });
});




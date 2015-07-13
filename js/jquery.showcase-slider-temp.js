/**
 * Created by Максим on 09.07.2015.
 */

;
(function ($, window, document, element, options) {

    var pluginName = 'showcaseSlider';

    function Showcase(element, options) {
        this.element = element;

        this.options = $.extend({}, Showcase.Defaults, options);

        this._name = pluginName;

        this.naturalWidthFuture = [];

        this.init();

    }

    Showcase.Defaults = {
        heightLow: 50,
        heightTall: 86,
        paddingTop: 4.5,
        marginLeft: 0.5,
        marginRight: 1.5,
        slider: ".directions__slider",
        blockImage: ".backscreen",
        //slider: ".Showcase-slider",
        //blockImage:".Showcase-image",
        countOfNum: 3,
        nameOfCenterEl: "center",
        sideOfMovement: "left"
    };

    Showcase.prototype = {

        init: function () {
            var id;
            var _this = this;
            var settings = this.options;
            $(this.element).children().each(function () {
                id = _this.getProductId(this, settings.countOfNum);
                _this.naturalWidthFuture[id] = _this.getWidthInPercent(this);
                if ($(this).hasClass(settings.nameOfCenterEl))_this.naturalWidthFuture[id] = _this.naturalWidthFuture[id] / 2;
                this.onclick = function () {
                    _this.on(this, settings)
                };
            });
            return this.naturalWidthFuture = _this.naturalWidthFuture;
        },

        on: function (elem, settings) {
            settings.sideOfMovement = $(elem).position().left - $("." + settings.nameOfCenterEl).position().left;
            settings.sideOfMovement < 0 ? settings.sideOfMovement = "left" : settings.sideOfMovement = -"right";
            this.slide(elem, settings);
        },

        getProductId: function (elem, countOfNum) {
            return parseInt($(elem).attr('id').substr(countOfNum));
        },

        getWidthInPercent: function (elem) {
            var width = parseFloat($(elem).css('width')) / parseFloat($(elem).parent().css('width'));
            return (100 * width);
        },

        slide: function (elem, settings) {
            var selected = elem;
            var _this = this;
            var _mainEl = this.element;

            //$(_mainEl).children(settings.nameOfCenterEl).animate({paddingTop:(settings.paddingTop)+"%", height:(settings.heightLow)+"%"},150,function(){

            $("." + settings.nameOfCenterEl).animate(
                {
                    paddingTop: settings.paddingTop + "%",
                    height: settings.heightLow + "%"
                }, 150, function () {
                    if (settings.sideOfMovement === "left") {

                        $(_mainEl).css({left: -(_this.naturalWidthFuture[_this.getProductId(".directions__slider .backscreen:last", settings.countOfNum)]) * 3 + "%"})
                            .prepend($(".directions__slider .backscreen:last"));

                        $(selected).animate({
                            width: _this.naturalWidthFuture[_this.getProductId(selected, settings.countOfNum)] * 2 + "%",
                            marginRight: settings.marginRight + "%",
                            marginLeft: settings.marginLeft + "%"
                        }, 500);
                        $(this).removeClass(settings.nameOfCenterEl);
                        $(_mainEl).animate({left: "0"}, 500);
                        $(selected).animate({height: settings.heightTall + "%", paddingTop: 0}, 400, function () {
                            $(this).addClass(settings.nameOfCenterEl);
                            $(this).next().css({
                                width: _this.naturalWidthFuture[_this.getProductId(this, settings.countOfNum)] + "%",
                                marginRight: 0
                            });
                        });

                    }
                    else {

                        $(selected).css({
                            width: _this.naturalWidthFuture[_this.getProductId(this, settings.countOfNum)] * 2 + "%",
                            marginRight: settings.marginRight + "%",
                            marginLeft: settings.marginLeft + "%"
                        });
                        offset = -(_this.naturalWidthFuture[_this.getProductId($(this), settings.countOfNum)] * 2);
                        
                        $(_mainEl).animate({left: offset + "%"}, 100, function () {
                            $(_mainEl).css({left: 0}).append($(".directions__slider .backscreen:first"));

                            $("." + settings.nameOfCenterEl).animate({
                                width: _this.naturalWidthFuture[_this.getProductId("." + settings.nameOfCenterEl, settings.countOfNum)] + "%",
                                marginRight: "0",
                                marginLeft: "0"
                            }, 300, function () {

                                $(this).removeClass(settings.nameOfCenterEl);
                                $(selected).animate({
                                    height: settings.heightTall + "%",
                                    paddingTop: 0,
                                    marginLeft: settings.marginLeft + "%"
                                }, 400, function () {
                                    $(this).addClass(settings.nameOfCenterEl);
                                    $(this).next().css({
                                        width: _this.naturalWidthFuture[_this.getProductId(this, settings.countOfNum)] + "%",
                                        marginRight: 0
                                    });
                                });
                            });

                        });


                    }

                });
        }

    };

    $.fn.showcaseSlider = function (options) {
        return this.each(function () {
            if (!$.data(this, 'plugin_' + pluginName)) {
                $.data(this, 'plugin_' + pluginName,
                    new Showcase(this, options));
            }
        });
    }

})(jQuery, window, document);

$(document).ready(function () {
    options = {paddingTop: "4.5"};
    $(".directions__slider").showcaseSlider(this, options);
});


/** */
/**
 * Функция для получения порядковых номеров элементов (по умолчанию 3)
 * */

//function getProductId(elem){
//    var countOfNum = 3;
//    return parseInt($(elem).attr('id').substr(countOfNum));
//}
//
//
///**
// * Функция jQuery по переводу пикселей в проценты
// * */
//(function ($) {
//    $.fn.getWidthInPercent = function () {
//        var width = parseFloat($(this).css('width'))/parseFloat($(this).parent().css('width'));
//        return (100*width);
//    };
//})(jQuery);
//
//
///**
// * Слайдер
// * */
//
//function Slider(sideOfMovement,selected) {
//    var marginLeft,marginRight, sideOfMovement;
//    marginLeft = 0.5;
//    marginRight = 1.5;
//    $(".center").animate({paddingTop:"4.5%", height:"50%"},150,function(){
//        if(sideOfMovement==="left"){
//            temp = -naturalWidthFuture[getProductId(".directions__slider .backscreen:last")]+"%";
//            $(".directions__slider").css({left: -naturalWidthFuture[getProductId(".directions__slider .backscreen:last")]*3+"%"}).prepend($(".directions__slider .backscreen:last"));
//            // $(".directions__slider").prepend($(".directions__slider .backscreen:last"));
//            /**Получение позиции смещения*/
//            offset = 0;
//            //var leftVar =(parseFloat($(".directions__slider").position().left)/parseFloat($(".directions__slider").parent().css('width'))*100);
//            //offset = 0;
//            //offset = (leftVar - offset)+'%';
//            selected.animate({width:naturalWidthFuture[getProductId(selected)]*2+"%",marginRight:marginRight+"%",marginLeft:marginLeft+"%"},500);
//            $(this).removeClass("center");
//            $(".directions__slider").animate({left:offset+"%"},500);
//            $(selected).animate({height:"86%",paddingTop:"0%"},400,function(){
//                $(this).addClass("center");
//                $(this).next().css({width:naturalWidthFuture[getProductId(this)]+"%",marginRight:0});
//            });
//
//        }
//        else{
//            //$(".directions__slider").css({left: naturalWidthFuture[getProductId(".directions__slider .backscreen:last")]}).prepend($(".directions__slider .backscreen:last"));
//            //selected.width(naturalWidthFuture[getProductId(selected)]*2+"%");
//
//            $(selected).css({width:naturalWidthFuture[getProductId(this)]*2+"%",marginRight:marginRight+"%",marginLeft:marginLeft+"%"});
//
//            //$(selected).animate({marginLeft:marginLeft+"%"},10);
//            offset = -naturalWidthFuture[getProductId($(this))]*2;
//            //offset = 0;
//            $(".directions__slider").animate({left:offset+"%"},100,function(){
//
//                $(".directions__slider").css({left:0}).append($(".directions__slider .backscreen:first"));
//                $(".center").animate({width:naturalWidthFuture[getProductId(".center")]+"%",marginRight:"0",marginLeft:"0"},300,function(){
//
//                    $(this).removeClass("center");
//                    $(selected).animate({height:"86%",paddingTop:"0%",marginLeft:marginLeft+"%"},400,function(){
//                        $(this).addClass("center");
//                        $(this).next().css({width:naturalWidthFuture[getProductId(this)]+"%",marginRight:0});
//                    });
//                });
//
//            });
//
//
//
//
//        }
//
//    });
//
//};
//
//
//
//
//var naturalWidthFuture=[];
//$(document).ready(function(){
//    $(".directions__nav div").click(function(){
//       /** не вызывает пункт мнюю который уже открыт*/
//       if( $(this).hasClass("active_dir"))return false;
//       /** смена пунктов меню*/
//        $(".directions__nav div").removeClass("active_dir");
//        $(this).addClass("active_dir");
//
//        var idCenter, idDir, idMax,leftSide,rightSide,itter,sideOfMovement;
//        idMax = $('.directions__nav').children().length;
//
//        /** Получение номера id центрального элемента и вызываемого пункта*/
//        idDir = parseInt(getProductId($(this)));
//        idCenter = parseInt(getProductId(".center"));
//
//        /** Рассчет на сколько небходимо сдвинуться вправо и влево для смены*/
//        if(idDir<idCenter){
//            rightSide = idCenter - idDir;
//            leftSide = (idMax - idCenter) + idDir;
//        }
//        else{
//            leftSide = idDir - idCenter;
//            rightSide = (idMax - idDir) + idCenter;
//        }
//       // leftSide<rightSide?itter=leftSide:itter=rightSide;
//        /** Выбор кратчайшего смещения и сторону смещения*/
//        itter = leftSide<rightSide?leftSide:rightSide;
//        sideOfMovement = rightSide<leftSide?"left":"right";
//
//        for(var i=0;i<itter;i++){
//
//            setTimeout(Slider(sideOfMovement,$("#bs_"+idDir)), 700);
//
//        }
//    });
//
//
//
//    $(".backscreen").on('click', function(event){
//        if( $(this).hasClass("center"))return false;
//        if(jQuery.isEmptyObject(naturalWidthFuture)){
//            $(".backscreen").each(function(){
//                id = getProductId($(this));
//                naturalWidthFuture[id] = $(this).getWidthInPercent();
//                if ($(this).hasClass("center"))naturalWidthFuture[id] = naturalWidthFuture[id]/2;
//            });
//        }
//
//        var sideOfMovement;
//            /** Определяем в какую сторону смещение относительно родительского элемента */
//
//                sideOfMovement =$(this).position().left - $(".center").position().left;
//                sideOfMovement<0?sideOfMovement="left":sideOfMovement=-"right";
//
//                Slider(sideOfMovement,$(this));
//
//    });
//});
//
//
//

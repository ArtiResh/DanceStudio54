/**
 *  * Showcase Slider
 * @version 1.0.0
 * @author Reshetov Artem
 *
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
        navigationPanel:".directions__nav",
        navigationClass: "active_dir",
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
                    _this.on(this, settings);
                };
            });
            $(settings.navigationPanel).children().each(function () {
                this.onclick = function () {
                    _this.navigate(this, settings);
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

        navigate: function(elem, settings){
            var _this = this;
            /** не вызывает пункт мнюю который уже открыт*/

            if( $(elem).hasClass("active_dir"))return true;
            /** смена пунктов меню*/

            $(settings.navigationPanel).children().removeClass(settings.navigationClass);
            $(elem).addClass(settings.navigationClass);

            var idCenter, idDir, idMax,leftSide,rightSide,itter,sideOfMovement;
            idMax = $(settings.navigationPanel).children().length;

            /** Получение номера id центрального элемента и вызываемого пункта*/
            idDir = parseInt(_this.getProductId($(elem), settings.countOfNum));
            idCenter = parseInt(_this.getProductId($("."+settings.nameOfCenterEl), settings.countOfNum));

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
            settings.sideOfMovement = rightSide<leftSide?"left":"right";

            for(var i=0;i<itter;i++){
                setTimeout(_this.slide(("#bs_"+idDir),settings), 700);
            }

        },

        slide: function (elem, settings) {
            var selected = elem;
            var _this = this;
            var _mainEl = this.element;
            if($(selected).hasClass(settings.nameOfCenterEl))return this;
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



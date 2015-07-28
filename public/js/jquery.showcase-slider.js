/**
 *  * Showcase Slider
 * @version 1.0.2
 * @author Reshetov Artem
 *
 */

;
(function ($, window, document, element, options) {

    var pluginName = 'showcaseSlider';

    /**
     * Базовый класс слайдера
     * */

    function Showcase(element, options) {
        this.element = element;

        this.options = $.extend({}, Showcase.Defaults, options);

        this._name = pluginName;

        this.naturalWidthFuture = [];

        this.init();

    }

    /**
     * Настройки по умолчанию, расширяются через options | unfinished
     * */

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
        countOfNum: 3,
        nameOfCenterEl: "center",
        idOfCenterEl:1,
        sideOfMovement: "left",
        speedSlide: 150
    };

    /**
     * Реализуемый прототип слайдера
     * */

    Showcase.prototype = {

        /**
         * Метод — "Инициализация слайдера"
         * */

        init: function () {
            var id;
            var _this = this;
            var settings = this.options;
            /**Цикл по всем вложенным контейнерам слайдера,
             * определяет их длину в процентах,
             * и записывает в глобальную переменную: getWidthInPercent */
            $(this.element).children().each(function () {
                id = _this.getProductId(this, settings.countOfNum);
                _this.naturalWidthFuture[id] = _this.getWidthInPercent(this);
                if ($(this).hasClass(settings.nameOfCenterEl))_this.naturalWidthFuture[id] = _this.naturalWidthFuture[id] / 2;
                /**определение обработчиков событий на блоки с картинками */
                this.onclick = function () {
                    _this.on(this, settings);
                };
            });

            /** определение обработчиков событий слайдер с меню */
            $(settings.navigationPanel).children().each(function () {
                this.onclick = function () {
                    _this.navigate(this, settings);
                };
            });
            return this.naturalWidthFuture = _this.naturalWidthFuture;
        },

        /**
         * Метод — "Определение направления движения"
         * */

        on: function (elem, settings) {

            settings.sideOfMovement = $(elem).position().left - $("#bs_" + this.options.idOfCenterEl).position().left;
            if(settings.sideOfMovement<0){
                settings.sideOfMovement = "left";
                navVar = -1;
                this.options.idOfCenterEl == 1? navVar = 10: navVar = navVar;
            }
            else if(settings.sideOfMovement>0){
                settings.sideOfMovement = "right";
                navVar = 1;
                this.options.idOfCenterEl == 11? navVar = -10: navVar = navVar;
            }
            else{
                navVar = 0;
            }

            /** изменение пункта меню*/
            $(settings.navigationPanel).children().removeClass(settings.navigationClass);
            $("#nv_"+(this.options.idOfCenterEl+navVar)).addClass(settings.navigationClass);

            /** запуск движения*/
            this.slide(elem, settings, 1);

        },

        /**
         * Метод — "Получение идентификатора (id) у элемента"
         * */

        getProductId: function (elem, countOfNum) {

            typeof(elem)=="object"? elem = elem:elem = $(this.element).find(elem);
            return parseInt($(elem).attr('id').substr(countOfNum));
        },

        /**
         * Метод — "Получение длины в процентах"
         * */

        getWidthInPercent: function (elem) {
            var width = parseFloat($(elem).css('width')) / parseFloat($(elem).parent().css('width'));
            return (100 * width);
        },

        /**
         *  Метод — "Обработчик события навигационной панели"
         * */

        navigate: function(elem, settings){
            var _this = this;

            /** не вызывает пункт мнюю который уже открыт*/
            if( $(elem).hasClass("active_dir"))return true;

            /** смена пунктов меню*/
            $(settings.navigationPanel).children().removeClass(settings.navigationClass);
            $(elem).addClass(settings.navigationClass);

            /** определение переменных, получение номера максимального элемента */
            var idCenter, idDir, idMax,leftSide,rightSide,itter,sideOfMovement;
            idMax = $(settings.navigationPanel).children().length;

            /** получение номера id центрального элемента и вызываемого пункта*/
            idDir = parseInt(_this.getProductId($(elem), settings.countOfNum));
            idCenter = _this.options.idOfCenterEl;

            /** рассчет на сколько небходимо сдвинуться вправо и влево для смены*/
            if(idDir<idCenter){
                rightSide = idCenter - idDir;
                leftSide = (idMax - idCenter) + idDir;
            }
            else{
                leftSide = idDir - idCenter;
                rightSide = (idMax - idDir) + idCenter;
            }

            /** выбор кратчайшего смещения и стороны смещения*/
            itter = leftSide<rightSide?leftSide:rightSide;
            settings.sideOfMovement = rightSide<leftSide?"left":"right";

            /** прокрутка слайдера*/

                _this.slide(("#bs_"+idDir),settings, itter);

        },

        /**
         * Метод — "Реализация слайдера"
         * */

        slide: function (elem, settings, steps) {
            /** определение переменных, и сброс если был клинкнут центральный элемент*/
            var selected = elem;
            var _this = this;
            var _mainEl = this.element;
            if($(selected).hasClass(settings.nameOfCenterEl))return this;

            /****************** блок иссчезания текста **********************/

            $("#desc_"+ this.options.idOfCenterEl).animate({opacity:0},400,function(){
                $(this).css({display:"none"});
                $("#desc_"+ _this.getProductId($(selected), settings.countOfNum)).css({display:"block"}).animate({opacity:1},800);
            });

            /****************** **********************/

            /** уменьшение центральной картинки*/
            $("." + settings.nameOfCenterEl).animate(
                {
                    paddingTop: settings.paddingTop + "%",
                    height: settings.heightLow + "%"
                }, 150, function () {

                    /** реализиция движения при выборе левого элемента*/
                    if (settings.sideOfMovement === "left") {

                        /** цикл, смещающий на количество позиций переданное через steps*/
                        for(var loops = 0;loops<steps;loops++) {

                            /** добавление в начало слайдера блока из конца (на случай если был выбран первый элемент) и смещение слайдера на его длину*/
                            $(_mainEl).css({left: -(_this.naturalWidthFuture[_this.getProductId($(".directions__slider .backscreen:last"), settings.countOfNum)]) * 3*steps + "%"})
                                .prepend($(".directions__slider .backscreen:last"));
                        }

                        /** двигаем слайдер*/
                        $(_mainEl).animate({left: "0"}, (settings.speedSlide * 2.5));

                        /** увеличение длины и отступов выбранного элемента*/
                        $(selected).animate({
                              width: _this.naturalWidthFuture[_this.getProductId($(selected), settings.countOfNum)] * 2 + "%",
                              marginRight: settings.marginRight + "%",
                              marginLeft: settings.marginLeft + "%"
                        }, 500,"linear");


                        /** убираем класс с экс-центрального элемента*/
                        var exTemp = $(this);
                        $(this).removeClass(settings.nameOfCenterEl);

                        /** увеличивааем центральный элемент, добавляем класс и уменьшаем длину экс-центрального элемента*/
                        $(selected).animate({height: settings.heightTall + "%", paddingTop: 0}, 250, function () {
                            $(this).addClass(settings.nameOfCenterEl);

                            /** передача id центрального элемента в массив*/
                            _this.options.idOfCenterEl = _this.getProductId(this, settings.countOfNum);

                            exTemp.css({
                                width: _this.naturalWidthFuture[_this.getProductId(this, settings.countOfNum)] + "%",
                                marginRight: 0
                            });
                        });

                    }

                    /** реализация движения при выборе вправого элемента*/
                    else {
                        $("." + settings.nameOfCenterEl).addClass("blur");
                        /** увеличение длины и отступов выбранного элемента*/
                        $(selected).css({
                            width: _this.naturalWidthFuture[_this.getProductId(this, settings.countOfNum)] * 2 + "%",
                            marginRight: settings.marginRight + "%",
                            marginLeft: settings.marginLeft + "%"
                        });
                        $("." + settings.nameOfCenterEl).animate({
                            width: _this.naturalWidthFuture[_this.options.idOfCenterEl] + "%",
                            marginRight: "0",
                            marginLeft: "0"
                        }, settings.speedSlide);
                        /** смещение слайдера на 3ую длину выбранного блока*/
                        /** цикл, смещающий на количество позиций переданное через steps*/

                            offset = -(_this.naturalWidthFuture[_this.getProductId($(this), settings.countOfNum)] * 3*steps);
                            $(_mainEl).animate({left: offset + "%"}, (settings.speedSlide * 2), "linear", function () {
                                var exTemp = $("." + settings.nameOfCenterEl);
                                exTemp.removeClass(settings.nameOfCenterEl);
                                exTemp.removeClass("blur");

                                $(selected).animate({
                                    height: settings.heightTall + "%",
                                    paddingTop: 0,
                                    marginLeft: settings.marginLeft + "%"
                                }, 250,"linear", function () {

                                    /** Добавление класса */
                                    $(this).addClass(settings.nameOfCenterEl);

                                    /** передача id центрального элемента в массив*/
                                    _this.options.idOfCenterEl = _this.getProductId(this, settings.countOfNum);
                                    exTemp.css({
                                        width: _this.naturalWidthFuture[_this.getProductId(this, settings.countOfNum)] + "%",
                                        marginRight: 0
                                    });
                                });

                                /** добавление в конец слайдера блока из конца (на случай если был выбран последний элемент) и смещение слайдера на его длину, по очередно*/
                                for(var loops = 0;loops<steps;loops++) {
                                    $(_mainEl).append($(".directions__slider .backscreen:first")).css({left: 0});
                                }
                            });
                    }
                });

        }
    };

    /**
     * Реализация прототипа класса
     * */

    $.fn.showcaseSlider = function (options) {
        return this.each(function () {
            if (!$.data(this, 'plugin_' + pluginName)) {
                $.data(this, 'plugin_' + pluginName,
                    new Showcase(this, options));
            }
        });
    }

})(jQuery, window, document);





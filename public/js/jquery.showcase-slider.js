/**
 *  * Showcase Slider
 * @version 1.1.0
 * @author Reshetov Artem
 *
 */

var imgInterval = 0;

changeImg = function (element) {
    if (element.children('img').length > 1) {
        element.children().first()
            .animate({opacity: 0}, 250, function () {
                $(this).css({display: "none"});
                element.append($(this)).children().first()
                    .css({display: "block"})
                    .animate({opacity: 1});
            });
    }
};

(function ($, window, document, element, options) {

    var pluginName = 'showcaseSlider';

    /**
     * Базовый класс слайдера
     * */

    function Showcase(element, options) {
        _this = this;

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
        navigationPanel: ".directions__nav",
        navigationClass: "active_dir",
        countOfNum: 3,
        nameOfCenterEl: "center",
        idOfCenterEl: 1,
        sideOfMovement: "left",
        speedSlide: 200
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
            if (settings.sideOfMovement < 0) {
                settings.sideOfMovement = "left";
                navVar = -1;
                this.options.idOfCenterEl == 1 ? navVar = 10 : navVar = navVar;
            }
            else if (settings.sideOfMovement > 0) {
                settings.sideOfMovement = "right";
                navVar = 1;
                this.options.idOfCenterEl == 11 ? navVar = -10 : navVar = navVar;
            }
            else {
                navVar = 0;
            }

            /** изменение пункта меню*/
            $(settings.navigationPanel).children().removeClass(settings.navigationClass);
            $("#nv_" + (this.options.idOfCenterEl + navVar)).addClass(settings.navigationClass);

            /** запуск движения*/
            this.slide(elem, settings, 1);

        },

        /**
         * Метод — "Получение идентификатора (id) у элемента"
         * */

        getProductId: function (elem, countOfNum) {

            typeof(elem) == "object" ? elem = elem : elem = $(this.element).find(elem);
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

        navigate: function (elem, settings) {

            /** не вызывает пункт мнюю который уже открыт*/
            if ($(elem).hasClass("active_dir"))return true;

            /** смена пунктов меню*/
            $(settings.navigationPanel).children().removeClass(settings.navigationClass);
            $(elem).addClass(settings.navigationClass);

            /** определение переменных, получение номера максимального элемента */
            var idCenter, idDir, idMax, leftSide, rightSide, itter, sideOfMovement;
            idMax = $(settings.navigationPanel).children().length;

            /** получение номера id центрального элемента и вызываемого пункта*/
            idDir = parseInt(_this.getProductId($(elem), settings.countOfNum));
            idCenter = _this.options.idOfCenterEl;

            /** рассчет на сколько небходимо сдвинуться вправо и влево для смены*/
            if (idDir < idCenter) {
                rightSide = idCenter - idDir;
                leftSide = (idMax - idCenter) + idDir;
            }
            else {
                leftSide = idDir - idCenter;
                rightSide = (idMax - idDir) + idCenter;
            }

            /** выбор кратчайшего смещения и стороны смещения*/
            itter = leftSide < rightSide ? leftSide : rightSide;
            settings.sideOfMovement = rightSide < leftSide ? "left" : "right";

            /** прокрутка слайдера*/

            _this.slide(("#bs_" + idDir), settings, itter);

        },

        /**
         * Метод — "Уменьшение центрального изображения"
         * */

        downSlide: function (elem) {
            var settings = this.options;
            $("." + settings.nameOfCenterEl).animate(
                {
                    paddingTop: settings.paddingTop + "%",
                    height: settings.heightLow + "%",
                    width: _this.naturalWidthFuture[_this.options.idOfCenterEl] + "%",
                    marginRight: "0",
                    marginLeft: "0"
                }, 2 * settings.speedSlide);
            $("." + settings.nameOfCenterEl).removeClass(settings.nameOfCenterEl);

            return this;
        },


        /**
         * Метод — "Увеличение центрального изображения"
         * */

        upSlide: function (elem,speedAmount) {
            var settings = this.options;
            $(elem).animate({
                width: _this.naturalWidthFuture[_this.getProductId($(elem), settings.countOfNum)] * 2 + "%",
                marginRight: settings.marginRight + "%",
                marginLeft: settings.marginLeft + "%",
                height: settings.heightTall + "%",
                paddingTop: 0
            }, speedAmount * settings.speedSlide, "linear", function () {

                $(this).addClass(settings.nameOfCenterEl);

                imgInterval = setInterval(function () {
                    changeImg($(elem));
                }, 7000);

                /** передача id центрального элемента в массив*/
                _this.options.idOfCenterEl = _this.getProductId(this, settings.countOfNum);

            });
            return this;
        },

        /**
         * Метод — "Реализация слайдера"
         * */

        slide: function (elem, settings, steps) {
            /** определение переменных, и сброс если был клинкнут центральный элемент*/
            var selected = elem;

            var _mainEl = this.element;
            if ($(selected).hasClass(settings.nameOfCenterEl))return this;

            /****************** блок иссчезания текста **********************/

            $("#desc_" + this.options.idOfCenterEl).animate({opacity: 0}, 400, function () {
                $(this).css({display: "none"});
                $("#desc_" + _this.getProductId($(selected), settings.countOfNum)).css({display: "block"}).animate({opacity: 1}, 800);
            });

            /****************** **********************/

            clearInterval(imgInterval);
            /** реализиция движения при выборе левого элемента*/
            if (settings.sideOfMovement === "left") {

                /** цикл, смещающий на количество позиций переданное через steps*/
                var offset = -(_this.naturalWidthFuture[_this.getProductId($(".directions__slider .backscreen:last"), settings.countOfNum)]);
                for (var loops = 0; loops < steps; loops++) {

                    if (loops == 0) {
                        _this.downSlide();
                    }
                    /** добавление в начало слайдера блока из конца (на случай если был выбран первый элемент) и смещение слайдера на его длину*/
                    $(_mainEl).css({left: offset * 3 * steps + "%"})
                        .prepend($(".directions__slider .backscreen:last"));
                }

                /** двигаем слайдер*/

                if (steps == 1) {
                    $(_mainEl).animate({left: "0"}, (settings.speedSlide * 2.5));
                    _this.upSlide(selected,2.1);
                }
                else {
                    $(_mainEl).animate({left: 3 * offset + '%'}, (settings.speedSlide / 2 * steps), "linear", function () {
                        //    alert("5555");
                        _this.upSlide(selected,2.1);
                        $(_mainEl).animate({left: "0"}, settings.speedSlide * 2.5, "linear");

                    });
                }

            }

            /** реализация движения при выборе вправого элемента*/
            else {

                $(selected).css({
                    width: _this.naturalWidthFuture[_this.getProductId(selected, settings.countOfNum)] * 2 + "%",
                    marginRight: settings.marginRight + "%",
                    marginLeft: settings.marginLeft + "%"
                });


                _this.downSlide();

                var  offset = -(_this.naturalWidthFuture[this.options.idOfCenterEl]);
                if (steps == 1||steps == 2) {

                    $(_mainEl).animate({left: offset * 3 * steps + "%"}, (settings.speedSlide * 2), "linear", function () {

                        /** добавление в конец слайдера блока из конца (на случай если был выбран последний элемент) и смещение слайдера на его длину, по очередно*/
                        for (var loops = 0; loops < steps; loops++) {
                            $(_mainEl).append($(".directions__slider .backscreen:first")).css({left: 0});
                        }
                    });
                    _this.upSlide(selected,2);
                }
                else {

                    $(_mainEl).animate({left: offset*3 *(steps-2) + "%"}, (settings.speedSlide * steps/1.5), "linear", function () {
                        $(_mainEl).animate({left: offset*3*steps  + "%"}, (settings.speedSlide *1.5), "linear",function(){
                            for (var loops = 0; loops < steps; loops++) {
                                /** добавление в конец слайдера блока из конца (на случай если был выбран последний элемент) и смещение слайдера на его длину, по очередно*/
                                $(_mainEl).append($(".directions__slider .backscreen:first")).css({left: 0});
                            }
                        });
                        _this.upSlide(selected,1.5);
                    });

                }
            }
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





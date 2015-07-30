var getUrlParams = function(name){
    var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
    if (results==null || $("#menu_" + results[1]).length < 1){
        return false;
    } else {
        return results[1] || 0
    }
};
var changeSection = function(id){
    if(id === false){
        $(".vertical_menu li:first").removeClass('hide').addClass('active show');
        $(".content:first").addClass('active').animate({opacity:'1'}, 250);
    } else {
        $(".vertical_menu li.active").removeClass('active show').addClass('hide');
        $(".content.active").animate({opacity:'0'}, 250, function(){
            $(this).removeClass('active');
        });
        setTimeout(function(){
            $("#menu_" + id).removeClass('hide').addClass('active show');
            $("#cont_" + id).addClass('active').animate({opacity:'1'}, 250, function(){
                changeKey = true;
            });
            clearInterval(mainImgTimer);
            if($("#cont_" + id + " .img_wrap > div").length > 1) {
                mainImgTimer = setInterval(function () {
                    changeMainImages(id)
                }, 6000);
            }
        }, 250);
    }
};
var getElementIntId = function(elem){
    return parseInt(elem.attr('id').substr(-1));
};

var changeMainImages = function(sectId){
    var images = $("#cont_" + sectId).children('.img_wrap');
    var currentImg = images.find('.active');
    var nextImg = images.find("#img_" + (getElementIntId(currentImg) + 1));
    if(nextImg.length == 0){
        nextImg = images.find("#img_0");
    }
    currentImg.animate({opacity:'0'}, 250, function(){
        $(this).removeClass('active');
        nextImg.addClass('active').animate({opacity:'1'});
    });
};

$(document).ready(function(){
    $("#fp_menu").find("[data-menuanchor='" + window.location.pathname.substr(1) + "']").addClass('active');
    changeKey = true;
    mainImgTimer = false;
    changeSection(getUrlParams('id'));
    if($(".content.active .img_wrap > div").length > 1) {
        mainImgTimer = setInterval(function(){
            changeMainImages(getElementIntId($(".content.active")));
        }, 6000);
    }
    $(".vertical_menu li").on('click', function(){
        if(changeKey == true){
            changeKey = false;
            var sect_id = getElementIntId($(this));
            changeSection(sect_id);
        }
    });
});
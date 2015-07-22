var setInnerSection = function(name){
    var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
    if (results==null){
        return null;
    } else {
        return results[1] || 0
    }
};
var changeSection = function(i){
    $(".vertical_menu li.active").removeClass('active');
    $(".content.active").removeClass('active');
    $("#dir_" + i).addClass('active');
    $("#cont_" + i).addClass('active');
};
var getSectionId = function(elem){
    return elem.attr('id').substr(-1);
};
$(document).ready(function(){
    changeSection(setInnerSection('dir'));
    $(".vertical_menu li").on('click', function(){
        changeSection(getSectionId($(this)));
    });
});
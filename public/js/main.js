function initializeMap() {
    var dot_1 = myLatlng = new google.maps.LatLng(54.7204646,20.4736443);
    var dot_2 = myLatlng = new google.maps.LatLng(54.7498295,20.5013145);
    map_1 = new google.maps.Map(document.getElementById('st_01'), {
        zoom: 16,
        center: dot_1
    });
    map_2 = new google.maps.Map(document.getElementById('st_02'), {
        zoom: 16,
        center: dot_2
    });
    var marker_1 = new google.maps.Marker({
        position: dot_1,
        map: map_1,
        title: 'Hello World!'
    });
    var marker_2 = new google.maps.Marker({
        position: dot_2,
        map: map_2,
        title: 'Hello World!'
    });
}
var changeImg = setInterval(function(){

},300);



;(function ($, window, document, element) {
    jQuery.fn.changeImg = function () {

            $(this).children().first()
                .animate({opacity:0},250,function(){
                    this.css({display: "none"});
                    element.append(this).children().first()
                        .css({display:"block"})
                        .animate({opacity:1});
        });
  }
})(jQuery, window, document);

google.maps.event.addDomListener(window, 'load', initializeMap);
$(document).ready(function () {
    $("#desc_1").css({display:"block",opacity:1});
    $("#bs_1").addClass("center");
    $(".directions__slider").prepend($(".directions__slider .backscreen:last")).showcaseSlider(this);
    $('.center').ready(function(){
        if($('.center').is('secondimg')){
            setInterval(this.changeImg(),500);
            //$(this).children(.)
        };
    });
});
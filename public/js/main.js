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


google.maps.event.addDomListener(window, 'load', initializeMap);
$(document).ready(function () {
    $("#desc_1").css({display:"block",opacity:1});
    $("#bs_1").addClass("center");
    $(".directions__slider").prepend($(".directions__slider .backscreen:last")).showcaseSlider(this);
    imgInterval = setInterval(function(){
        changeImg($("#bs_1"));
    }, 7000);
    imgIntroInterval = setInterval(function(){
        $(".intro__backscreen").children().first()
                .animate({opacity: 0}, 750, function () {
                    $(this).css({zIndex: "1"});
                $(".intro__backscreen").append($(this)).children().first()
                        .css({zIndex: "2"})
                        .animate({opacity: 1}).delay(7000);

                });
    }, 7000);
    $(".main_wrapper").fullpage(
        {
            anchors: ['intro', 'directions', 'teachers', 'events', 'application', 'inform'],
            menu: '#fp_menu'
        }
    );
    var maskOptions = {
        translation: {
            'Z': {
                pattern: /[0-9]/
            },
            placeholder: "+7 ___ ___ __ __"
        }
    };
    $("#user_phone").mask("+7 (ZZZ) ZZZ-ZZ-ZZ", maskOptions);
    $(".application__inform .now .applicate").click(function(e){
        e.preventDefault();
        var nameGroup = $(this).children('span').text();
        var lock = false;

        $(".application__form .form-middle #send_direction").children().each(function(){
           if($(this).text() == nameGroup){
               $(this).attr("selected", "selected");
               lock = true;
           }
        });
        if(!lock) {
            $(".application__form .form-middle #send_direction").prepend($('<option value="0">' + nameGroup + '</option>'))
                .children().first().attr("selected", "selected");
        }
    });
    $(".moveDown").click(function(){
        $.fn.fullpage.moveSectionDown();
    });
    $(".wrapper-movedown").mouseenter(function(){
        $(".moveDown").animate({opacity:1},300);
    });
    $(".wrapper-movedown").mouseleave(function(){
        $(".moveDown").animate({opacity:0},700);
    });
});
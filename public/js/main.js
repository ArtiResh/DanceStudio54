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
    $(".directions__slider").showcaseSlider(this);
  //  $('.main_wrapper').fullpage();
});
window.initMap = function() {
  var map = new google.maps.Map($("#js-map"), {
    center: {lat: -34.397, lng: 150.644},
    scrollwheel: false,
    zoom: 8
  });
}

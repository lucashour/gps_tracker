function initMap() {
  $.ajax({
    url: 'json_index.php',
    dataType: 'json',
    success: function(locations){
      if (locations != "-1") {

        var distance = 0;
        var start = new Date(locations[0].registered_at);
        var end = new Date(locations[locations.length - 1].registered_at);

        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 15,
          center: new google.maps.LatLng(locations[0].latitude, locations[0].longitude),
          mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        var infowindow = new google.maps.InfoWindow();
        var marker, i;

        for (i = 0; i < locations.length; i++) {
          marker = new google.maps.Marker({
            position: new google.maps.LatLng(locations[i].latitude, locations[i].longitude),
            map: map
          });
          google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
              infowindow.setContent('<div><b>Fecha y hora:</b></div> ' + '<div>' + locations[i].registered_at + '</div>');
              infowindow.open(map, marker);
            }
          })(marker, i));

          if (i > 0){
            previous_position = new google.maps.LatLng(locations[0].latitude, locations[0].longitude);
            distance += google.maps.geometry.spherical.computeDistanceBetween (previous_position, marker.position);
          }
        }

        /* Distancia */
        $('#js-distance').data('distance_in_mts', distance);
        $('#js-distance').text((Math.round(distance*100) / 100).toString() + " mts");

        /* Tiempo */
        seconds = Math.abs(start - end) / (1000);
        $('#js-time').data('time_in_secs', seconds);
        $('#js-time').text((Math.round(seconds*100/60)/100).toString() + " minutos");

      }
    }
  });
}

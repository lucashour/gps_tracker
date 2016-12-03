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

        setDateData(locations[0].registered_at)
        setDistanceData(distance);
        setTimeData(start, end);
        setSpeedData(distance, start, end);

      }
    }
  });
}

function setDistanceData(distance){
  $('#js-distance').data('distance_in_mts', distance);
  distance_in_mts = (Math.round(distance * 100) / 100).toString();
  $('#js-distance').text(distance_in_mts + " mts");
}

function setTimeData(start, end){
  ms = Math.abs(start - end);
  x = ms / 1000;
  seconds = Math.round(x % 60).toString();
  if (seconds.length < 2) { seconds = "0" + seconds; }
  x /= 60;
  minutes = Math.round(x % 60).toString();
  if (minutes.length < 2) { minutes = "0" + minutes; }
  x /= 60;
  hours = Math.round(x % 24).toString();
  if (hours.length == 1) { hours = "0" + hours; }
  $('#js-time').data('time_in_secs', ms / 1000);
  $('#js-time').text(hours + " h " + minutes + " min " + seconds + " seg");
}

function setSpeedData(distance, start, end){
  km = distance / 1000;
  hs = Math.abs(start - end) / (1000 * 3600);
  speed = Math.round(100 * km / hs) / 100;
  $('#js-speed').text(speed + " km/h");
}

function setDateData(datetime){
  date = datetime.substr(0, 10);
  $('#js-date').text(date);
}

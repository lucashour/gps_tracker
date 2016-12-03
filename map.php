<!DOCTYPE html>
<html lang="es">

  <?php include_once("head.php"); ?>

    <?php include_once("position_class.php"); ?>

    <body>

      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBXg61_WRZBet7yTi_x1z8RRDtWJUNYZ90&callback=initMap&libraries=geometry" async defer></script>

      <?php include_once("header.php"); ?>

      <div id="body-content">

        <div id="map"></div>

        <div class="statistics-panel text-center">
          <div class="statistics-panel-header">
             Estadísticas
          </div>
          <div class="statistics-panel-body">
            <div class="text-bold">
              Fecha
            </div>
            <div id="js-date"></div>
            <div class="text-bold padding-top-min">
              Distancia recorrida
            </div>
            <div id="js-distance" data-distance_in_mts="">
            </div>
            <div class="text-bold padding-top-min">
              Tiempo transcurrido
            </div>
            <div id="js-time" data-time_in_secs=""></div>
            <div class="text-bold padding-top-min">
              Velocidad promedio
            </div>
            <div id="js-speed" class="padding-top-min"></div>
          </div>
        </div>
      </div>

    <?php include_once("footer.php"); ?>

    </body>
</html>

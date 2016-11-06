<!DOCTYPE html>
<html lang="es">

  <?php include_once("head.php"); ?>

  <body>

    <?php include_once("header.php"); ?>
    <?php
      include_once("position_class.php");
      $positions = Position::all();
    ?>

    <!-- CUERPO -->
    <div id="body-content">
      <div class="container well">
        <div class="row">
          <div class="col-md-12">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th width="33%">Latitud</th>
                  <th width="33%">Longitud</th>
                  <th width="33%">Fecha y hora</th>
                </tr>
              </thead>
              <tbody>
                <?php while ($row = mysqli_fetch_array($positions)) { ?>
                  <tr>
                    <td><?php echo $row['latitude']; ?></td>
                    <td><?php echo $row['longitude']; ?></td>
                    <td><?php echo $row['registered_at']; ?></td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <?php include_once("footer.php"); ?>

  </body>
</html>

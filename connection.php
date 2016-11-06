<?php

  DEFINE('DB_USER','u505763093_lucas');
  DEFINE('DB_PASS','taller_2');
  DEFINE('DB_HOST','mysql.hostinger.com.ar');
  DEFINE('DB_NAME','u505763093_lucas');

  function connect_to_database(){
    $dbconnect = mysqli_connect(DB_HOST,DB_USER,DB_PASS) or die('Imposible conectar con el host de la BD' . mysqli_connect_error());
    mysqli_select_db($dbconnect, DB_NAME) or exit('Error al seleccionar BD');
    return $dbconnect;
  }



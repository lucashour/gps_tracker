<?php

  DEFINE('DB_USER','taller_2');
  DEFINE('DB_PASS','taller_2');
  DEFINE('DB_HOST','localhost');
  DEFINE('DB_NAME','taller_2');

  function connect_to_database(){
    $dbconnect = mysqli_connect(DB_HOST,DB_USER,DB_PASS) or die('Imposible conectar con el host de la BD' . mysqli_connect_error());
    mysqli_select_db($dbconnect, DB_NAME) or exit('Error al seleccionar BD');
    return $dbconnect;
  }



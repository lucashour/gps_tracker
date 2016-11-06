<?php

 class Position {

  //public static function all($day = "NOW()"){
  public static function all(){
    include_once("connection.php");
    $connection = connect_to_database();
    //$query = "SELECT * FROM `positions` WHERE (`registered_at` >= '$day') ORDER BY registered_at ASC";
    $query = "SELECT * FROM `positions` ORDER BY registered_at ASC";
    $result = mysqli_query($connection, $query);
    if (mysqli_num_rows($result) > 0)
      return $result;
    else
      return NULL;
    mysqli_close($connection);
  }

  public static function create($data){
    include_once("connection.php");
    $connection = connect_to_database();
    $query = "INSERT INTO `positions` (`id`, `latitude`, `longitude`, `registered_at`) VALUES (NULL, '$data[latitude]', '$data[longitude]', '$data[registered_at]')";
    $result = mysqli_query($connection, $query);
    mysqli_close($connection);
    return $result;
  }

 }

?>

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

  public static function all_by_json(){
    $positions = Position::all();
    if ($positions == NULL)
      echo -1;
    else {
      $array = array();
      while ($row = mysqli_fetch_array($positions, MYSQLI_ASSOC )) { array_push($array, $row); }
      echo json_encode($array);
    }
  }

  public static function create($data){
    include_once("connection.php");
    $connection = connect_to_database();
    $datetime = Position::set_datetime($data[registered_at]);
    $query = "INSERT INTO `positions` (`id`, `latitude`, `longitude`, `registered_at`) VALUES (NULL, '$data[latitude]', '$data[longitude]', '$datetime')";
    $result = mysqli_query($connection, $query);
    mysqli_close($connection);
    return $result;
  }

  private static function set_datetime($time){
    date_default_timezone_set('America/Argentina/Buenos_Aires');
    $datetime = date('Y-m-d') . " " . $time;
    return $datetime;
  }

}

?>

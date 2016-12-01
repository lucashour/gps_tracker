<?php
  class ApplicationLog {

    public static function create($message){
      include_once("connection.php");
      $connection = connect_to_database();
      $query = "INSERT INTO `logs` (`id`, `message`) VALUES (NULL, '$message')";
      $result = mysqli_query($connection, $query);
      mysqli_close($connection);
      return $result;
    }

  }
?>

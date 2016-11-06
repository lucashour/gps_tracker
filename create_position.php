<?php
  include_once("position_class.php");
  $data = array(
    'latitude'      => $_GET['latitude'],
    'longitude'     => $_GET['longitude'],
    'registered_at' => $_GET['registered_at']
  );
  $success = Position::create($data);
?>

<?php
  include_once("application_log_class.php");
  $message = $_GET['message'];
  $success = ApplicationLog::create($message);
?>

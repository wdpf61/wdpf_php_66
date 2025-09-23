<?php session_start();

require_once("configs/app_config.php");
  
 
 unset($_SESSION["uid"]);
 unset($_SESSION["uname"]);
 unset($_SESSION["urole"]);
 session_destroy();
 
 header("location:$base_url");
?>
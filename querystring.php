<?php 
 
  $page=null;
  if(isset($_GET["page"])){
     $page= $_GET["page"];
     $name= $_GET["name"];
     echo "My name is $name <br>";
     echo $page;
  }
?>
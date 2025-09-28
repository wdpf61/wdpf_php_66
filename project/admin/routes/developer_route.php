<?php

  if($page=="probot"){
    $found=include("views/pages/developer/probot.php");   
   }elseif($page=="manage-tables"){
    $found=include("views/pages/developer/table/manage_table.php");
   }elseif($page=="create-table"){
    $found=include("views/pages/developer/table/create_table.php");
   }elseif($page=="edit-table"){
    $found=include("views/pages/developer/table/edit_table.php");
   }elseif($page=="details-table"){
    $found=include("views/pages/developer/table/details_table.php");
   }

?>
<?php

if($page=="home"){
    $found=include("views/pages/dashboard.php");           
}

if($page=="contact"){
    $found=include("views/pages/contact_us.php");        
}

if($page=="profile"){
    $found=include("views/pages/profile.php");        
}

?>
<?php


if($page=="create-production"){
	$found=include("views/pages/production/create_production.php");
}elseif($page=="edit-production"){
	$found=include("views/pages/production/edit_production.php");
}elseif($page=="productions"){	     
	$found=include("views/pages/production/manage_production.php");
   
}elseif($page=="details-production"){
	$found=include("views/pages/production/details_production.php");
}elseif($page=="view-production"){
	$found=include("views/pages/production/view_production.php");
}
?>

<?php
if($page=="create-cattle"){
	$found=include("views/pages/agro/cattle/create_cattle.php");   
}elseif($page=="cattle"){
	$found=include("views/pages/agro/cattle/manage_cattle.php");
}elseif($page=="edit-cattle"){	
	$found=include("views/pages/agro/cattle/edit_cattle.php");
}elseif($page=="details-cattle"){	
	$found=include("views/pages/agro/cattle/details_cattle.php");
}

?>

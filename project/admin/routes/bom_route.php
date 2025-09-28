<?php
if($page=="create-bom"){
	$found=include("views/pages/production/bom/create_bom.php");   
}elseif($page=="edit-bom"){
	$found=include("views/pages/production/bom/edit_bom.php");
}elseif($page=="boms"){
	$found=include("views/pages/production/bom/manage_bom.php");   
}elseif($page=="details-bom"){
	$found=include("views/pages/production/bom/details_bom.php");
}elseif($page=="delete-bom"){
	$found=include("views/pages/production/bom/delete_bom.php");
}

?>

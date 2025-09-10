<?php
include_once "../../config/db_config.php";
include_once "../../model/district.model.php";

// security purpuse 
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods:POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');


if(isset($_POST['name'])){
$name = $_POST['name'];
$division_id = $_POST['division_id'];
$data =new District("",$name, $division_id);
$data = $data->save();

if($data){
    echo json_encode($data);
}else{
    echo json_encode("Data is not saved");
}

}


?>
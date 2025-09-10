<?php
include_once "../../config/db_config.php";
include_once "../../model/district.model.php";

// security purpuse 
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods:POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');


if(isset($_POST['id'])){
$division_id = $_POST['id'];
$data = District::findByDivision($division_id);

if($data){
    echo json_encode($data);
}else{
    echo json_encode("Data is not saved");
}

}

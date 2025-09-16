<?php
include_once "db_config.php";

// security purpuse 
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods:GET');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');


if(isset($_POST['name'])){
    $stmt= $db->query("insert into users (name, email,password, img, role_id)
    values('{$_POST['name']}','{$_POST['email']}','{$_POST['password']}','{$_POST['img']}',{$_POST['role_id']})");
    
    echo json_encode($stmt);
}











?>
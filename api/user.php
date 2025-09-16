<?php
include_once "db_config.php";


// security purpuse 
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods:GET');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');


$stmt= $db->query("select * from users");
$data= $stmt->fetch_all(MYSQLI_ASSOC);
echo json_encode($data);



?>
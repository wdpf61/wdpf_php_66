<?php
include_once "db_config.php";

// json data
$data = json_decode(file_get_contents("php://input"));   
//  print_r( $data->id) ;
if(isset($data->id)){
 $id= $data->id;
 $stmt= $db->query("select * from districts where division_id=$id");
 $data= $stmt->fetch_all(MYSQLI_ASSOC);
 echo json_encode($data);
}


// if(isset($_POST['division_id'])){    // when formdata; 
//  $id= $_POST['division_id'];         // when formdata
//  $id= $data->id;
//  $stmt= $db->query("select * from districts where division_id=$id");
//  $data= $stmt->fetch_all(MYSQLI_ASSOC);
//  echo json_encode($data);
// }

?>
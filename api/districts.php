<?php
include_once "db_config.php";

if(isset($_POST['division_id'])){
 $id= $_POST['division_id'];
 $stmt= $db->query("select * from districts where division_id=$id");
 $data= $stmt->fetch_all(MYSQLI_ASSOC);
 echo json_encode($data);

// print_r($data);
}

?>
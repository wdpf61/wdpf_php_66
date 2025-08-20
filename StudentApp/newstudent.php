<?php
 include "student.class.php";

 if(isset($_POST['btn_Name'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    
    $student= new Student($id,$name,$address);
    $save= $student->save();
    if($save){
      echo $save;

      unset($_POST['id']);
      unset($_POST['name']);
      unset($_POST['address']);


      header("location:index.php");
    } 

 }



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
        <h1> New Student</h1>
                <form action="" method="POST">
                <label for="n">Id</label> <br>
                <input type="text" name="id" id="id"> <br> <br>
                <label for="n">Give Your Name</label> <br>
                <input type="text" name="name" id="name"> <br> <br>
                <label for="n">Give Your Address</label> <br>
                <input type="text" name="address" id="address"> <br> <br>
                <input type="submit" name="btn_Name" >
                </form>
      
</body>
</html>
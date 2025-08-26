<?php
session_start();

if(!$_SESSION["name"] ){
   header("location:login.php");
}
 include_once ("student.class.php");
//  require "student.class.php";
//  require_once
//  include_once
 
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
     
    } 

 }


// delete function

  if(isset($_GET['id'])){
    $id= $_GET['id'];
    Student::delete($id);
  }
// Edit/serarch function



//  update function 

if(isset($_POST['btn_update'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    
    $student= new Student($id,$name,$address);
    $update= $student->update();
    if($update){
      echo $update;
      unset($_POST['id']);
      unset($_POST['name']);
      unset($_POST['address']);
     
    } 

 }

    $search_student=null;
  if(isset($_GET['EditId'])){
    $id= $_GET['EditId'];
    $search_student =  Student::search($id);

    // print_r( $search_student);
  }


// delete function

  if(isset($_GET['logout'])){
    $logout= $_GET['logout'];
    if($logout){
     session_unset();
     session_destroy();
    header("location:login.php");
    }
  }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <style>
        body{
            display: flex;
            place-content: center;
            gap: 20px;
        }
        table,th,td{
            border-collapse: collapse;
            border: 1px solid black;
            padding: 10px;
        }

        tr:nth-child(even){
           background-color: lightgrey;
        }
     </style>
</head>
<body>
       <h1>Welcome <?php echo $_SESSION["name"] ??  "User" ; ?></h1>

        <a href="studentApp.php?logout=1">Logout</a>
       <div>
            <h1>Student Table </h1>
             <a href="index.php">New Student</a>
            <?php 
               echo  Student::showStudent(); 
            ?>
       </div>
     
        <?php 
          if(is_null($search_student)) {
        ?>
       <div>
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
       </div>
        <?php 
         }else{
        ?>
       <div>
         <h1> Update Student</h1>
            <form action="" method="POST">
            <label for="n">Id</label> <br>
            <input type="text" name="id" id="id"  value="<?php echo $search_student['id'] ?>"> <br> <br>
            <label for="n">Give Your Name</label> <br>
            <input type="text" name="name" id="name" value="<?php echo $search_student['name'] ?>"  > <br> <br>
            <label for="n">Give Your Address</label> <br>
            <input type="text" name="address" id="address" value="<?php echo $search_student['address'] ?>"  > <br> <br>
            <input type="submit" name="btn_update"  value="Update" >
            </form>
       </div>
    <?php }?>

       
        
     

</body>
</html>
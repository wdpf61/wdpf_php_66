<?php
 if(isset($_POST['btn_Name'])){
    $name = $_REQUEST['name'];
     echo $name;
  //  print_r($_GET);
  //  print_r($_POST);
  //  print_r($_REQUEST);
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
    <h1> This  is  PHP File</h1>
     <form action="" method="POST">
       <label for="n">Give Your Name</label> <br>
       <input type="text" name="name" id="n"> <br> <br>
       <input type="submit" name="btn_Name" >
     </form>
   
</body>
</html>
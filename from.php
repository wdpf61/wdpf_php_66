<?php
 $name = null;
 $errors=[];
//  print_r($_GET);
 if(isset($_GET['btn_Name'])){
    $name = $_GET['name'];
    
    if(empty( $name)){
      $errors['name']= "Name field is Required";
    }elseif(!preg_match("/^[a-zA-Z .]{2,}$/", $name)){
         $errors['name']= "Valid Name is Required";
    }
   
 }



  $errors["email"]= "Not a Valid Eamail";
  $errors[0]= "index";

  print_r($errors);
 
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
     <form action="from.php" method="GET">
       <label for="n">Give Your Name</label> <br>
       <input type="text" name="name" id="n"> <br> <br>
        <?php if(!empty($errors["name"])) echo "<p>{$errors['name']}</p>"; ?>
       <input type="submit" name="btn_Name" >

     </form>
    <h2>My Name is <?php echo $name ;?> </h2>
</body>
</html>
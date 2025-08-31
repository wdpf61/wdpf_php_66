<?php
$name=null;
 if(isset($_POST['btn_Name'])){
    $name = $_REQUEST['name'];
     echo $name;
    $errors=[];
    $namePattern="/^[a-zA-Z .]{3,20}$/";
    // name validation 
    if(empty($name)){
      $errors['name']= "Please fill the name field";
    }else if(!preg_match($namePattern,$name)){
       $errors['name']= "Your name must contain 3 to 20 characters";
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
    <h1> This  is  PHP File</h1>
     <form action="" method="POST">
       <label for="n">Give Your Name</label> <br>
       <input type="text" name="name" id="n" value="<?php echo $name;?>"> <br> 
        <?php
           echo   empty($errors['name']) ? "": $errors['name'];
        ?>
       <br>
       <input type="submit" name="btn_Name" >
     </form>
   
</body>
</html>
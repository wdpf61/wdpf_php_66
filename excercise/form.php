<?php 

 if(isset($_GET['btn_submit'])){
   $person=$_GET['name'];
   greet($person);
 }

function greet($person){
    $login=  $person ? $person : "Guest";
    echo "Hello $login";
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
    <form action="" method="get">
          <input type="text" name="name"> <br><br>
          <input type="submit" name="btn_submit" id="">
    </form>
</body>
</html>
<?php
session_start();
$_name="hasnat";
$_password="827ccb0eea8a706c4c34a16891f84e7b";

if(isset($_POST["btn_login"])){
    $name = $_POST['name'];
    $password = $_POST['password'];
    $message=[];
    if($_name == $name && $_password == md5($password)){
       $message= ["login"=>"Welcome $name"];
       $_SESSION["name"]=$name;
       header("location:studentApp.php");
    }else{
       $message= ["login"=>"incorrect username or password"];
    //    header("location:login.php");
    }
    echo   $message["login"];
}



//  echo md5(12345);
//  echo $Password = password_hash(12345,PASSWORD_BCRYPT);
//  echo password_verify(12345,$hashPassword);




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
            height: 100vh;
        }
    </style>
</head>
<body>
    
       <div>
         <h1>Login Form</h1>
            <form action="login.php" method="POST">
            <label for="n">Username</label> <br>
            <input type="text" name="name" id="name"> <br> <br>
            <label for="n">Password</label> <br>
            <input type="password" name="password" id="password"> <br> <br>
            <input type="submit" name="btn_login" value="login">
            </form>
       </div>

</body>
</html>
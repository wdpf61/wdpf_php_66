<?php
session_start();

function login($username, $password){
 $data= file("user.txt");

foreach ($data as $row) {
   list($name,$pass,$role)=explode(",", $row);

   if($name == $username && $pass== $password){
       $_SESSION["name"]=$name;
       $_SESSION["role"]=$role;
       header("location:app.php");
     
      break;

   }else{
     return ["login"=>"incorrect username or password"];
   }
  
}

}




if(isset($_POST["btn_login"])){
    $name = $_POST['name'];
    $password = $_POST['password'];
 
    $message =login($name,$password);
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
            <input type="password" name="password" id="password"><br><br>
             <?php
                if(isset($message['login'])){
                  echo $message['login'];
                }
             ?>
            <input type="submit" name="btn_login" value="login">
            </form>
       </div>

</body>
</html>
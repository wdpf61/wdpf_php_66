<?php
session_start();
    $db=new Mysqli("localhost", "root", "", "batch66");
  
function login($username, $password){
  global $db;


     $stmt= $db->query("select users.name, users.password, roles.name as role from users, roles where users.name='$username' or users.email='$username' and users.password='$password'
     and users.role_id= roles.id
     
     ");
      $data= $stmt->fetch_object();
     print_r($data);
 




   if($data){
       $_SESSION["name"]=$data->name;
       $_SESSION["role"]= $data->role;
       header("location:app.php");

   }else{
     return ["login"=>"incorrect username or password"];
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
            <form action="" method="POST">
            <label for="n">Username/email</label> <br>
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
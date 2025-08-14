<?php 

 if(isset($_GET['btn_submit'])){
   $login=$_GET['login'];
   isLogin($login,);
 }

function isLogin($login){
    if ($login) {
       echo "Welcome";
    }else{
          echo "Please sing in";
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
    <form action="" method="get">
          <label for="license">Do You want to Login</label> <br><br>
           <select name="login" id="">
              <option value="1">Yes</option>
              <option value="0">No</option>
           </select> <br> <br>
          <input type="submit" name="btn_submit" id="">
    </form>
</body>
</html>
<?php 

 if(isset($_GET['btn_submit'])){
   $license=$_GET['license'];
   $age=$_GET['age'];
   drivingLicense($license,   $age);
 }

function drivingLicense($license,$age){
    if ($license == 1 && $age > 18) {
       echo "You Can Drive the car";
    }else{
          echo "You Can Not Drive the car";
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
          <label for="license">Do You Have Lincese</label> <br><br>
           <select name="license" id="">
              <option value="1">Yes</option>
              <option value="0">No</option>
           </select> <br> <br>
          <label for="age">Give Your Age</label> <br>
          <input type="text" name="age" id="age"><br><br>
          <input type="submit" name="btn_submit" id="">
    </form>
</body>
</html>
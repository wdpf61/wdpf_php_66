<?php

$number1=null;
$number2=null;
$number3=null;

$largest= null;


if (isset($_GET['btn_submit'])) {
    $number1 = $_GET['number1'];
    $number2 = $_GET['number2'];
    $number3 = $_GET['number3'];
    if( $number1 > $number2 && $number1 > $number3){
        $largest = $number1;
    }elseif( $number2 > $number1 && $number2 > $number3){
        $largest = $number2;
    }else{
       $largest = $number3;
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
     <?php 
         if ($largest) {
             echo "<h1 class=''>The largest Number is  $largest  among $number1,$number2, $number3 </h1>"; 
          
         }
     ?>
    <form action="" method="GET">
        <label for="m">Give The 1st Number</label> <br>
        <input type="text" name="number1" ><br> <br>
        <label for="m">Give The 2nd Number</label> <br>
        <input type="text" name="number2" ><br> <br>
        <label for="m">Give The 3rd Number</label> <br>
        <input type="text" name="number3" ><br> <br>

        <button type="submit" name="btn_submit">Submit</button>
    </form>

    <script>
        


    </script>

</body>

</html>
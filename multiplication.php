<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="get">
         <input type="text" name="number" id=""> <br>
         <input type="submit" name="submit" >
    </form>
    <?php
    //   $abc= null;
    //   echo isset($abc);
    //  echo empty($abc)
    // print_r($_GET);
    
     if(isset($_GET['submit'])){
       $mulN= $_GET['number'];

       $html= "<ul>";
       for($i=1; $i<= 10; $i++){
           $res= $mulN * $i;
           $html.= "<li>{$mulN} x {$i} = {$res}</li>";
       }
      $html.= "</ul>";
      echo $html;

     }
    
    
    
    ?>

  

</body>
</html>
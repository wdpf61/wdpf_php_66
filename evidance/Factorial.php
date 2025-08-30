<?php
include_once "LogicalTest.php";
$number=null;
$result=null;
if (isset($_GET['btn_submit'])) {
    $number = $_GET['number'];
    $result= LogicalTest::facterial($number);
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

         echo "<h1 class=''>Factarial of $number is $result </h1>"; 
     ?>
    <form action="" method="GET">
        <label for="m">Give The Number</label> <br>
        <input type="text" name="number" value="<?php echo $number; ?>"><br> <br>
        <button type="submit" name="btn_submit">Submit</button>
    </form>

    <script>
        


    </script>

</body>

</html>
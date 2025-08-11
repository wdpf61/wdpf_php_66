<?php
$result = 1;
$number=null;
if (isset($_GET['btn_submit'])) {
    $number = $_GET['number'];
    for ($i=1; $i <= $number ; $i++) { 
       $result *=$i;
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
        $result =   $result > 1 ? $result : "";
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
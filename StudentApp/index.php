<?php
 include "student.class.php";

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
            gap: 20px;
        }
        table,th,td{
            border-collapse: collapse;
            border: 1px solid black;
            padding: 10px;
        }

        tr:nth-child(even){
           background-color: lightgrey;
        }
     </style>
</head>
<body>
       <div>
            <h1>Student Table </h1>
             <a href="newstudent.php">New Student</a>
            <?php echo  Student::showStudent(); ?>
       </div>
     

   

</body>
</html>
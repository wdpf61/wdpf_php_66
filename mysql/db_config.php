<?php

define("SERVER",'localhost');
define("USER",'root');
define("PASS",'');
define("DATABASE",'batch66');

$db = new Mysqli(SERVER,USER,PASS,DATABASE);
// print_r($db );

$data= $db->query("select * from students");

// print_r($data->fetch_all());
?>

<table>
   <tr>
     <th>Id</th>
     <th>Name</th>
     <th>Result</th>
   </tr>

   <?php
   
     while ($row = $data->fetch_assoc()) {
     echo   " <tr>
     <th>{$row['id']}</th>
     <th>{$row['name']}</th>
     <th>{$row['grade']}</th>
     </tr>";
    }



   ?>

</table>
<?php 
  echo "Hello world <br>";
  echo "<br>";
  $abc =   print("Hello World"); 
  echo "<br>";
  
  define("PI", 3.14169);
  
  echo PI;



  //echo $abc;
  #echo $abc;
  /*echo $abc;
   echo $abc; */



   $fname= "Khaled";
   $lName= "Mahmud";

   $uf=strtoupper($fname);

   echo "My Name is {$uf} {$lName}";
     echo "<br>";
   
    printf("My Name is %s %s" , strtoupper($fname) , strtolower($lName),  );
    $sprint=  sprintf("My Name is %s %s" , strtoupper($fname) , strtolower($lName) );

    echo  $sprint;
      die();

//   data type 
 $name= "Khabib";  // string
 $cost = 1200;     // int
 $cost2= 50.33;     // float , double , fraction
 $isActive = true;
  echo "<br>";
 $studentList= ["Jamal", "kamal", "Hasib", "Asif"];
 $student=   ["Name"=>"Jamal", "Age"=>29, "Address"=> "Dhaka"];  //associative array

 print_r($studentList);
  echo "<br>";
 print_r( $student);
  echo "<br>";
 echo $studentList[1];
 echo $student["Address"];
 $student=  (object)  ["Name"=>"Jamal", "Age"=>29, "Address"=> "Dhaka"];
 echo "<br>";
 $number= null;  
 print_r(json_encode($student));

 






?>
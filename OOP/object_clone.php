<?php
  class Person1{
     public $name;
  }

 $person1= new Person1();
 $person1->name = "Rashed";

 $person2 = clone $person1;
 $person2->name ="Jamil";
 
 echo $person1->name;
 echo "<br>";
 echo $person2->name;

?>
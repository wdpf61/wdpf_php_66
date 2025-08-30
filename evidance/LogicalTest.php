<?php


interface ILogicalTest{
   static function facterial($number);
   static function IsPrime($number);
   static function MinMax($number);
   static function Result($number);
   static function FileUpload($number);
}





class LogicalTest implements ILogicalTest{

static function facterial($number){
 $result = 1;

  for($i=1; $i<=$number; $i++){
     $result *=$i;
  }
  return $result;
}

static function IsPrime($number){

  if($number < 2){return false;} 
  for($i=2; $i< $number; $i++){
    if($number%$i == 0){
       return false;
    }
  }
  return true;
}





}




?>
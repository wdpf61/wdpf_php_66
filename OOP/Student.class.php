<?php 

class Person{
  public $name;
  public $address;
  public $phone; 
 
  public function __construct($input_name, $input_address, $input_phone)
  {
    $this->name= $input_name;
    $this->address= $input_address;
    $this->phone= $input_phone;
  }
  
  function ShowInfo(){
      echo "$this->name | $this->address| $this->phone";
  }
}


class Student extends Person{
    public $className;
    public $roll;

   public function __construct($name, $address, $phone, $className, $roll)
   {
       parent::__construct($name, $address, $phone);
       $this->className= $className;
       $this->roll= $roll;
   }


     function ShowInfo(){
      echo "$this->name | $this->address| $this->phone | $this->className | $this->roll";
    }


}

class Teacher extends Person{
    public $subject;
    public $age;

   public function __construct($name, $address, $phone, $subject, $age)
   {
       parent::__construct($name, $address, $phone);
       $this->subject= $subject;
       $this->age= $age;
   }


     function ShowInfo(){
      echo "$this->name | $this->address| $this->phone | $this->subject | $this->age";
    }


}

//  $student1= new Student("Hasnat", "Dhaka", "01985478899","Five", 6);
//  $student1->ShowInfo();

 //   interface 

 interface IPaymenMethod{
    public function getBalance();
    public function payNow();
 }


class BkashPayment implements IPaymenMethod{

   public function getBalance()
   { 
       echo "Your bkash balance is 2000";
   }  
   public function payNow()
   {
     echo "Bkash payment successfull ";
   }  
}

class RoketPayment implements IPaymenMethod{


   public function getBalance()
   {
     echo "your Roket balance is 1000";
   }  
   public function payNow()
   {
      echo "Roket payment successfull";
   }  
}

$bkash= new BkashPayment();
$bkash->payNow();
$roket= new RoketPayment();
$roket->getBalance();


?>
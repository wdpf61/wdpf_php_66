<?php  
  class Site{
    public function index(){
        echo "Index";
    }
     public function contact(){
       include("contact.php");
     }
  }
  class Math{
      public function index(){
        echo "Index";
      }
      public function add($a,$b){
          echo $a+$b;
      }
      public function sub($a,$b){
        echo $a-$b;
      }
      public function div($a,$b){
        echo $a/$b;
      }
      public function mul($a,$b){
        echo $a*$b;
      }
  }

  //print_r($_SERVER['QUERY_STRING']);

  if(isset($_GET["class"])){
    $class=$_GET["class"];
      
    if(class_exists($class)){

        if(!isset($_GET["method"]))
        {
          $method="index";
        }else{
          $method=$_GET["method"];
        }      

        $obj=new $class();
        //print_r(array($obj,$method));  
        if(method_exists($obj,$method)){

          $args=$_GET["args"];
          $params=str_replace("/",",",$args[0]);
          
          call_user_func_array(array($obj,$method), explode(',',$params));
        
        }else{
          echo "Method not found";
        }

    }else{
       echo $class." class not exits.";
    }
      

  
  }else{
    echo "Default Class";
  }


?>
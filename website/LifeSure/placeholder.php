<?php 


if(isset($_GET['page'])){

 $page= $_GET['page'];

  if( $page =="home"){
      include("pages/home.php");
  }elseif($page =="about"){
       include("pages/about.php");
  }elseif($page =="blog"){
       include("pages/blog.php");
  }elseif($page =="service"){
       include("pages/service.php");
  }else{
      include("pages/404.php");
  }

}else{
     include("pages/home.php");
}







?>
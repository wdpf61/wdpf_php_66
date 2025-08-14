<?php



 if(isset($_GET['page'])){
    $page =$_GET['page'];

    if($page == "home"){
       include("page/home.php");
    }elseif($page == "menu"){
      include("page/menu.php");
    }elseif($page == "about"){
      include("page/about.php");
    }elseif($page == "book"){
      include("page/book.php");
    }
        
   
 }else{
     include("page/home.php");
 }
 






?>
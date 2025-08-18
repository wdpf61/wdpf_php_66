<?php


if(isset($_GET["page"])){

  $pageName= $_GET["page"];
  
 if($pageName == "home"){
     include "pages/home.php";
 }elseif($pageName == "about"){
       include "pages/about.php";
 }elseif($pageName == "contact"){
       include "pages/contact.php";
 }elseif($pageName == "category"){
       include "pages/category.php";
 }


}else{
     include "pages/home.php";
}









?>
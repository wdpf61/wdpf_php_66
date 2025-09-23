<?php

function page_header($config){
  $html="";
  $html.="<header class=\"py-3 mb-4 border-bottom\">";
  $html.="<div class=\"container d-flex flex-wrap justify-content-center\">";
  $html.="<a href=\"/\" class=\"d-flex align-items-center mb-3 mb-lg-0 me-lg-auto text-dark text-decoration-none\">";
  $html.="<svg class=\"bi me-2\" width=\"40\" height=\"32\"><use xlink:href=\"#bootstrap\"></use></svg>";
  $html.="<span class=\"fs-4\">{$config["title"]}</span>";
  $html.="</a>";
  $html.="<form class=\"col-12 col-lg-auto mb-3 mb-lg-0\">";
  $html.="<input type=\"search\" name=\"txtSearch\" class=\"form-control\" placeholder=\"Search...\" aria-label=\"Search\">";
  $html.="</form>";
  $html.="</div>";
  $html.="</header>";

 return $html;
}

 function form_wrap_open($config=[]){
  $config["title"]=isset($config["title"])?$config["title"]:"&nbsp;"; 
   $html="<div class='card' style='padding:10px;margin-top:10px;box-shadow:0 0  19px 3px rgba(0,0,0,.2)'>";
   $html.="<div class='card-header'>{$config["title"]}</div>";
   $html.="<div class='card-body'>";
   return $html; 
}

 function form_wrap_close(){
   $html="</div>";
   $html.="</div>";
   return $html;
 }

 function table_wrap_open(){
    $html="<div style='padding:10px;margin-top:10px;box-shadow:0 0 19px 3px rgba(0,0,0,.2)'>";
    
    return $html; 
 }
 
  function table_wrap_close(){
   
    $html="</div>";
  
 
    return $html;
  }
?>
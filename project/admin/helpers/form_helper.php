<?php
// Form Functions
function select_field($config){
    global $db,$tx; 
   $config["value"]=isset($config["value"])?$config["value"]:""; 
   $id=isset($config["value_column"])?$config["value_column"]:"id";  
   $name=isset($config["display_column"])?$config["display_column"]:"name";  

   $ucname=ucfirst($config["name"]);
   //echo "select $id,$name from {$tx}{$config["table"]}";
   $result=$db->query("select $id,$name from {$tx}{$config["table"]}");
   $html="<div class='form-group row'>";
   $html.="<label class='col-sm-2 col-form-label'>{$config["label"]}</label>";
   $html.="<div class='col-sm-10'>"; 
   $html.="<select name='{$config["name"]}' class='form-select' style='width:100%'>";
   while(list($id,$name)=$result->fetch_row()){
    
     if($id==$config["value"]){
       $html.="<option value='$id' selected>$name</option>";  
     }else{
       $html.="<option value='$id'>$name</option>";  
     }
 
   }
   $html.="</select>";
   $html.="</div>";
   $html.="</div>";
 
   return $html;
 
 }
 
   function input_button($config){
      $html="<input type='{$config["type"]}' value='{$config["value"]}' name='{$config["name"]}' class='btn btn-info' />";
      return $html;
   }

   function input_field($config){

      $config["required"]=isset($config["required"])?$config["required"]:"";
      $config["placeholder"]=isset($config["placeholder"])?$config["placeholder"]:"";
      $config["value"]=isset($config["value"])?$config["value"]:"";     
      $config["type"]=isset($config["type"])?$config["type"]:"text"; 
      $config["checked"]=isset($config["checked"])?$config["checked"]:""; 
  
      $html="<div class='form-group row'>";

       if($config["type"]!="hidden"){
        $html.="<label for='{$config["name"]}' class='col-sm-2 col-form-label'>{$config["label"]}</label>";
       }

       $style="";
       $css_class="form-control";
       if($config["type"]=="radio" || $config["type"]=="checkbox")
       {
        $css_class="form-check-input";
        $style="style='width:40px;height:40px;'";
       }

      $html.="<div class='col-sm-10'>";
      $html.="<input type='{$config["type"]}'  class='$css_class' $style name='{$config["name"]}' id='{$config["name"]}' value='{$config["value"]}' placeholder='{$config["placeholder"]}' {$config["required"]} {$config["checked"]}>";
      $html.="</div>";
      $html.="</div>";  
  
      return $html;
  
   }

   function input_text($config){

    $config["required"]=isset($config["required"])?$config["required"]:"";
    $config["placeholder"]=isset($config["placeholder"])?$config["placeholder"]:"";
    $config["value"]=isset($config["value"])?$config["value"]:"";     
    $config["type"]=isset($config["type"])?$config["type"]:"text"; 
    $config["checked"]=isset($config["checked"])?$config["checked"]:""; 

    $html="<div class='form-group row'>";

     if($config["type"]!="hidden"){
      $html.="<label for='{$config["name"]}' class='col-sm-2 col-form-label'>{$config["label"]}</label>";
     }

     $css_class="form-control";
     if($config["type"]=="radio" || $config["type"]=="checkbox")
     {
      $css_class="form-check-input";
     }

    $html.="<div class='col-sm-10'>";
    $html.="<input type='{$config["type"]}' class='$css_class' name='{$config["name"]}' id='{$config["name"]}' value='{$config["value"]}' placeholder='{$config["placeholder"]}' {$config["required"]} {$config["checked"]}>";
    $html.="</div>";
    $html.="</div>";  

    return $html;

 }

   function input_checkbox($config){
    $config["required"]=isset($config["required"])?$config["required"]:"";
    $config["placeholder"]=isset($config["placeholder"])?$config["placeholder"]:"";
    $config["value"]=isset($config["value"])?$config["value"]:"";     
    $config["type"]=isset($config["type"])?$config["type"]:"text"; 
    $config["checked"]=isset($config["checked"])?$config["checked"]:""; 

    $html="<div class='form-group row'>";

     if($config["type"]!="hidden"){
      $html.="<label for='{$config["name"]}' class='col-sm-2 col-form-label'>{$config["label"]}</label>";
     }

     $css_class="form-control";
     if($config["type"]=="radio" || $config["type"]=="checkbox")
     {
      $css_class="form-check-input";
     }

    $html.="<div class='col-sm-10'>";
    $html.="<input type='{$config["type"]}' class='$css_class' name='{$config["name"]}' id='{$config["name"]}' value='{$config["value"]}' placeholder='{$config["placeholder"]}' {$config["required"]} {$config["checked"]}>";
    $html.="</div>";
    $html.="</div>";  

    return $html;
   }

   function input_radio($config){
    $config["required"]=isset($config["required"])?$config["required"]:"";
    $config["placeholder"]=isset($config["placeholder"])?$config["placeholder"]:"";
    $config["value"]=isset($config["value"])?$config["value"]:"";     
    $config["type"]=isset($config["type"])?$config["type"]:"text"; 
    $config["checked"]=isset($config["checked"])?$config["checked"]:""; 

    $html="<div class='form-group row'>";

     if($config["type"]!="hidden"){
      $html.="<label for='{$config["name"]}' class='col-sm-2 col-form-label'>{$config["label"]}</label>";
     }

     $css_class="form-control";
     if($config["type"]=="radio" || $config["type"]=="checkbox")
     {
      $css_class="form-check-input";
     }

    $html.="<div class='col-sm-10'>";
    $html.="<input type='{$config["type"]}' class='$css_class' name='{$config["name"]}' id='{$config["name"]}' value='{$config["value"]}' placeholder='{$config["placeholder"]}' {$config["required"]} {$config["checked"]}>";
    $html.="</div>";
    $html.="</div>";  

    return $html;
   }

   function input_textarea($config){
    $config["required"]=isset($config["required"])?$config["required"]:"";
    $config["placeholder"]=isset($config["placeholder"])?$config["placeholder"]:"";
    $config["value"]=isset($config["value"])?$config["value"]:"";     
    $config["type"]=isset($config["type"])?$config["type"]:"text"; 
    $config["checked"]=isset($config["checked"])?$config["checked"]:""; 

    $html="<div class='form-group row'>";

     if($config["type"]!="hidden"){
      $html.="<label for='{$config["name"]}' class='col-sm-2 col-form-label'>{$config["label"]}</label>";
     }

     $css_class="form-control";
     if($config["type"]=="radio" || $config["type"]=="checkbox")
     {
      $css_class="form-check-input";
     }

    $html.="<div class='col-sm-10'>";
    $html.="<input type='{$config["type"]}' class='$css_class' name='{$config["name"]}' id='{$config["name"]}' value='{$config["value"]}' placeholder='{$config["placeholder"]}' {$config["required"]} {$config["checked"]}>";
    $html.="</div>";
    $html.="</div>";  

    return $html;
   }

   function input_file($config){
    $config["required"]=isset($config["required"])?$config["required"]:"";
    $config["placeholder"]=isset($config["placeholder"])?$config["placeholder"]:"";
    $config["value"]=isset($config["value"])?$config["value"]:"";     
    $config["type"]=isset($config["type"])?$config["type"]:"text"; 
    $config["checked"]=isset($config["checked"])?$config["checked"]:""; 

    $html="<div class='form-group row'>";

     if($config["type"]!="hidden"){
      $html.="<label for='{$config["name"]}' class='col-sm-2 col-form-label'>{$config["label"]}</label>";
     }

     $css_class="form-control";
     if($config["type"]=="radio" || $config["type"]=="checkbox")
     {
      $css_class="form-check-input";
     }

    $html.="<div class='col-sm-10'>";
    $html.="<input type='{$config["type"]}' class='$css_class' name='{$config["name"]}' id='{$config["name"]}' value='{$config["value"]}' placeholder='{$config["placeholder"]}' {$config["required"]} {$config["checked"]}>";
    $html.="</div>";
    $html.="</div>";  

    return $html;
   }
   
   function PrintDate($day="cmbDay",$month="cmbMonth",$year="cmbYear"){

    $html="";
    $html.="<select name='$day'>";
    for($d=1;$d<=30;$d++){
        $d=str_pad($d,2, '0', STR_PAD_LEFT); 

        if($d==str_pad(date("d"),2,'0',STR_PAD_LEFT)){
          $html.="<option value='$d' selected>$d</option>";
        }else{
          $html.="<option value='$d'>$d</option>";
        }
        
 
    }
    $html.="</select>";
 
    $html.="<select name='$month'>";
     $months=["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"];
    for($d=1;$d<=12;$d++){
        $d=str_pad($d,2,'0',STR_PAD_LEFT); 
        if($d==str_pad(date("m"),2,'0',STR_PAD_LEFT)){
          $html.="<option value='$d' selected>{$months[$d-1]}</option>";
        }else{
          $html.="<option value='$d'>{$months[$d-1]}</option>";
        }
 
    }
    $html.="</select>";
    $html.="<select name='$year'>";
    
   for($d=date("Y")-60;$d<=date("Y")+3;$d++){    

       if(date("Y")==$d){
         $html.="<option value='$d' selected>$d</option>";
       }else{
         $html.="<option value='$d'>$d</option>";
       }

   }
   $html.="</select>";
    return $html;
 }
 
   function PrintTime($hour="cmbHour",$min="cmbMin",$ampm="cmbAMPM"){
 
    $html="<select name='$hour'>";
    for($h=1;$h<=12;$h++){
       $h=str_pad($h,2, '0', STR_PAD_LEFT); 
       $html.="<option value='$h'>$h</option>";
    }
    $html.="</select>";
 
    $html.="<select name='$min'>";
    for($h=1;$h<=60;$h++){
        $h=str_pad($h,2, '0', STR_PAD_LEFT); 
       $html.="<option value='$h'>$h</option>";
    }
    $html.="</select>";
 
    $html.="<select name='$ampm'>";
    $html.="<option value='AM'>AM</option>";
    $html.="<option value='PM'>PM</option>";
    $html.="</select>";
   
     return $html;
 
 
 }

   


?>
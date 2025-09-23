<?php
class Form{
   public static function open($config){
    global $base_url;
      $config["route"]=isset($config["route"])?$config["route"]:"";           
      $html="<form class='form' action='$base_url/{$config["route"]}' method='post' enctype='multipart/form-data'>";
            
      return $html;
    }
    


    public static function close(){
        $html="</form>";
        return $html;
    }
    
   
   public static function select($config){
      global $db,$tx; 
     $config["value"]=isset($config["value"])?$config["value"]:""; 
     $id=isset($config["value_column"])?$config["value_column"]:"id";  
     $name=isset($config["display_column"])?$config["display_column"]:"name";  
  
     $ucname=ucfirst($config["name"]);
     //echo "select $id,$name from {$tx}{$config["table"]}";
     
     $html="<div class='form-group row'>";
     $html.="<label class='col-sm-2 col-form-label'>{$config["label"]}</label>";
     $html.="<div class='col-sm-10'>"; 
     $html.="<select name='{$config["name"]}' id='{$config["name"]}' class='form-select' style='width:100%'>";
     $result=$db->query("select $id,$name from {$tx}{$config["table"]}");
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
     
        public static function button($config){
          $config["class"]=!isset($config["class"])?"btn btn-info":$config["class"];
          $html="<button name='{$config["name"]}' class='{$config["class"]}'>{$config["value"]}</button>";
          return $html;
       }
    
       public static function input($config){    
        global $db,$tx, $base_url;
        $id=isset($config["value_column"])?$config["value_column"]:"id";  
        $name=isset($config["display_column"])?$config["display_column"]:"name";  
     
        $config["required"]=isset($config["required"])?$config["required"]:"";
        $config["placeholder"]=isset($config["placeholder"])?$config["placeholder"]:"";
        $config["value"]=isset($config["value"])?$config["value"]:"";     
        $config["type"]=isset($config["type"])?$config["type"]:"text"; 
        $config["checked"]=isset($config["checked"])?$config["checked"]:""; 
    
        $config["class"]=isset($config["class"])?$config["class"]:"form-control";
        $css_class=$config["class"]; 

        $html="<div class='form-group row'>";
        
        if($config["type"]=="hidden" || $config["type"]=="submit" || $config["type"]=="reset"){          
          
        }else{
          $html.="<label for='{$config["name"]}' class='col-sm-2 col-form-label'>{$config["label"]}</label>";
        }

        $html.="<div class='col-sm-10'>";

         //select tag
        if(isset($config["table"])){
         
          $html.="<select id='{$config["name"]}' name='{$config["name"]}' class='form-select' style='width:100%'>";
          $result=$db->query("select $id,$name from {$tx}{$config["table"]}");
          while(list($id,$name)=$result->fetch_row()){
          
            if($id==$config["value"]){
              $html.="<option value='$id' selected>$name</option>";  
            }else{
              $html.="<option value='$id'>$name</option>";  
            }
        
          }
          $html.="</select>";

      }else{//Input tag
             
        
         if($config["type"]=="radio" || $config["type"]=="checkbox"){
          $css_class="form-check-input";
         }
       
        if($config["type"]=="textarea"){
          $html.="<textarea class='$css_class' name='{$config["name"]}' id='{$config["name"]}' placeholder='{$config["placeholder"]}' {$config["required"]}>{$config["value"]}</textarea>";        
        
        }elseif($config["type"]=="file"){
          $html.="<input type='{$config["type"]}' class='$css_class' name='{$config["name"]}' id='{$config["name"]}' value='{$config["value"]}' placeholder='{$config["placeholder"]}' {$config["required"]} {$config["checked"]}>";        
          if($config["value"]!=""){
            $html.="<img src='{$base_url}/img/{$config["value"]}' width='200' />";
          }       
        }else if($config["type"]=="submit"){
          $html.="<input type='{$config["type"]}' class='$css_class' name='{$config["name"]}' id='{$config["name"]}' value='{$config["value"]}' placeholder='{$config["placeholder"]}' {$config["required"]} {$config["checked"]}>";        
        }else{
          $html.="<input type='{$config["type"]}' class='$css_class' name='{$config["name"]}' id='{$config["name"]}' value='{$config["value"]}' placeholder='{$config["placeholder"]}' {$config["required"]} {$config["checked"]}>"; 
        }
      }
        $html.="</div>";
        $html.="</div>";
    
        return $html;
      
       }
    
      public static function textarea($config){
        global $base_url;
        $config["required"]=isset($config["required"])?$config["required"]:"";
        $config["placeholder"]=isset($config["placeholder"])?$config["placeholder"]:"";
        $config["value"]=isset($config["value"])?$config["value"]:""; 
       
        $css_class="form-control";
        $html="<div class='form-group row'>";
       
        $html.="<label for='{$config["name"]}' class='col-sm-2 col-form-label'>{$config["label"]}</label>";
         
        $html.="<div class='col-sm-10'>";       
         $html.="<textarea class='$css_class' name='{$config["name"]}' id='{$config["name"]}' placeholder='{$config["placeholder"]}' {$config["required"]}>{$config["value"]}</textarea>";        
               
        $html.="</div>";
        $html.="</div>";
    
        return $html;
    
     }
    
    
       
       public static function PrintDate($day="cmbDay",$month="cmbMonth",$year="cmbYear"){
    
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
     
     public static function PrintTime($hour="cmbHour",$min="cmbMin",$ampm="cmbAMPM"){
     
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
    


}

?>
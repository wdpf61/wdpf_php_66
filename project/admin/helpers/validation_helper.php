<?php

 function is_valid_email($email){
     $email = filter_var($email, FILTER_SANITIZE_EMAIL);

     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return false;   
     }
  return true;
 }

 function is_valid_url($url){
     $url = filter_var($url, FILTER_SANITIZE_URL);
     if (!filter_var($url, FILTER_VALIDATE_URL)) {
         return false;       
    }
 return true;
}

function is_valid_website($website){

    if(!preg_match("/^[a-zA-Z]+$/",$website)){
         return false;       
    }
 return true;
}

function is_valid_date($date){
   return true;
}

function is_valid_mobile($date){
   return true;
}


?>
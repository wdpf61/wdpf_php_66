<?php
// Event Functions 
function action_button($config){
    $config["url"]=isset($config["url"])?$config["url"]:"#";
    
    $config["class"]=isset($config["class"])?$config["class"]:"";
    $html="<form action='{$config["url"]}' method='post' style='flex:0 1 0;margin-right:5px'>";
    $html.="<input type='hidden' name='txtId' value='{$config["id"]}' />";
    $html.="<input type='submit' class='btn btn-{$config["class"]}' name='btn{$config["name"]}' value='{$config["value"]}' />";
    $html.="</form>";
    return $html;
  }

?>
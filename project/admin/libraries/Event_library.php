<?php
class Event{
   public static function button2($config){
        $config["route"]=isset($config["route"])?$config["route"]:"#";
        $config["method"]=isset($config["method"])?$config["method"]:"post";
        $config["class"]=isset($config["class"])?$config["class"]:"";
        
        $html="<form action='{$config["route"]}' method='{$config["method"]}' style='flex:0 1 0;margin-right:5px'>";
        $html.="<input type='hidden' name='id' value='{$config["id"]}' />";
        $html.="<input type='submit' class='{$config["class"]}' name='{$config["name"]}' value='{$config["value"]}' />";
        $html.="</form>";
        return $html;
      }

      public static function button($config){
        global $base_url;
        $config["route"]=isset($config["route"])?$config["route"]:"#";
        $config["method"]=isset($config["method"])?$config["method"]:"post";
        $config["class"]=isset($config["class"])?$config["class"]:"";
        
        $html="<a href='$base_url/{$config["route"]}' class='{$config["class"]}'>";      
        $html.=$config["value"];
        $html.="</a>";
        return $html;
      }
}

?>
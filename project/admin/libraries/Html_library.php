<?php

class Html{

    public static function link($config=[]){
        global $base_url;
        $config["class"]=isset($config["class"])?$config["class"]:"btn btn-primary";
         return "<a href='$base_url/{$config["route"]}' class='{$config["class"]}'>{$config["text"]}</a>";
    }
}


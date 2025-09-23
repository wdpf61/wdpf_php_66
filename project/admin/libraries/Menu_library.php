<?php
class Menu{

   public static function item($menu){
       
       global $base_url;

        $menu["icon"]=isset($menu["icon"])?$menu["icon"]:"nav-icon fa fa-arrow-right";
        $menu["route"]=isset($menu["route"])?$menu["route"]:"javascript:void(0)";
        
        $html="<li class=\"nav-item\">";         
        $html.="<a href=\"$base_url/{$menu["route"]}\" class=\"nav-link\">";
         
         $html.="<i class=\"{$menu["icon"]}\"></i>";
         $html.="<p>{$menu["name"]}";

         if(isset($menu["links"])){
          $html.="<i class=\"right fas fa-angle-left\"></i>";
         }
         
         $html.="</p>";
         $html.="</a>";

         if(isset($menu["links"])){
            $html.="<ul class=\"nav nav-treeview\">";
            foreach($menu["links"] as $link){                
                $link["icon"]=isset($link["icon"])?$link["icon"]:"nav-icon far fa-circle";

                $html.="<li class=\"nav-item\">";
            $html.="<a href=\"$base_url/{$link["route"]}\" class=\"nav-link\"> <i class=\"{$link["icon"]}\"></i><p>{$link["text"]}</p></a>";
                $html.="</li>";
            }
            $html.="</ul>";
        }

       $html.="</li>";
        return $html;
       }
}
?>
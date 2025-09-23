<?php


// Nav Functions
function nav_link($url,$text,$css="far fa-circle"){
      
    $html="<a href='$url' class='nav-link'>";
    $html.="<i class='$css nav-icon'></i>";
    $html.="<p>$text</p>";               
    $html.="</a>";

    return $html;
   }

   function nav_link_dropdown($url,$text,$css="far fa-circle",$options=array()){
      
      $html="<a href='$url' class='nav-link'>";
      $html.="<i class='$css nav-icon'></i>";
      $html.="<p>$text</p>";   
      
      if(count($options)){
         $html.="<i class='fas fa-angle-left right'></i>";  
      } 
      $html.="</a>";
      
      if(count($options)){
         $html.=nav_dropdown($options);
      }
      
       return $html;
  
     }
   
   function nav_dropdown($options){    

        $html="<ul class='nav nav-treeview'>";
        foreach($options as $option){
             $html.="<li class='nav-item'>";
             $html.=nav_link($option["url"],$option["value"],$option["css"]);
             $html.="</li>";
        }
        $html.="</ul>";      

        return $html;
   }
   
   function main_sidebar_dropdown($menu){
	 $html="<li class=\"nav-item\">";
	 $html.="<a href=\"javascript:void(0)\" class=\"nav-link\">";
	 $html.="<i class=\"{$menu["icon"]}\"></i>";
	 $html.="<p>{$menu["name"]}<i class=\"right fas fa-angle-left\"></i></p>";
	 $html.="</a>";
	 $html.="<ul class=\"nav nav-treeview\">";
	 foreach($menu["links"] as $link){
		$html.="<li class=\"nav-item\">";
      $html.="<a href=\"{$link["route"]}\" class=\"nav-link\"> <i class=\"{$link["icon"]}\"></i><p>{$link["text"]}</p></a>";
		$html.="</li>";
	 }
	$html.="</ul>";
   $html.="</li>";
	return $html;
   }
   
   
?>
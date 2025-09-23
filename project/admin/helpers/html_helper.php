<?php
 function success_message($config){
    $html="";

    $html.="<div class='alert alert-success alert-dismissible'>";
    //$html.="<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";
   // $html.="<h5><i class='icon fas fa-check'></i> Success!</h5>";
    $html.=$config["message"];
    $html.="</div>";

    return $html;
  }
function pagination($page,$totalPages){
	
    $next=($page+1)<$totalPages?($page+1):$totalPages;
    $pre=($page-1)>0?($page-1):1;
        $links="<ul class='pagination'>";
        $links.= "<li class='page-item'><a class='page-link' href='?page=1'>First</a></li>";
      $links .= "<li class='page-item'><a class='page-link' href='?page=$pre'>Prev</a></li>";
      for ($i = $page-5;$i<=$page+5;$i++) {
        
       if($i>0 && $i<=$totalPages){
        $links .= ($i != $page ) ? "<li class='page-item'><a class='page-link'  href='?page=$i'> $i</a></li>" : "<li class='page-item active'><span class='page-link'>$page</span></li>";
         }		 
        
      }
      $links.= "<li class='page-item'><a class='page-link' href='?page=$next'>Next</a></li>";
        $links.= "<li class='page-item'><a class='page-link' href='?page=$totalPages'>Last</a></li>";	
      $links.="<form  method='get'>";
        $links.= "<input type='text' size='1' name='page' />";
        $links.="<input type='submit' value='Go' />";
        $links.= "</form>";
      return $links;
    }
?>
<?php


class Table{

   public static function report($table,$columns=["*"]){
        global $db,$tx;       
       $cols="*";
       if(is_array($columns)>0){
         $cols=implode(",",$columns);
       }
       
       $sql="select $cols from {$tx}$table";
       $result=$db->query($sql);
       $fields = $result->fetch_fields();
    
        $html="<table class='table table-striped'>";  
        $html.="<thead>"; 
        $html.="<tr>"; 
        foreach($fields as $field){     
            $html.="<th>";
            $html.=ucfirst($field->name);
            $html.="</th>";
        }
        $html.="</tr>";
        $html.="</thead>"; 
        $html.="<tbody>"; 
        while($row=$result->fetch_assoc()){
         $html.="<tr>";
        
            foreach($fields as $field){     
                $html.="<td>";
                $html.=$row["$field->name"];
                $html.="</td>";
            }
         $html.="</tr>";
        }
        $html.="</tbody>"; 
        $html.="</table>";
    
        return $html;
    }

    public static function manage($table,$columns=["*"],$route=""){
        global $db,$tx;        
        if($route=="")$route=$_SERVER["REQUEST_URI"];
        
       $cols="*";
       if(is_array($columns)>0){
         $cols=implode(",",$columns);
       }
       
       $sql="select $cols from {$tx}$table";
       $result=$db->query($sql);
       $fields = $result->fetch_fields();
    
        $html="<table class='table table-striped'>";  
        $html.="<thead>"; 
        $html.="<tr>"; 
        foreach($fields as $field){     
            $html.="<th>";
            $html.=ucfirst($field->name);
            $html.="</th>";
        }
            $html.="<th style='text-align:right'>";
            $html.="Action";
            $html.="</th>";
        $html.="</tr>";
        $html.="</thead>"; 
        $html.="<tbody>"; 
        while($row=$result->fetch_assoc()){
         $html.="<tr>";         
             foreach($fields as $field){     
                 $html.="<td>";
                
                 if($field=="photo" || $field=="image"){
                    $html.="<img src='img/".$row["$field->name"]."' style='position:absolute; height:100%' />";
                }else{
                    $html.=$row["$field->name"]; 
                }
                               
                 $html.="</td>";
             }

             $html.="<td style='text-align:right'>";
             $html.="<div class='btn-group'>";
                 $html.="<a class='btn btn-primary' href='$route/edit/{$row["id"]}'>
                 <i class='fas fa-edit'></i>
                 </a>";
                 $html.="<a class='btn btn-info' href='$route/{$row["id"]}'><i class='fas fa-eye'></i></a>";
                 $html.="<a class='btn btn-danger' href='$route/delete/{$row["id"]}'><i class='fas fa-trash-alt'></i></a>";
             $html.="</div>";            
         $html.="</td>";            
         
         $html.="</tr>";
        }
        $html.="</tbody>"; 
        $html.="</table>";
    
        return $html;
    }


    
  
}

?>
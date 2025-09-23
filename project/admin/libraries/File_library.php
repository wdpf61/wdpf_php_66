<?php
class File{
 
    public static function upload($file,$path="img",$name=""){
        if(!file_exists($path)){
            mkdir($path, 0777, true);
        }	
        if(is_array($file)){       
    
                    $ext=pathinfo($file["name"],PATHINFO_EXTENSION);
                    $size=$file["size"]/1024;
                    $type=$file["type"];               
    
                    if(strcmp($type,"image/png") || strcmp($type,"image/jpeg")){                
    
                        $name=$name!=""?$name:$file["name"];
                        $name=slugify($name);              
    
                        if(!move_uploaded_file($file["tmp_name"],"$path/{$name}.{$ext}")){
                            copy($file["tmp_name"],"$path/{$name}.{$ext}");
                        }
                            
                      
                    }else{
                        return -1;
                    }
           
        }
    return "{$name}.{$ext}";
    
    }

}
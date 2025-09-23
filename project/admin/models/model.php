<?php
$folder="models";
foreach (glob("{$folder}/*.model.php") as $filename)
{
    require_once $filename;
}

$directories = glob($folder.'/*' , GLOB_ONLYDIR);
foreach($directories as $dir){
    foreach (glob("{$dir}/*.model.php") as $filename)
    {   
        include_once $filename;
    }
}

class Model{
    public function __construct(){
	}
}



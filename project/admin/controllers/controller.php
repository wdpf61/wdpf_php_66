<?php
$folder="controllers";

$directories = glob($folder.'/*' , GLOB_ONLYDIR);

foreach($directories as $dir){
    foreach (glob("{$dir}/*Controller.php") as $filename)
    {   
        include_once $filename;
    }
}

foreach (glob("{$folder}/*Controller.php") as $filename)
{   
    include_once $filename;
}

class Controller{
    public function __construct(){
	}
}

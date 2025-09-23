<?php
 $folder="libraries";
 foreach (glob("{$folder}/*_library.php") as $filename)
 {
     require_once $filename;
 }
?>
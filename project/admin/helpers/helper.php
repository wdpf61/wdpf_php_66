<?php
 $folder="helpers";
 foreach (glob("{$folder}/*_helper.php") as $filename)
 {
     include $filename;
 }
?>
<?php
// Debug Functions
function debug($data){
    file_put_contents("debug.txt",$data.PHP_EOL,FILE_APPEND); 
  } 

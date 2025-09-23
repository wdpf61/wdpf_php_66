<?php
$folder="configs";
foreach (glob("{$folder}/*_config.php") as $filename)
{
    include $filename;
}
?>
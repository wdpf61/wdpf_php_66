<?php
class Db{
    public static function select($sql){
       global $db,$px;     
       return $db->query($sql);
    }

}

?>
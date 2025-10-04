<?php

class Uom{
    public $id;
    public $name;

    public function __construct($id, $name)
    {
         $this->id= $id;
         $this->name= $name;
    }

    public static function getAll()
    {
         global $db, $tx;
         $data= $db->query("select * from {$tx}uom");
         return $data->fetch_all(MYSQLI_ASSOC);
    }
    public  function save()
    {
         global $db, $tx;
         $data= $db->query("insert into {$tx}uom(name) values('$this->name')");
         return $data;
    }

    public  function update()
    {
         global $db, $tx;
         $data= $db->query("update {$tx}uom set name='$this->name' where id= $this->id ");
         return $data;
    }
    public static  function find($id)
    {
         global $db, $tx;
         $data= $db->query("select * from {$tx}uom where id=$id ");
         return $data->fetch_assoc();
    }
    public static  function delete($id)
    {
         global $db, $tx;
         $data= $db->query("delete from {$tx}uom where id= $id ");
         return $data;
    }



  



}




?>
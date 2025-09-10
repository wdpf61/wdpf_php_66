<?php

class District{

public $id;
public $name;
public $division_id;

public function __construct($_id,$_name,$_division_id)
{
    $this->id =$_id;
    $this->name=$_name;
    $this->division_id =$_division_id;
    
}
public function save(){
     global $db;
     $save= $db->query("insert into districts (name, division_id) values('$this->name', '$this->division_id')");
     if($save){
         return "Data Saved Successfully";
     }
}

public static function getAll(){
 global $db;
 $data=$db->query("select * from districts");
 return $data->fetch_all(MYSQLI_ASSOC);
}


public static function delete($_id){
    global $db;
    $delete= $db->query("delete from districts where id=$_id");
     if($delete){
         return true;
     }
  }

 public function update(){
     global $db;
     $update= $db->query("update districts set name='$this->name', division_id='$this->division_id' where id= $this->id");
      if($update){
         return true;
     }
  }

 public static function find($_id){
    global $db;
     $data= $db->query("select * from districts where id=$_id");
     $districts = $data->fetch_assoc();
        if($districts){
          return $districts;
        }
     return "Data not Found";
     
  }
 public static function findByDivision($_id){
    global $db;
     $data= $db->query("select * from districts where division_id=$_id");
     $districts = $data->fetch_all(MYSQLI_ASSOC);
        if($districts){
          return $districts;
        }
     return "Data not Found";
     
  }

  public function __toString()
  {
    return "$this->id | $this->name| $this->division_id";
  }


}
<?php



class Division{

public $id;
public $name;


public function __construct($_id,$_name)
{
    $this->id =$_id;
    $this->name=$_name;

    
}
public function save(){
     global $db;
     $save= $db->query("insert into divisions (name) values('$this->name')");
     if($save){
         return "Data Saved Successfully";
     }
}

public static function getAll(){
 global $db;
 $data=$db->query("select * from divisions");
   return $data->fetch_all(MYSQLI_ASSOC);
}


public static function delete($_id){
    global $db;
    $delete= $db->query("delete from divisions where id=$_id");
     if($delete){
         return true;
     }
  }

 public function update(){
     global $db;
     $update= $db->query("update divisions set name='$this->name' where id= $this->id");
      if($update){
         return true;
     }
  }

 public static function find($_id){
    global $db;
     $data= $db->query("select * from divisions where id=$_id");
     $division = $data->fetch_assoc();
        if($division){
          return $division;
        }
     return "Data not Found";
     
  }

  public function __toString()
  {
    return "$this->id | $this->name|";
  }


}
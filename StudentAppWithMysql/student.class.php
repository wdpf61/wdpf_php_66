<?php
include_once "db_config.php";

class Student{

public $id;
public $name;
public $grade;

public function __construct($_id,$_name,$_grade)
{
    $this->id =$_id;
    $this->name=$_name;
    $this->grade =$_grade;
    
}
public function save(){
     global $db;
     $save= $db->query("insert into students (name, grade) values('$this->name', '$this->grade')");
     if($save){
         return "Data Saved Successfully";
     }
}

public static function showStudent(){
 global $db;
 $data=$db->query("select * from students");
 $html= "<table>";
 $html.= "<tr><th>ID</th><th>Name</th> <th>Result</th> <th>Action</th></tr>";
//  while( $row = $data->fetch_assoc()){
 while( $row = $data->fetch_object()){
 //  $html.= "<tr><td>{$row['id']}</td><td>{$row['name']}</td> <td>{$row['grade']}</td> <td>  <button> <a href='index.php?EditId={$row['id']}'>Edit</a></button>  <button> <a href='index.php?id={$row['id']}'>Delete</a></button> </td></tr>";
     $html.= "<tr><td>{$row->id}</td><td>{$row->name}</td> <td>{$row->grade}</td> <td>  <button> <a href='studentApp.php?EditId={$row->id}'>Edit</a></button>  <button> <a href='studentApp.php?id={$row->id}'>Delete</a></button> </td></tr>";
 }
 $html.= "</table>";
 return  $html;
}


public static function delete($_id){
    global $db;
    $delete= $db->query("delete from students where id=$_id");
     if($delete){
         return true;
     }
  }

 public function update(){
     global $db;
     $update= $db->query("update students set name='$this->name', grade='$this->grade' where id= $this->id");
      if($update){
         return true;
     }
  }

 public static function find($_id){
    global $db;
     $data= $db->query("select * from students where id=$_id");
   
     $student = $data->fetch_assoc();
        if(count($student)){
          return $student;
        }
     return "Data not Found";
     
  }

  public function __toString()
  {
    return "$this->id | $this->name| $this->grade";
  }


}

?>



<?php

// public 
// private 
// protected

class Student{

public $id;
public $name;
public $address;

public function __construct($_id, $_name, $_address)
{
    $this->id =$_id;
    $this->name =$_name;
    $this->address =$_address;
 
}
public function save(){
    $data= "$this->id,$this->name,$this->address";
    if (filesize("studentdata.txt") > 0) {
     $data=PHP_EOL.$data;
    }
    file_put_contents("studentdata.txt", $data, FILE_APPEND);
    return "Data Saved Successfully";
}

public static function showStudent(){
 $data= file("studentdata.txt",FILE_SKIP_EMPTY_LINES | FILE_IGNORE_NEW_LINES);
 $html= "<table>";
 $html.= "<tr><th>ID</th><th>Name</th> <th>Address</th> <th>Action</th></tr>";
 foreach ( $data  as $key =>$row){
    list($id,$name,$address)= explode(",",$row);
     $html.= "<tr><td>{$id}</td><td>{$name}</td> <td>{$address}</td> <td>  <button> <a href='studentApp.php?EditId={$id}'>Edit</a></button>  <button> <a href='studentApp.php?id={$id}'>Delete</a></button> </td></tr>";
 }
 $html.= "</table>";
 return  $html;
}


public static function delete($_id){
     $data= file("studentdata.txt");
     $student="";
     foreach ($data as $key => $value) {
        list($id)= explode(",", $value);
        if($id != $_id){
            $student .= $value;
        }
     }
     file_put_contents("studentdata.txt",$student);
     return true;
  }

 public function update(){
     $data= file("studentdata.txt");
     $student="";
     foreach ($data as $key => $value) {
        list($id)= explode(",", $value);
        if($this->id == $id){
            $student .= $this->id.",".$this->name.",".$this->address.PHP_EOL;
        }else{
            $student .= $value;
        }
     }
     file_put_contents("studentdata.txt",$student);
     return true;
  }

 public static function search($_id){
     $data= file("studentdata.txt");
     foreach ($data as $key => $value) {
        list($id,$name,$address)= explode(",", $value);
        if($id == $_id){
            $student =["id"=> $id, "name"=>$name, "address"=> $address];
            break;
        }
     }
     return $student;
  }

  public function __toString()
  {
    return "$this->id | $this->name| $this->address";
  }


}



// $student= new Student(5,"Rashed", "Gaibandha");
// $student->save();
// $student->update();
// echo $student;
// Student::delete(1);

// print_r(Student::search(5));
// echo Student::showStudent();
?>



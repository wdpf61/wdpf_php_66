<?php
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
    $data= $this->id.",".$this->name.",".$this->address.PHP_EOL;

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
     $html.= "<tr><td>{$id}</td><td>{$name}</td> <td>{$address}</td> <td> <button>Edit</button> <button>Delete</button> </td></tr>";
 }
 $html.= "</table>";
 return  $html;
}

}
?>



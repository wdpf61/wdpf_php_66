<?php
include_once "db_config.php";

class User{
    public $id;
    public $name;
    public $email;
    public $password;
    public $img;
    public $role_id;


    public function __construct($id,$name,$email,$password,$img,$role_id)
    {
       $this->id= $id;
       $this->name= $name;
       $this->email= $email;
       $this->password= $password;
       $this->img= $img;
       $this->role_id= $role_id; 
    }


    public function save(){
        global $db;
        try{
        mysqli_report(MYSQLI_REPORT_ERROR|MYSQLI_REPORT_STRICT);

        $save = $db->query("insert into users (name,email,password,img,role_id) values('$this->name', '$this->email','$this->password', '$this->img','$this->role_id')");
        return $save;

        }catch(mysqli_sql_exception $e){
           echo $e->getMessage();
        }





        //  prepared statement the safeway
        //   $save = $db->prepare("insert into users(name,email,password,img,role_id)values(?,?,?,?,?)");
        //   $save->bind_param("ssssi", $this->name, $this->email,$this->password, $this->img,$this->role_id);
        //   $save->execute();

    }

    public static function getAll(){
       global $db;
       $data = $db->query("select * from users");

    //    $html= "<table>
    //     <tr>
    //         <th>Id</th>
    //         <th>Name</th>
    //         <th>Email</th>
    //         <th>Image</th>
    //         <th>Role_id</th>
    //     </tr>";
   
    // while ($row = $data->fetch_object()) {
    // $html.= "   <tr>
    //         <th>$row->id</th>
    //         <th>$row->name</th>
    //         <th>$row->email</th>
    //         <th><img src='$row->img' alt='$row->img'/></th>
    //         <th>$row->role_id</th>
    //     </tr>";
    // }
  
    // $html.= "</table>";
    
    //  return $html;

     return $data->fetch_all(MYSQLI_ASSOC);

   
    }
    public static function find($id){

    }
    public function update(){

    }

    public static function delete($id){

    }

}


 $user1= new User("", "Masud2","masud@gmail.com", "12345","masud2.jpg", 2);
 $user1->save();

//   echo "<pre>";
//   print_r(User::getAll());
//   echo "</pre>";

//   $users= User::getAll();
//   foreach(  $users as $user ){
//        echo "<pre>";
//       print_r($user);
//       echo "</pre>";
//   }

?>


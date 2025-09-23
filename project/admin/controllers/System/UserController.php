<?php
class UserController{
    function __construct(){
       
     }
   //----Mange-----
     function index(){       
       view("system");
     }
   //-----Save---- 
     function create(){
        view("system");        
     }
 
     function save($data,$file){  
        global $now;
        
        if(isset($data["create"])){
            $errors=[];

            if(count($errors)==0){
                $user=new User();
                $user->name=$_POST["name"];
                $user->role_id=$_POST["role_id"];
                $user->password=password_hash($_POST["password"],PASSWORD_BCRYPT);
                $user->email=$_POST["email"];
                $user->full_name=$_POST["full_name"];
                $user->created_at=$now;
                $user->photo=upload($_FILES["photo"],"img",$user->name);
                //$user->verify_code=$_POST["txtVerifyCode"];
                //$user->inactive=isset($_POST["chkInactive"])?1:0;
                $user->mobile=$_POST["mobile"];
                $user->updated_at=$now;	
        
                $user->save();
            }else{
                 print_r($errors);
            }
        }
        redirect("index");
     }
 //------Edit-----
     function edit($id){       
        view("system",User::find($id));
     }
 
     function update($data,$file){
       global $now,$base_url;

        $errors=[];
        if(count($errors)==0){
        
		
            $user=new User();
            $user->id=$_POST["id"];
            $user->name=$_POST["name"];
            $user->role_id=$_POST["role_id"];
            $user->password=password_hash($_POST["password"],PASSWORD_BCRYPT);
            $user->email=$_POST["email"];
            $user->full_name=$_POST["full_name"];
            $user->created_at=$now;
            if($_FILES["photo"]["name"]!=""){
                $user->photo=File::upload($_FILES["photo"], "img",$user->name);
            }else{
                $user->photo=User::find($_POST["id"])->photo;
            }
            $user->verify_code=$_POST["verify_code"];
            $user->inactive=isset($_POST["inactive"])?1:0;
            $user->mobile=$_POST["mobile"];
    
            $user->update();
        }else{
             print_r($errors);
        }

        redirect("index");
     }

 //------Delete-----
     function confirm($id){     
        view("system");
     }

     function delete($id){
        
         if(isset($id)){
             User::delete($id);
             redirect("index");
         }
     }
  //------Show-----------
     function show($id){
        view("system",User::find($id));
     }

  //-------Search--------



 }


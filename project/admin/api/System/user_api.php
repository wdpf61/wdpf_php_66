<?php

class UserApi extends Api{
	public function __construct(){

          if(!$this->authorized()){   
		    
			if ($_SERVER['REQUEST_METHOD'] == 'GET') {			  
				http_response_code(401);//Not Authorized
		  	    die("401 Unauthorized");
			}
			
         }		
	}
	function index(){
		
		echo json_encode(["users"=>User::all(),"auth"=>$this->authorized()]);
	}
	function pagination($data){
		$page=$data["page"];
		$perpage=$data["perpage"];
		echo json_encode(["users"=>User::pagination($page,$perpage),"total_records"=>User::count()]);
	}
	function find($data){
		//echo 	$data["id"];
		echo json_encode(["user"=>User::find($data["id"])]);
	}
	function delete($data){
		User::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}
	function save($data,$file=[]){
      // global $now;       

		$user=new User();
		$user->name=$data["name"];
		$user->role_id=$data["role_id"];
		$user->password=password_hash($data["password"],PASSWORD_BCRYPT);
		$user->email=$data["email"];
		$user->full_name=$data["full_name"];
		$user->mobile=$data["mobile"];
		//$user->created_at=$now;
		if(isset($file["photo"]["name"])){
		 $user->photo=upload($file["photo"], "../img",$data["name"]);
		}
		//$user->verify_code=$data["verify_code"];
		//$user->inactive=$data["inactive"];		
		//$user->ip=$data["ip"];
		//$user->email_verified_at=$data["email_verified_at"];
		//$user->remember_token=$data["remember_token"];

		$user->save();
		echo json_encode(["success" => "yes"]);
	}
	function update($data,$file=[]){
		$user=new User();
		$user->id=$data["id"];
		$user->name=$data["name"];
		$user->role_id=$data["role_id"];
		$user->password=password_hash($data["password"],PASSWORD_BCRYPT);
		$user->email=$data["email"];
		$user->full_name=$data["full_name"];
		if(isset($file["photo"]["name"])){
			$user->photo=upload($file["photo"], "../img",$data["name"]);
		}else{
			$user->photo=User::find($data["id"])->photo;
		}
		$user->verify_code=$data["verify_code"];
		$user->inactive=$data["inactive"];
		$user->mobile=$data["mobile"];
		$user->updated_at=$data["updated_at"];
		$user->ip=$data["ip"];
		$user->email_verified_at=$data["email_verified_at"];
		$user->remember_token=$data["remember_token"];

		$user->update();
		echo json_encode(["success" => "yes"]);
	}

	function search($data){
		
		echo json_encode(["user"=>User::search($data["name"])]);
	}
}


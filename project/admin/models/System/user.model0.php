<?php
class User implements JsonSerializable{
	public $id;
	public $name;
	public $photo;
	public $role_id;
	public $email;
	public $email_verified_at;
	public $password;
	public $remember_token;
	public $created_at;
	public $updated_at;
	public $ip;

	public function __construct(){
		$this->ip=$_SERVER["REMOTE_ADDR"];		
	}
	public function set($id,$name,$photo,$role_id,$email,$email_verified_at,$password,$remember_token,$created_at,$updated_at){
		$this->id=$id;
		$this->name=$name;
		$this->photo=$photo;
		$this->role_id=$role_id;
		$this->email=$email;
		$this->email_verified_at=$email_verified_at;
		$this->password=$password;
		$this->remember_token=$remember_token;
		$this->created_at=$created_at;
		$this->updated_at=$updated_at;
		$this->ip=$_SERVER["REMOTE_ADDR"];

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}users(name,photo,role_id,email,email_verified_at,password,remember_token,created_at,updated_at,ip)values('$this->name','$this->photo','$this->role_id','$this->email','$this->email_verified_at','$this->password','$this->remember_token','$this->created_at','$this->updated_at','$this->ip')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}users set ip='$this->ip', name='$this->name',photo='$this->photo',role_id='$this->role_id',email='$this->email',email_verified_at='$this->email_verified_at',password='$this->password',remember_token='$this->remember_token',created_at='$this->created_at',updated_at='$this->updated_at' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}users where id={$id}");
	}
	public function jsonSerialize():mixed{
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,name,photo,role_id,email,email_verified_at,password,remember_token,created_at,updated_at from {$tx}users");
		$data=[];
		while($user=$result->fetch_object()){
			$data[]=$user;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,name,photo,role_id,email,email_verified_at,password,remember_token,created_at,updated_at from {$tx}users $criteria limit $top,$perpage");
		$data=[];
		while($user=$result->fetch_object()){
			$data[]=$user;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}users $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,name,full_name,ip,verify_code,inactive,mobile,photo,role_id,email,email_verified_at,password,remember_token,created_at,updated_at from {$tx}users where id='$id'");
		$user=$result->fetch_object();
			return $user;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}users");
		$user =$result->fetch_object();
		return $user->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Name:$this->name<br> 
		Photo:$this->photo<br> 
		Role Id:$this->role_id<br> 
		Email:$this->email<br> 
		Email Verified At:$this->email_verified_at<br> 
		Password:$this->password<br> 
		Remember Token:$this->remember_token<br> 
		Created At:$this->created_at<br> 
		Updated At:$this->updated_at<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbUser"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}users");
		while($user=$result->fetch_object()){
			$html.="<option value ='$user->id'>$user->name</option>";
		}
		$html.="</select>";
		return $html;
	}

	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx,$base_url;
		$count_result =$db->query("select count(*) total from {$tx}users $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select u.id,u.name,u.photo,r.name role,u.email from {$tx}users u,{$tx}roles r where r.id=u.role_id $criteria limit $top,$perpage");
		
		$html="<table class='table'>";			
		if($action){
			$html.="<tr><th>Id</th><th>Name</th><th>Photo</th><th>Role</th><th>Email</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Name</th><th>Photo</th><th>Role</th><th>Email</th></tr>";
		}
		while($user=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='clearfix' style='display:flex;'>";
				$action_buttons.= Event::button(["id"=>$user->id, "name"=>"details", "value"=>"Details", "class"=>"btn btn-info", "route"=>"user/show/$user->id"]);
				$action_buttons.= Event::button(["id"=>$user->id, "name"=>"edit", "value"=>"Edit", "class"=>"btn btn-primary", "route"=>"user/edit/$user->id"]);
				$action_buttons.= Event::button(["id"=>$user->id, "name"=>"delete", "value"=>"Delete", "class"=>"btn btn-danger", "route"=>"user/confirm/$user->id"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$user->id</td><td>$user->name</td><td><img src='img/$user->photo' width='100' /></td><td>$user->role</td><td>$user->email</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx,$base_url;
		$result =$db->query("select id,name,photo,role_id,email,email_verified_at,password,remember_token,created_at,updated_at from {$tx}users where id={$id}");
		$user=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">User Details</th></tr>";
		$html.="<tr><th>Id</th><td>$user->id</td></tr>";
		$html.="<tr><th>Name</th><td>$user->name</td></tr>";
		$html.="<tr><th>Photo</th><td><img src='img/$user->photo' width='100' /></td></tr>";
		$html.="<tr><th>Role Id</th><td>$user->role_id</td></tr>";
		$html.="<tr><th>Email</th><td>$user->email</td></tr>";
		$html.="<tr><th>Email Verified At</th><td>$user->email_verified_at</td></tr>";
		$html.="<tr><th>Password</th><td>$user->password</td></tr>";
		$html.="<tr><th>Remember Token</th><td>$user->remember_token</td></tr>";
		$html.="<tr><th>Created At</th><td>$user->created_at</td></tr>";
		$html.="<tr><th>Updated At</th><td>$user->updated_at</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>

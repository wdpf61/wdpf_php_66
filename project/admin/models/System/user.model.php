<?php
class User extends Model implements JsonSerializable{
	public $id;
	public $name;
	public $role_id;
	public $password;
	public $email;
	public $full_name;
	public $created_at;
	public $photo;
	public $verify_code;
	public $inactive;
	public $mobile;
	public $updated_at;
	public $ip;
	public $email_verified_at;
	public $remember_token;

	public function __construct(){
	}
	public function set($id,$name,$role_id,$password,$email,$full_name,$created_at,$photo,$verify_code,$inactive,$mobile,$updated_at,$ip,$email_verified_at,$remember_token){
		$this->id=$id;
		$this->name=$name;
		$this->role_id=$role_id;
		$this->password=$password;
		$this->email=$email;
		$this->full_name=$full_name;
		$this->created_at=$created_at;
		$this->photo=$photo;
		$this->verify_code=$verify_code;
		$this->inactive=$inactive;
		$this->mobile=$mobile;
		$this->updated_at=$updated_at;
		$this->ip=$ip;
		$this->email_verified_at=$email_verified_at;
		$this->remember_token=$remember_token;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}users(name,role_id,password,email,full_name,created_at,photo,verify_code,inactive,mobile,updated_at,ip,email_verified_at,remember_token)values('$this->name','$this->role_id','$this->password','$this->email','$this->full_name','$this->created_at','$this->photo','$this->verify_code','$this->inactive','$this->mobile','$this->updated_at','$this->ip','$this->email_verified_at','$this->remember_token')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}users set name='$this->name',role_id='$this->role_id',password='$this->password',email='$this->email',full_name='$this->full_name',created_at='$this->created_at',photo='$this->photo',verify_code='$this->verify_code',inactive='$this->inactive',mobile='$this->mobile',updated_at='$this->updated_at',ip='$this->ip',email_verified_at='$this->email_verified_at',remember_token='$this->remember_token' where id='$this->id'");
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
		$result=$db->query("select id,name,role_id,password,email,full_name,created_at,photo,verify_code,inactive,mobile,updated_at,ip,email_verified_at,remember_token from {$tx}users");
		$data=[];
		while($user=$result->fetch_object()){
			$data[]=$user;
		}
			return $data;
	}

	public static function search($name){
		global $db,$tx;
		$result=$db->query("select id,name,role_id,password,email,full_name,created_at,photo,verify_code,inactive,mobile,updated_at,ip,email_verified_at,remember_token from {$tx}users where name like '%{$name}%'");
		$data=[];
		while($user=$result->fetch_object()){
			$data[]=$user;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,name,role_id,password,email,full_name,created_at,photo,verify_code,inactive,mobile,updated_at,ip,email_verified_at,remember_token from {$tx}users $criteria limit $top,$perpage");
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
		$result =$db->query("select id,name,role_id,password,email,full_name,created_at,photo,verify_code,inactive,mobile,updated_at,ip,email_verified_at,remember_token from {$tx}users where id='$id'");
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
		Role Id:$this->role_id<br> 
		Password:$this->password<br> 
		Email:$this->email<br> 
		Full Name:$this->full_name<br> 
		Created At:$this->created_at<br> 
		Photo:$this->photo<br> 
		Verify Code:$this->verify_code<br> 
		Inactive:$this->inactive<br> 
		Mobile:$this->mobile<br> 
		Updated At:$this->updated_at<br> 
		Ip:$this->ip<br> 
		Email Verified At:$this->email_verified_at<br> 
		Remember Token:$this->remember_token<br> 
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
		$result=$db->query("select id,name,role_id,password,email,full_name,created_at,photo,verify_code,inactive,mobile,updated_at,ip,email_verified_at,remember_token from {$tx}users $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'>".Html::link(["class"=>"btn btn-success","route"=>"user/create","text"=>"New User"])."</th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Name</th><th>Role Id</th><th>Password</th><th>Email</th><th>Full Name</th><th>Created At</th><th>Photo</th><th>Verify Code</th><th>Inactive</th><th>Mobile</th><th>Updated At</th><th>Ip</th><th>Email Verified At</th><th>Remember Token</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Name</th><th>Role Id</th><th>Password</th><th>Email</th><th>Full Name</th><th>Created At</th><th>Photo</th><th>Verify Code</th><th>Inactive</th><th>Mobile</th><th>Updated At</th><th>Ip</th><th>Email Verified At</th><th>Remember Token</th></tr>";
		}
		while($user=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='btn-group' style='display:flex;'>";
				$action_buttons.= Event::button(["name"=>"show", "value"=>"Show", "class"=>"btn btn-info", "route"=>"user/show/$user->id"]);
				$action_buttons.= Event::button(["name"=>"edit", "value"=>"Edit", "class"=>"btn btn-primary", "route"=>"user/edit/$user->id"]);
				$action_buttons.= Event::button(["name"=>"delete", "value"=>"Delete", "class"=>"btn btn-danger", "route"=>"user/confirm/$user->id"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$user->id</td><td>$user->name</td><td>$user->role_id</td><td>$user->password</td><td>$user->email</td><td>$user->full_name</td><td>$user->created_at</td><td><img src='$base_url/img/$user->photo' width='100' /></td><td>$user->verify_code</td><td>$user->inactive</td><td>$user->mobile</td><td>$user->updated_at</td><td>$user->ip</td><td>$user->email_verified_at</td><td>$user->remember_token</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx,$base_url;
		$result =$db->query("select id,name,role_id,password,email,full_name,created_at,photo,verify_code,inactive,mobile,updated_at,ip,email_verified_at,remember_token from {$tx}users where id={$id}");
		$user=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">User Show</th></tr>";
		$html.="<tr><th>Id</th><td>$user->id</td></tr>";
		$html.="<tr><th>Name</th><td>$user->name</td></tr>";
		$html.="<tr><th>Role Id</th><td>$user->role_id</td></tr>";
		$html.="<tr><th>Password</th><td>$user->password</td></tr>";
		$html.="<tr><th>Email</th><td>$user->email</td></tr>";
		$html.="<tr><th>Full Name</th><td>$user->full_name</td></tr>";
		$html.="<tr><th>Created At</th><td>$user->created_at</td></tr>";
		$html.="<tr><th>Photo</th><td><img src='$base_url/img/$user->photo' width='100' /></td></tr>";
		$html.="<tr><th>Verify Code</th><td>$user->verify_code</td></tr>";
		$html.="<tr><th>Inactive</th><td>$user->inactive</td></tr>";
		$html.="<tr><th>Mobile</th><td>$user->mobile</td></tr>";
		$html.="<tr><th>Updated At</th><td>$user->updated_at</td></tr>";
		$html.="<tr><th>Ip</th><td>$user->ip</td></tr>";
		$html.="<tr><th>Email Verified At</th><td>$user->email_verified_at</td></tr>";
		$html.="<tr><th>Remember Token</th><td>$user->remember_token</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>

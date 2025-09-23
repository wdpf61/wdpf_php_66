<?php
class District extends Model implements JsonSerializable{
	public $id;
	public $name;
	public $division_id;
	public $inactive;
	public $photo;

	public function __construct(){
	}
	public function set($id,$name,$division_id,$inactive,$photo){
		$this->id=$id;
		$this->name=$name;
		$this->division_id=$division_id;
		$this->inactive=$inactive;
		$this->photo=$photo;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}districts(name,division_id,inactive,photo)values('$this->name','$this->division_id','$this->inactive','$this->photo')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}districts set name='$this->name',division_id='$this->division_id',inactive='$this->inactive',photo='$this->photo' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}districts where id={$id}");
	}
	public function jsonSerialize():mixed{
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,name,division_id,inactive,photo from {$tx}districts");
		$data=[];
		while($district=$result->fetch_object()){
			$data[]=$district;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,name,division_id,inactive,photo from {$tx}districts $criteria limit $top,$perpage");
		$data=[];
		while($district=$result->fetch_object()){
			$data[]=$district;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}districts $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,name,division_id,inactive,photo from {$tx}districts where id='$id'");
		$district=$result->fetch_object();
			return $district;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}districts");
		$district =$result->fetch_object();
		return $district->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Name:$this->name<br> 
		Division Id:$this->division_id<br> 
		Inactive:$this->inactive<br> 
		Photo:$this->photo<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbDistrict"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}districts");
		while($district=$result->fetch_object()){
			$html.="<option value ='$district->id'>$district->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx,$base_url;
		$count_result =$db->query("select count(*) total from {$tx}districts $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,name,division_id,inactive,photo from {$tx}districts $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'>".Html::link(["class"=>"btn btn-success","route"=>"district/create","text"=>"New District"])."</th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Name</th><th>Division Id</th><th>Inactive</th><th>Photo</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Name</th><th>Division Id</th><th>Inactive</th><th>Photo</th></tr>";
		}
		while($district=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='btn-group' style='display:flex;'>";
				$action_buttons.= Event::button(["name"=>"show", "value"=>"Show", "class"=>"btn btn-info", "route"=>"district/show/$district->id"]);
				$action_buttons.= Event::button(["name"=>"edit", "value"=>"Edit", "class"=>"btn btn-primary", "route"=>"district/edit/$district->id"]);
				$action_buttons.= Event::button(["name"=>"delete", "value"=>"Delete", "class"=>"btn btn-danger", "route"=>"district/confirm/$district->id"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$district->id</td><td>$district->name</td><td>$district->division_id</td><td>$district->inactive</td><td><img src='$base_url/img/$district->photo' width='100' /></td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx,$base_url;
		$result =$db->query("select id,name,division_id,inactive,photo from {$tx}districts where id={$id}");
		$district=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">District Show</th></tr>";
		$html.="<tr><th>Id</th><td>$district->id</td></tr>";
		$html.="<tr><th>Name</th><td>$district->name</td></tr>";
		$html.="<tr><th>Division Id</th><td>$district->division_id</td></tr>";
		$html.="<tr><th>Inactive</th><td>$district->inactive</td></tr>";
		$html.="<tr><th>Photo</th><td><img src='$base_url/img/$district->photo' width='100' /></td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>

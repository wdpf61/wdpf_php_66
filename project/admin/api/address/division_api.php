<?php
class DivisionApi{
	public function __construct(){
	}
	function index(){
		echo json_encode(["divisions"=>Division::all()]);
	}
	function pagination($data){
		$page=$data["page"];
		$perpage=$data["perpage"];
		echo json_encode(["divisions"=>Division::pagination($page,$perpage),"total_records"=>Division::count()]);
	}
	function find($data){
		echo json_encode(["division"=>Division::find($data["id"])]);
	}
	function delete($data){
		Division::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}
	function save($data,$file=[]){
		$division=new Division();
		$division->name=$data["name"];

		$division->save();
		echo json_encode(["success" => "yes"]);
	}
	function update($data,$file=[]){
		$division=new Division();
		$division->id=$data["id"];
		$division->name=$data["name"];

		$division->update();
		echo json_encode(["success" => "yes"]);
	}
}
?>

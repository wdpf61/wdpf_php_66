<?php
class DistrictController extends Controller{
	public function __construct(){
	}
	public function index(){
		view("Address");
	}
	public function create(){
		view("Address");
	}
public function save($data,$file){
	if(isset($data["create"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["txtName"])){
		$errors["name"]="Invalid name";
	}
	if(!preg_match("/^[\s\S]+$/",$data["division_id"])){
		$errors["division_id"]="Invalid division_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["inactive"])){
		$errors["inactive"]="Invalid inactive";
	}
	if(!preg_match("/^[\s\S]+$/",$data["photo"])){
		$errors["photo"]="Invalid photo";
	}

*/
		if(count($errors)==0){
			$district=new District();
		$district->name=$data["name"];
		$district->division_id=$data["division_id"];
		$district->inactive=isset($data["inactive"])?1:0;
		$district->photo=File::upload($file["photo"], "img",$data["id"]);

			$district->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		view("Address",District::find($id));
}
public function update($data,$file){
	if(isset($data["update"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["txtName"])){
		$errors["name"]="Invalid name";
	}
	if(!preg_match("/^[\s\S]+$/",$data["division_id"])){
		$errors["division_id"]="Invalid division_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["inactive"])){
		$errors["inactive"]="Invalid inactive";
	}
	if(!preg_match("/^[\s\S]+$/",$data["photo"])){
		$errors["photo"]="Invalid photo";
	}

*/
		if(count($errors)==0){
			$district=new District();
			$district->id=$data["id"];
		$district->name=$data["name"];
		$district->division_id=$data["division_id"];
		$district->inactive=isset($data["inactive"])?1:0;
		if($file["photo"]["name"]!=""){
			$district->photo=File::upload($file["photo"], "img",$data["id"]);
		}else{
			$district->photo=District::find($data["id"])->photo;
		}

		$district->update();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
	public function confirm($id){
		view("Address");
	}
	public function delete($id){
		District::delete($id);
		redirect();
	}
	public function show($id){
		view("Address",District::find($id));
	}
}
?>

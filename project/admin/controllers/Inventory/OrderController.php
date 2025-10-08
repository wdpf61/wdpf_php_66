<?php
class OrderController extends Controller{
	public function __construct(){
	}
	public function index(){
		view("Inventory");
	}
	public function create(){
		view("Inventory");
	}
public function save($data,$file){
	if(isset($data["create"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$data["customer_id"])){
		$errors["customer_id"]="Invalid customer_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["shipping_address"])){
		$errors["shipping_address"]="Invalid shipping_address";
	}
	if(!preg_match("/^[\s\S]+$/",$data["order_total"])){
		$errors["order_total"]="Invalid order_total";
	}
	if(!preg_match("/^[\s\S]+$/",$data["paid_amount"])){
		$errors["paid_amount"]="Invalid paid_amount";
	}
	if(!preg_match("/^[\s\S]+$/",$data["remark"])){
		$errors["remark"]="Invalid remark";
	}
	if(!preg_match("/^[\s\S]+$/",$data["status_id"])){
		$errors["status_id"]="Invalid status_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["discount"])){
		$errors["discount"]="Invalid discount";
	}
	if(!preg_match("/^[\s\S]+$/",$data["vat"])){
		$errors["vat"]="Invalid vat";
	}

*/
		if(count($errors)==0){
			$order=new Order();
		$order->customer_id=$data["customer_id"];
		$order->order_date=date("Y-m-d",strtotime($data["order_date"]));
		$order->delivery_date=date("Y-m-d",strtotime($data["delivery_date"]));
		$order->shipping_address=$data["shipping_address"];
		$order->order_total=$data["order_total"];
		$order->paid_amount=$data["paid_amount"];
		$order->remark=$data["remark"];
		$order->status_id=$data["status_id"];
		$order->discount=$data["discount"];
		$order->vat=$data["vat"];
		$order->created_at=$now;
		$order->updated_at=$now;

			$order->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		view("Inventory",Order::find($id));
}
public function update($data,$file){
	if(isset($data["update"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$data["customer_id"])){
		$errors["customer_id"]="Invalid customer_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["shipping_address"])){
		$errors["shipping_address"]="Invalid shipping_address";
	}
	if(!preg_match("/^[\s\S]+$/",$data["order_total"])){
		$errors["order_total"]="Invalid order_total";
	}
	if(!preg_match("/^[\s\S]+$/",$data["paid_amount"])){
		$errors["paid_amount"]="Invalid paid_amount";
	}
	if(!preg_match("/^[\s\S]+$/",$data["remark"])){
		$errors["remark"]="Invalid remark";
	}
	if(!preg_match("/^[\s\S]+$/",$data["status_id"])){
		$errors["status_id"]="Invalid status_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["discount"])){
		$errors["discount"]="Invalid discount";
	}
	if(!preg_match("/^[\s\S]+$/",$data["vat"])){
		$errors["vat"]="Invalid vat";
	}

*/
		if(count($errors)==0){
			$order=new Order();
			$order->id=$data["id"];
		$order->customer_id=$data["customer_id"];
		$order->order_date=date("Y-m-d",strtotime($data["order_date"]));
		$order->delivery_date=date("Y-m-d",strtotime($data["delivery_date"]));
		$order->shipping_address=$data["shipping_address"];
		$order->order_total=$data["order_total"];
		$order->paid_amount=$data["paid_amount"];
		$order->remark=$data["remark"];
		$order->status_id=$data["status_id"];
		$order->discount=$data["discount"];
		$order->vat=$data["vat"];
		$order->created_at=$now;
		$order->updated_at=$now;

		$order->update();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
	public function confirm($id){
		view("Inventory");
	}
	public function delete($id){
		Order::delete($id);
		redirect();
	}
	public function show($id){
		$data= Order::find($id);
		view("Inventory",$data);
	}
	public function find_customer($id){
		$data= Customer::find($id);
		return json_encode($data);
	}
}
?>

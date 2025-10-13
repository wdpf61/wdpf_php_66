<?php
class StockApi{
	public function __construct(){
	}
	function index(){
		echo json_encode(["stocks"=>Stock::all()]);
	}
	function pagination($data){
		$page=$data["page"];
		$perpage=$data["perpage"];
		echo json_encode(["stocks"=>Stock::pagination($page,$perpage),"total_records"=>Stock::count()]);
	}
	function find($data){
		echo json_encode(["stock"=>Stock::find($data["id"])]);
	}
	function delete($data){
		Stock::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}
	function save($data,$file=[]){
		$stock=new Stock();
		$stock->product_id=$data["product_id"];
		$stock->qty=$data["qty"];
		$stock->transaction_type_id=$data["transaction_type_id"];
		$stock->remark=$data["remark"];
		$stock->warehouse_id=$data["warehouse_id"];
		$stock->updated_at=$data["updated_at"];
		$stock->lot_id=$data["lot_id"];

		$stock->save();
		echo json_encode(["success" => "yes"]);
	}
	function update($data,$file=[]){
		$stock=new Stock();
		$stock->id=$data["id"];
		$stock->product_id=$data["product_id"];
		$stock->qty=$data["qty"];
		$stock->transaction_type_id=$data["transaction_type_id"];
		$stock->remark=$data["remark"];
		$stock->warehouse_id=$data["warehouse_id"];
		$stock->updated_at=$data["updated_at"];
		$stock->lot_id=$data["lot_id"];

		$stock->update();
		echo json_encode(["success" => "yes"]);
	}
}
?>

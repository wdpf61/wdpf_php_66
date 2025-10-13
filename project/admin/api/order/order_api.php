<?php
class OrderApi{
	public function __construct(){
	}
	function index(){
		echo json_encode(["orders"=>Order::all()]);
	}
	function pagination($data){
		$page=$data["page"];
		$perpage=$data["perpage"];
		echo json_encode(["orders"=>Order::pagination($page,$perpage),"total_records"=>Order::count()]);
	}
	function find($data){
		echo json_encode(["order"=>Order::find($data["id"])]);
	}
	function delete($data){
		Order::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}
	function save($data,$file=[]){
		$order=new Order();
		$order->customer_id=$data["customer_id"];
		$order->order_date=$data["order_date"];
		$order->delivery_date=$data["delivery_date"];
		$order->shipping_address=$data["shipping_address"];
		$order->order_total=$data["order_total"];
		$order->paid_amount=$data["paid_amount"];
		$order->remark=$data["remark"];
		$order->status_id=$data["status_id"];
		$order->discount=$data["discount"];
		$order->vat=$data["vat"];

		$order->save();
		echo json_encode(["success" => "yes"]);
	}
	function update($data,$file=[]){
		global $now;
		$order=new Order();
		$order->id=$data["id"];
		$order->customer_id=$data["customer_id"];
		$order->order_date=$data["order_date"];
		$order->delivery_date=$data["delivery_date"];
		$order->shipping_address=$data["shipping_address"];
		$order->order_total=$data["order_total"];
		$order->paid_amount=$data["paid_amount"];
		$order->remark=$data["remark"];
		$order->status_id=$data["status_id"];
		$order->discount=$data["discount"];
		$order->vat=$data["vat"];
		$order->updated_at=$now;

		$order->update();
		echo json_encode(["success" => "yes"]);
	}

		function order_save($data){
        $data= $data["data"];
		global $now;
		$order=new Order();
		$order->customer_id=$data["customer_id"];
		$order->order_date=$now;
		$order->delivery_date= date('Y-m-d H:i:s',strtotime('+3 days', time()));
		$order->shipping_address=$data["shipping_address"];
		$order->order_total=$data["order_total"];
		$order->paid_amount=$data["order_total"];
		$order->remark=$data["remark"];
		$order->status_id=1;
		$order->discount=$data["discount"];
		$order->vat=$data["vat"];

	    $last_order_id = $order->save();
        
        $products= $data["products"];

         foreach ($products as  $data) {
			

        $orderdetail=new OrderDetail();
		$orderdetail->order_id= $last_order_id;
		$orderdetail->product_id=$data["id"];
		$orderdetail->qty=$data["qty"];
		$orderdetail->price=$data["price"];
		$orderdetail->vat=$data["tax"];
		$orderdetail->discount=$data["discount"];
		$orderdetail->save();


		$stock=new Stock();
		$stock->product_id=$data["id"];
		$stock->qty=$data["qty"] * -1;
		$stock->transaction_type_id=1;
		$stock->remark="";
		$stock->warehouse_id=1;
		$stock->updated_at=$now;
		$stock->lot_id= 12345;

		$stock->save();

		}

		echo json_encode(["success" =>"success"]);
	}



}
?>

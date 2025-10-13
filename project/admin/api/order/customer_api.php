<?php

class CustomerApi extends Api{
	public function __construct(){     	
	}
	function index(){
		echo json_encode(Customer::all());
	}
	
	function find($data){
		$customer= Customer::find($data['id']);
		echo json_encode(["customer"=>$customer, "data"=>$data]);
	}
}


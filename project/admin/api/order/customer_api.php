<?php

class CustomerApi extends Api{
	public function __construct(){     	
	}
	function index(){
		
		echo json_encode(Customer::all());
	}
	
	function find($data){
        // print_r($data['id']);
		echo json_encode(Customer::find($data['id']));
	}
}


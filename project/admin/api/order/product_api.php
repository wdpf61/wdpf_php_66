<?php

class ProductApi extends Api{
	public function __construct(){     	
	}
	function index(){
		
		echo json_encode(Product::GetAll());
	}
	
	function find($data){
        // print_r($data['id']);
		echo json_encode(Product::find($data['id']));
	}
}


<?php

class Product{

public $id;
public $name;
public $price;
public $offer_price;
 
public function __construct($id, $name, $price , $offer_price)
{
     $this->id= $id;
     $this->name= $name;
     $this->price= $price;
     $this->offer_price= $offer_price;
}

public  function save(){
   global $db, $tx; 
   $products= $db->query("insert into  {$tx}products values(null, '$this->name', $this->price, $this->offer_price)");
   return $db->insert_id;
}
public static function GetAll(){
   global $db, $tx; 
   $products= $db->query("select * from {$tx}products");
   return $products->fetch_all(MYSQLI_ASSOC);
}

public static function find($id){
   global $db, $tx; 
   $products= $db->query("select * from {$tx}products where id=$id");
   return $products->fetch_assoc();
}

public  function update(){
   global $db, $tx; 
   $products= $db->query("update {$tx}products  set name= '$this->name', price= $this->price, offer_price= $this->offer_price where id= $this->id");
   return  $products;
}

public static function delete($id){
   global $db, $tx; 
   $products= $db->query("delete from {$tx}products where id=$id");
   return true;
}


static function html_select($name="cmbProduct"){
		global $db,$tx;
		$html="<select class='form-select' id='$name' name='$name'> ";
		$result =$db->query("select * from {$tx}products");
		while($product=$result->fetch_object()){
			$html.="<option value ='$product->id'>$product->name</option>";
		}
		$html.="</select>";
		return $html;
	}


}

?>
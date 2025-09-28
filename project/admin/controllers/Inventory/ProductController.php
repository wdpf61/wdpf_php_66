<?php

class ProductController{

public function index(){

    $data= Product::GetAll();

    view("Inventory",  $data);
}

public function create(){
    view("Inventory");
}
public function save($data){
//  print_r($data); 
//  print_r($_POST);
 
 if(isset($_POST['btn_save'])){
   $name= $_POST["name"];
   $price= $_POST["price"];
   $offer_price= $_POST["offer_price"];
   $product = new Product(null,  $name, $price, $offer_price);  
   print_r($product->save()) ; 
   redirect();
 }
}


public function edit($id){
    $data= Product::find($id);
    view("Inventory", $data);
}

public function update(){
 if(isset($_POST['btn_save'])){
   $id= $_POST["id"];
   $name= $_POST["name"];
   $price= $_POST["price"];
   $offer_price= $_POST["offer_price"];
   $product = new Product($id,  $name, $price, $offer_price);  
   $product->update() ; 
   redirect();
 }
}

public function delete($id){
    $data= Product::delete($id);
    redirect();
}




}
?>
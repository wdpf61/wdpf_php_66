<?php
 class CustomerController{

  public function index(){
      $data="I am rashed";
      view("Inventory", $data);
  }
  public function create(){
      
      view("Inventory");
  }
 }
?>
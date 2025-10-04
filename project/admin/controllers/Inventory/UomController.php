<?php

 class UomController{

  public function index(){

     $data2= Uom::getAll();

     view("Inventory", $data2);
  }

  public function create(){
      view("Inventory");
  }
  public function save($data){

//   print_r($data);
    
     if(isset($_POST['create'])){
      
       $name= $_POST['name'];

       $uom= new Uom(null, $name);
       $uom->save();
       redirect();
     }


  }


  public function edit($id){
     $uom= Uom::find($id);
    view("Inventory", $uom);
  }
  public function update($data){
     print_r($data);
    
     if(isset($_POST['update'])){
       $id= $_POST['id'];
       $name= $_POST['name'];

       $uom= new Uom($id, $name);
       $uom->update();
       redirect();
     }




  }
  public function delete($id){
     Uom::delete($id);
      redirect();
  }

 }
?>
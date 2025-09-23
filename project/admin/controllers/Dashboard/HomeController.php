<?php
class HomeController{
    public function __construct(){

    }
    public function index(){
       view("dashboard");
    }
    public function manager(){
       view("dashboard");
    }

    
}

?>
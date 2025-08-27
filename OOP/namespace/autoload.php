<?php

  include_once "user.php";
  include_once "product.php";
  include_once "product1.php";

  use product\Product ;
  use user\User;
  use user\Product as Product1;

  $user = new User();
  $product= new Product();
  $product1= new Product1();

  print_r( $user);
  print_r( $product);
  print_r( $product1);

?>
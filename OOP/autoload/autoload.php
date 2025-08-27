<?php
// Autoload function
spl_autoload_register(function ($className) {
    include "classes/" . $className . ".php";
});

// When you create an object, the class will be auto-loaded
$user = new User();
$product = new Product();

  print_r( $user);
  print_r( $product);

?>

<!-- spl_autoload_register(function ($className) {
    $file = __DIR__ . "/classes/" . $className . ".php";

    // Validate if file exists and is readable
    if (file_exists($file) && is_readable($file)) {
        include $file;
    } else {
        die("Error: Cannot load class '$className'. File '$file' not found.");
    }
}) -->
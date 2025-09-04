<?php 

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
ini_set("error_log", "E:/xampp/htdocs/wdpf-batch-66_class/php/phpbasic/coockie_regex_pdo/error.txt");
error_log("test",3, "");


//  trigger_error("This is a custom error", E_USER_WARNING);


// E_USER_NOTICE
// E_USER_WARNING
// E_USER_ERROR

// PHP categorizes errors into several types:

// Notice: Minor errors that usually do not stop script execution but indicate something unusual, such as using an undefined variable.
// Warning: More severe than a notice. It does not stop script execution but suggests that something went wrong, such as including a missing file.
// Fatal Error: Critical errors that stop script execution, like calling a function that doesn’t exist.
// Parse Error: Occurs when there’s a syntax error in the code.


// Display all errors
// error_reporting(E_ALL);

// // Display warnings and errors, but not notices
// error_reporting(E_ERROR | E_WARNING);

// // Disable error reporting
// error_reporting(0);



// error_reporting = E_ALL
// display_errors = On
// log_errors = On
// $result = file_get_contents("nonexistentfile.txt");
try {
 
  

} catch (Throwable $e) {
    // Handle the exception or error
    echo "Contact to the vendor";
    // echo "Caught throwable: " . $e->getMessage();
    // echo "Code: " . $e->getCode() . "<br>";
    // echo "File: " . $e->getFile() . "<br>";
    // echo "Line: " . $e->getLine() . "<br>";
}

// // function math($a=1, $b=1){
// //      if($b == 1){
// //         throw new InvalidArgumentException();
// //      }
// // }

// try {
//     math(10);
//     // Code that may throw various exceptions
// } //catch (InvalidArgumentException $e) {
//     //echo "Invalid argument: " . $e->getMessage();
// //} 
// catch (Exception $e) {
//     echo "General error: " . $e->getMessage();
// }



?>
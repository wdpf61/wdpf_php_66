<?php
/*
====================================================
PHP Functions - Detailed Notes & Examples
====================================================
Author: Md Taohid Imdad
Description: Covers all essential function concepts in PHP
====================================================
*/

// 1. Defining and Calling Functions
// ----------------------------------
// Functions help you organize reusable code blocks.
// Syntax: function functionName(parameters) { code }

function greet() {
    echo "Hello, World!\n";
}
greet(); // Call the function


// 2. Function Parameters
// -----------------------
// a) Default Parameters
function sayHello($name = "Guest") {
    echo "Hello, $name!\n";
}
sayHello("Alice");
sayHello(); // Uses default

// b) Optional Parameters (just by providing default value or not using them)
function add($a, $b = 0) {
    return $a + $b;
}
echo add(5) . "\n"; // 5 + 0 = 5

// c) Named Arguments (PHP 8+)
function makeCoffee($type = "Cappuccino", $size = "Medium") {
    echo "Making a $size $type.\n";
}
makeCoffee(size: "Large", type: "Espresso");


// 3. Return Values
// -----------------
function multiply($x, $y) {
    return $x * $y; // Returns the product
}
$result = multiply(4, 5);
echo "4 * 5 = $result\n";


// 4. Variable Scope
// ------------------
// a) Local Scope
function localScopeExample() {
    $localVar = "I'm local";
    echo $localVar . "\n";
}
localScopeExample();
// echo $localVar; // ERROR: undefined

// b) Global Scope
$globalVar = "I'm global";
function globalScopeExample() {
    global $globalVar;
    echo $globalVar . "\n";
}
globalScopeExample();

// c) Static Variables - Retain value between function calls
function counter() {
    static $count = 0;
    $count++;
    echo "Count: $count\n";
}
counter();
counter();
counter();


// 5. Anonymous Functions & Closures
// -----------------------------------
$greet = function($name) {
    return "Hello, $name!";
};
echo $greet("Bob") . "\n";

// Closure using 'use' to capture variables from outside
$message = "Have a great day!";
$greeter = function($name) use ($message) {
    return "Hello, $name! $message";
};
echo $greeter("Charlie") . "\n";


// 6. Recursion
// -------------
// Recursion: A function calling itself
function factorial($n) {
    if ($n <= 1) return 1;
    return $n * factorial($n - 1);
}
echo "Factorial of 5 is " . factorial(5) . "\n";



// --------------
// - Functions can return any type (int, string, array, object).
// - You can type-hint parameters and return values for safety.
// - Avoid deep recursion for performance.
// - Anonymous functions are useful for callbacks and array functions.

// Example: Passing anonymous function to array_map
$numbers = [1, 2, 3, 4];
$squares = array_map(function($n) { return $n ** 2; }, $numbers);
print_r($squares);
?>

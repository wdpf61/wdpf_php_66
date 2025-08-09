<?php


// ----------------------------------------------
// 1. Introduction to PHP
// ----------------------------------------------
// PHP stands for "PHP: Hypertext Preprocessor".
// It is a server-side scripting language used for web development.
// PHP code is executed on the server and sent to the browser as HTML.

// ----------------------------------------------
// 2. PHP Syntax, Tags, and Code Structure
// ----------------------------------------------
// PHP code is written inside <?php ... tags
// We can mix PHP code with HTML.

echo "<h1>PHP Basics</h1>";

// ----------------------------------------------
// 3. Echo, Print, and Comments
// ----------------------------------------------
// echo and print are used to output data to the browser.

echo "Hello, World!<br>";
print "This is printed using print.<br>";



// 1. ECHO - simple output
echo "<h2>1. echo</h2>";
echo "Hello with echo!<br>";
echo "Multiple ", "strings ", "with echo.<br>";

// 2. PRINT - similar to echo but returns 1
echo "<h2>2. print</h2>";
print "Hello with print!<br>";
$result = print "Print returns a value: ";
echo $result . "<br>"; // Outputs: 1

// 3. PRINT_R - human-readable array/object output
echo "<h2>3. print_r</h2>";
$array = ["Apple", "Banana", "Cherry"];
print_r($array);
echo "<br>As string:<br><pre>" . print_r($array, true) . "</pre>";

// 4. VAR_DUMP - detailed variable info (type + value)
echo "<h2>4. var_dump</h2>";
$val = 42.5;
var_dump($val);
echo "<br>";
$complexArray = [1, "two", 3.14];
var_dump($complexArray);
echo "<br>";

// 5. VAR_EXPORT - outputs valid PHP code
echo "<h2>5. var_export</h2>";
$data = ["name" => "John", "age" => 30];
var_export($data);
echo "<br>As string:<br><pre>" . var_export($data, true) . "</pre>";

// 6. PRINTF - formatted output
echo "<h2>6. printf</h2>";
$number = 123.456;
printf("Formatted number: %.2f<br>", $number);
$name = "Alice";
printf("Hello, %s!<br>", $name);

// 7. SPRINTF - formatted string (returns)
echo "<h2>7. sprintf</h2>";
$msg = sprintf("Welcome, %s. You have %.1f points.", "Bob", 85.7);
echo $msg . "<br>";

// 8. DIE / EXIT - terminates the script (commented to allow full demo)
echo "<h2>8. die / exit</h2>";
echo "This will run.<br>";
// Uncomment the next line to test die()
// die("Script terminated with die().");
// echo "This won't run."; // This won't be executed




// Comments in PHP:
// Single line comment
# Another single line comment
/*
Multi-line
comment
*/

// ----------------------------------------------
// 4. Variables and Constants
// ----------------------------------------------
// Variables start with $ and are case-sensitive.
// Constants are defined using define() or const keyword.

$name = "John Doe"; // variable
$age = 25;

define("SITE_NAME", "My Website"); // constant

echo "Name: $name, Age: $age, Website: " . SITE_NAME . "<br>";

// ----------------------------------------------
// 5. Data Types
// ----------------------------------------------

echo "<br>";


$string = "Hello";       // String
$integer = 100;          // Integer
$float = 99.99;          // Float
$boolean = true;         // Boolean
$array = ["apple", "banana", "cherry"]; // Array
$object = (object) ["firstName" => "John", "lastName" => "Doe"]; // Object
$nullVar = null;         // NULL

// var_dump($string, $integer, $float, $boolean, $array, $object, $nullVar);



echo "<br>";

// ----------------------------------------------
// 6. String Manipulation Functions
// ----------------------------------------------
$text = "  Hello PHP World  ";
echo "Length: " . strlen($text) . "<br>";          // String length
echo "Word Count: " . str_word_count($text) . "<br>"; // Word count
echo "Uppercase: " . strtoupper($text) . "<br>";   // Uppercase
echo "Lowercase: " . strtolower($text) . "<br>";   // Lowercase
echo "Trimmed: '" . trim($text) . "'<br>";         // Trim spaces
echo "Replace: " . str_replace("PHP", "Laravel", $text) . "<br>"; // Replace

// ----------------------------------------------
// 7. Operators
// ----------------------------------------------

// Arithmetic Operators
$a = 10;
$b = 3;
echo "Addition: " . ($a + $b) . "<br>";
echo "Subtraction: " . ($a - $b) . "<br>";
echo "Multiplication: " . ($a * $b) . "<br>";
echo "Division: " . ($a / $b) . "<br>";
echo "Modulus: " . ($a % $b) . "<br>";

// Assignment Operators
$c = 5;
$c += 2; // $c = $c + 2
echo "Assignment += : $c <br>";

// Comparison Operators
var_dump($a == $b);  // Equal
var_dump($a != $b);  // Not equal
var_dump($a > $b);   // Greater than
echo "<br>";

// Logical Operators
$trueVar = true;
$falseVar = false;
var_dump($trueVar && $falseVar); // AND
var_dump($trueVar || $falseVar); // OR
echo "<br>";

// Increment/Decrement
$num = 5;
echo "Pre-increment: " . (++$num) . "<br>"; // 6
echo "Post-increment: " . ($num++) . "<br>"; // 6, then $num becomes 7
echo "Now num: $num <br>";

// ----------------------------------------------
// 8. Type Casting
// ----------------------------------------------
$val = "100";
$intVal = (int) $val; // cast to integer
$floatVal = (float) $val; // cast to float
var_dump($val, $intVal, $floatVal);

?>

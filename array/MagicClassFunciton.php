<?php
// Magic Functions Example in a Class

class MagicDemo {
    private $data = [];

    // Called when object is created
    public function __construct() {
        echo "__construct called: Object created<br>";
    }

    // Called when object is destroyed
    public function __destruct() {
        echo "__destruct called: Object destroyed<br>";
    }

    // Called when calling inaccessible or non-existing methods
    public function __call($name, $arguments) {
        echo "__call called: Method '$name' not found. Arguments: " . implode(", ", $arguments) . "<br>";
    }

    // Called when calling inaccessible or non-existing static methods
    public static function __callStatic($name, $arguments) {
        echo "__callStatic called: Static Method '$name' not found. Arguments: " . implode(", ", $arguments) . "<br>";
    }

    // Called when setting inaccessible or non-existing property
    public function __set($name, $value) {
        echo "__set called: Setting '$name' to '$value'<br>";
        $this->data[$name] = $value;
    }

    // Called when getting inaccessible or non-existing property
    public function __get($name) {
        echo "__get called: Getting '$name'<br>";
        return $this->data[$name] ?? null;
    }

    // Called when isset() or empty() is used on inaccessible/non-existing property
    public function __isset($name) {
        echo "__isset called on '$name'<br>";
        return isset($this->data[$name]);
    }

    // Called when unset() is used on inaccessible/non-existing property
    public function __unset($name) {
        echo "__unset called on '$name'<br>";
        unset($this->data[$name]);
    }

    // Converts object to string
    public function __toString() {
        return "__toString called: Object as string";
    }

    // Invoked when object is called as a function
    public function __invoke($arg) {
        echo "__invoke called: Object called as function with argument '$arg'<br>";
    }

    // Called when var_export() is used
    public static function __set_state($array) {
        $obj = new self();
        $obj->data = $array;
        echo "__set_state called: Creating object from var_export<br>";
        return $obj;
    }

    // Called when clone is used
    public function __clone() {
        echo "__clone called: Object cloned<br>";
    }

    // Debug info when var_dump() is used
    public function __debugInfo() {
        return ["debug" => "This is custom debug info"];
    }
}

// --- Testing ---
echo "<h2>Testing Magic Methods</h2>";

$obj = new MagicDemo(); // __construct
$obj->unknownMethod("arg1", "arg2"); // __call
MagicDemo::unknownStatic("argX");    // __callStatic

$obj->name = "Khaled"; // __set
echo $obj->name . "<br>"; // __get

isset($obj->name); // __isset
unset($obj->name); // __unset

echo $obj . "<br>"; // __toString
$obj("Hello"); // __invoke

$cloneObj = clone $obj; // __clone
var_dump($obj); // __debugInfo

$exportObj = var_export($obj, true); // __set_state

?>

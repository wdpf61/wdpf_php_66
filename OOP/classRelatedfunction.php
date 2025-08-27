<?php
// Example PHP file demonstrating class-related functions

// Define a sample class
class Person {
    public $name;
    public $age;
    private $salary;

    public function __construct($name, $age, $salary) {
        $this->name = $name;
        $this->age = $age;
        $this->salary = $salary;
    }

    public function greet() {
        return "Hello, my name is {$this->name}";
    }

    private function getSalary() {
        return $this->salary;
    }
}

// Create an object
$person = new Person("Alice", 30, 50000);

// 1. Get class name
echo "Class Name: " . get_class($person) . "\n";

// 2. Get parent class (if any)
echo "Parent Class: " . get_parent_class($person) . "\n";

// 3. Get all class methods
echo "Class Methods: \n";
print_r(get_class_methods($person));

// 4. Get object properties
echo "Object Properties: \n";
print_r(get_object_vars($person));

// 5. Check if method exists
$methodName = "greet";
if (method_exists($person, $methodName)) {
    echo "Method '$methodName' exists.\n";
}

// 6. Check if property exists
$propertyName = "name";
if (property_exists($person, $propertyName)) {
    echo "Property '$propertyName' exists.\n";
}

// 7. Get class constants
class Example {
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;
}
echo "Class Constants: \n";
print_r((new ReflectionClass('Example'))->getConstants());

// 8. Get all declared classes
echo "Declared Classes: \n";
print_r(get_declared_classes());

// 9. Get all declared interfaces
echo "Declared Interfaces: \n";
print_r(get_declared_interfaces());

?>

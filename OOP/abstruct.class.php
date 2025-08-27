<?php


// Abstract class
abstract class Animal {
    // Abstract method (must be implemented by child classes)
    abstract public function makeSound();

    // Normal method
    public function eat() {
        echo "Eating food<br>";
    }
}

// Child class
class Dog extends Animal {
    // Implement abstract method
    public function makeSound() {
        echo "Woof Woof!<br>";
    }
}

// Child class
class Cat extends Animal {
    public function makeSound() {
        echo "Meow Meow!<br>";
    }
}

// Create objects
$dog = new Dog();
$dog->makeSound(); // Woof Woof!
$dog->eat();       // Eating food

$cat = new Cat();
$cat->makeSound(); // Meow Meow!
$cat->eat();       // Eating food

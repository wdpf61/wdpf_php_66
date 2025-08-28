<?php
// Early vs Late Binding Example in PHP

class A {
    public static function who() {
        echo "I am A";
    }
    // Early Binding (self::)
    public static function testEarly() {
        self::who(); // fixed at compile time
    }

    // Late Binding (static::)
    public static function testLate() {
        static::who(); // resolved at runtime
    }
}



// echo A::add();

$a = new A();
// echo $a->sub();





class B extends A {
    public static function who() {
        echo "I am B";
    }
}



// ---------- Testing ----------
// echo "=== Early Binding ===";
// B::testEarly(); // Output: I am A

// echo "=== Late Binding ===";
// B::testLate();  // Output: I am B
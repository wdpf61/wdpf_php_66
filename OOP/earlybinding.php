<?php
// Early vs Late Binding Example in PHP

class A {
    public static function who() {
        echo "I am A\n";
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

class B extends A {
    public static function who() {
        echo "I am B\n";
    }
}

// ---------- Testing ----------
echo "=== Early Binding ===\n";
B::testEarly(); // Output: I am A

echo "\n=== Late Binding ===\n";
B::testLate();  // Output: I am B
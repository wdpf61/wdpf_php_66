<?php
/*
====================================================
PHP STRING MANIPULATION FUNCTIONS - NOTES & EXAMPLES
====================================================
Description: Complete list of commonly used PHP string functions with examples.
====================================================
*/

// Original string for demonstration
$str = "  Hello World! Welcome to PHP String Functions.  ";

echo "<h1>PHP String Functions</h1>";

// // 1. strlen() - Get string length
// echo "Length: " . strlen($str) . "<br>";

// // 2. str_word_count() - Count words in string
// echo "Word count: " . str_word_count($str) . "<br>";

// // 3. strrev() - Reverse a string
// echo "Reversed: " . strrev($str) . "<br>";

// 4. strpos() - Find position of first occurrence
// echo "Position of 'World': " . strpos($str, "World") . "<br>";

// // 5. strrpos() - Find position of last occurrence
// echo "Last position of 'o': " . strrpos($str, "o") . "<br>";

// // 6. substr() - Extract substring
// echo "Substring (0-5): " . substr($str, 0, 5) . "<br>";

// // 7. strtoupper() - Convert to uppercase
// echo "Uppercase: " . strtoupper($str) . "<br>";

// // 8. strtolower() - Convert to lowercase
// echo "Lowercase: " . strtolower($str) . "<br>";

// // 9. ucfirst() - Uppercase first letter of string
// echo "Ucfirst: " . ucfirst(trim($str)) . "<br>";

// // 10. lcfirst() - Lowercase first letter
// echo "Lcfirst: " . lcfirst(trim($str)) . "<br>";

// // 11. ucwords() - Uppercase first letter of each word
// echo "Ucwords: " . ucwords(trim($str)) . "<br>";

// // 12. trim() - Remove whitespace from both ends
// echo "Trimmed: '" . trim($str) . "'<br>";

// // 13. ltrim() - Remove whitespace from left side
// echo "Ltrim: '" . ltrim($str) . "'<br>";

// // 14. rtrim() - Remove whitespace from right side
// echo "Rtrim: '" . rtrim($str) . "'<br>";

// // 15. str_replace() - Replace all occurrences
// echo "Replace 'World' with 'Universe': " . str_replace("World", "Universe", $str) . "<br>";

// // 16. str_ireplace() - Replace without case sensitivity
// echo "Case-insensitive replace: " . str_ireplace("world", "Planet", $str) . "<br>";

// // 17. str_repeat() - Repeat a string
// echo "Repeat 'Hi': " . str_repeat("Hi ", 3) . "<br>";

// // 18. str_split() - Split string into array
// print_r(str_split("Hello"));
// echo "<br>";

// // 19. explode() - Split string by delimiter into array
// $words = explode(" ", trim($str));
// // print_r($words);
// // echo "<br>";

// // 20. implode() - Join array into string
// echo "Imploded: " . implode("-", $words) . "<br>";

// // 21. number_format() - Format numbers in string
// $price = 12345.678;
// echo "Number formatted: " . number_format($price, 2) . "<br>";

// // 22. sprintf() - Return formatted string
// $name = "John";
// $age = 25;
// echo sprintf("Name: %s, Age: %d", $name, $age) . "<br>";

// // 23. printf() - Output formatted string
// printf("PI value: %.2f<br>", 3.14159);

// // 24. htmlspecialchars() - Convert special chars to HTML entities
// echo htmlspecialchars("<b>Bold Text</b>") . "<br>";

// // 25. htmlentities() - Convert all applicable characters to HTML entities
// echo htmlentities("© 2025 PHP") . "<br>";

// // 26. html_entity_decode() - Convert HTML entities to characters
// echo html_entity_decode("&copy; 2025 PHP") . "<br>";

// // 27. strip_tags() - Strip HTML and PHP tags
// echo strip_tags("<p>Hello <b>World</b></p>") . "<br>";

// // // 28. addslashes() - Add backslashes before quotes
// $str2 = "It's a 'beautiful' day";
// // echo addslashes($str2) . "<br>";

// // 29. stripslashes() - Remove backslashes
// echo stripslashes(addslashes($str2)) . "<br>";

// // 30. chunk_split() - Split string into chunks
// echo chunk_split("HelloWorld", 2, "-") . "<br>";

// // 31. strcmp() - Compare two strings (case-sensitive)
// echo "strcmp: " . strcmp("Hello", "hello") . "<br>";

// // 32. strcasecmp() - Compare two strings (case-insensitive)
// echo "strcasecmp: " . strcasecmp("Hello", "hello") . "<br>";

// // 33. strncasecmp() - Compare first n chars (case-insensitive)
// echo "strncasecmp (first 4): " . strncasecmp("Hello", "heyy", 4) . "<br>";

// // 34. substr_count() - Count substring occurrences
// echo "Count of 'o': " . substr_count($str, "o") . "<br>";

// // 35. wordwrap() - Wrap string to a given number of characters
// echo nl2br(wordwrap("This is a long text that will be wrapped.", 10)) . "<br>";

// // 36. metaphone() - Get metaphone key of string (sound-based)
// echo "Metaphone of 'World': " . metaphone("World") . "<br>";

// // 37. levenshtein() - Calculate difference between two strings
// echo "Levenshtein distance: " . levenshtein("kitten", "sitting") . "<br>";

// // 38. similar_text() - Calculate similarity percentage
// similar_text("Hello World", "Hello PHP", $percent);
// echo "Similarity: $percent%<br>";

// // 39. str_pad() - Pad string to certain length
// echo str_pad("PHP", 11, "*", STR_PAD_BOTH) . "<br>";

// 40. strstr() - Find first occurrence of string
// echo strstr("Hello World", "World") . "<br>";
$email = "user@example.com";

// // Get domain part
// $domain = strstr($email, "@");
// echo $domain; // Output: @example.com

// // Get part before '@'
// $username = strstr($email, "@", true);
// echo $username; // Output: user


// // 41. stristr() - Case-insensitive strstr
// echo stristr("Hello World", "world") . "<br>";

// $text = "Hello";
// echo str_pad($text, 10, "*"); // Output: Hello*****
// echo str_pad($text, 10, "*", STR_PAD_LEFT); // Output: *****Hello
// echo str_pad($text, 10, "*", STR_PAD_BOTH); // Output: **Hello***

// // 42. strtok() - Tokenize string
// $tok = strtok("Hello World PHP", " ");
// while ($tok !== false) {
//     echo $tok . "<br>";
//     $tok = strtok(" ");
// }

?>

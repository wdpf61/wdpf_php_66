<?php 

// \w: Matches any word character (alphanumeric + underscore)
// \s: Matches any whitespace character
// .: Matches any character except newline
// *: Matches 0 or more occurrences
// +: Matches 1 or more occurrences
// ?: Matches 0 or 1 occurrence (optional)
// {n}: Matches exactly n occurrences  {2,4}
// ^: Asserts the start of a line
// $: Asserts the end of a line

//$pattern = "/regex_pattern/";  // Delimiters are / /


// $pattern = "/^hello/i";  // i modifier makes it case-insensitive
// $string = "Hello, world!";
// if (preg_match($pattern, $string)) {
//     echo "Match found!";
// }
// $pattern = "/^\w+@\w+\.\w+$/";  // i modifier makes it case-insensitive
// $string = "wdpf@gmail.com";
// if (preg_match($pattern, $string)) {
//     echo "Match found!";
// }


// $pattern = "/\b\w{4}\b/";  // Matches words with exactly 4 characters
// $string = "This is a test.";
// preg_match_all($pattern, $string, $matches);
// print_r($matches[0]);  // Outputs words with 4 characters

// $pattern = "/world/i";
// $replacement = "universe";
// $string = "Hello, world!";
// $new_string = preg_replace($pattern, $replacement, $string);
// echo $new_string;  // Outputs "Hello, universe!"



// $pattern = "/[\s,]+/";  // Split by whitespace or commas
// $string = "apple, orange banana";
// $result = preg_split($pattern, $string);
// print_r($result);  // Outputs: ["apple", "orange", "banana"]




// $pattern = "/\d+/";  // Matches any sequence of digits
// $string = "There are 15 apples and 10 bananas.";
// $result = preg_replace_callback($pattern, function ($matches) {
//     return $matches[0] * 2;  // Multiply each match by 2
// }, $string);
// echo $result;
// // Output: "There are 30 apples and 20 bananas."


// $pattern = "/^a/i";  // Matches any string that starts with 'a' (case-insensitive)
// $array = ["Apple", "Banana", "Avocado", "Cherry"];
// $result = preg_grep($pattern, $array);
// print_r($result);
// // Output: Array ( [0] => Apple [2] => Avocado )

//for dynamically create regex
// $string = "How are you?";
// $escaped_string = preg_quote($string, "/");
// echo $escaped_string;



// $date = "11-09-2024";
// $date = "-2024-11-09";

// if (preg_match("/^\d{2}-\d{2}-\d{4}$/", $date)) {
//     echo "Valid date format!";
// } else if(preg_match("/^\d{4}-\d{2}-\d{2}$/", $date)) {
//     echo "Valid date format!";
// }else{
//     echo "Invalid date format!";
//}
// Output: "Valid date format!"




?>
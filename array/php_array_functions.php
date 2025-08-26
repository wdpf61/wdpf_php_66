<?php
echo "<h1>PHP Array Functions</h1>";

// Sample arrays
$arr = [1, 2, 3, 4, 5];
$assoc = ["a" => 1,  "c" => 3, "b" => 2];
$nested = [["id" => 1, "name" => "John"], ["id" => 2, "name" => "Jane"]];

// // 1. count() - Count elements
//  echo "Count: " . count($arr) . "<br>";

// // 2. is_array() - Check if variable is an array
// var_dump(is_array($arr));
// echo "<br>";

// // 3. in_array() - Check if value exists
// var_dump(in_array(3, $arr));
// echo "<br>";

// // 4. array_push() - Add elements to end
// array_push($arr, 6, 7);
// print_r($arr);
// echo "<br>";

// 5. array_pop() - Remove last element
// array_pop($arr);
// print_r($arr);
// echo "<br>";

// // 6. array_unshift() - Add to start
// array_unshift($arr, 100);
// print_r($arr);
// echo "<br>";

// // 7. array_shift() - Remove first element
// array_shift($arr);
// print_r($arr);
// echo "<br>";

// //8. array_merge() - Merge arrays
// $arr2 = [8, 9];
// print_r( array_merge($arr, $arr2));
// echo "<br>";

//  // 9. array_combine() - Combine keys and values
// $keys = ["x", "y", "z"];
// $values = [10, 20, 30];
// print_r(array_combine($keys, $values));
// echo "<br>";

// // 10. array_slice() - Extract portion
// print_r(array_slice($arr, 2, 2));
// echo "<br>";

// 11. array_splice() - Remove/replace
// $arr3 = [1, 2, 3, 4, 5];
// array_splice($arr3, 2, 2, [99, 100]);
// print_r($arr3);
// echo "<br>";

// // 12. array_keys() - Get keys
// print_r(array_keys($assoc));
// echo "<br>";

// // 13. array_values() - Get values
// print_r(array_values($assoc));
// echo "<br>";

// // 14. array_key_exists() - Check key exists
// var_dump(array_key_exists("b", $assoc));
// echo "<br>";

// // 15. array_flip() - Flip keys and values
// print_r(array_flip($assoc));
// echo "<br>";

// // 16. array_reverse() - Reverse array
// print_r(array_reverse($arr));
// echo "<br>";

// // 17. array_unique() - Remove duplicates
// $dup = [1, 2, 2, 3, 3, 3];
// print_r(array_unique($dup));
// echo "<br>";

// // 18. array_map() - Apply function
// print_r(array_map("strtoupper", ["apple", "banana"]));
// echo "<br>";

// 19. array_filter() - Filter with callback
// print_r( array_filter($arr, fn($x) => $x > 3  )  );
// echo "<br>";

// // 20. array_reduce() - Reduce to single value
// echo array_reduce($arr, fn($carry, $item) => $carry + $item, 0) . "<br>";

// // 21. sort() - Sort ascending (values)
$nums = [5, 3, 1, 4];
// sort($nums);
// print_r($nums);
// echo "<br>";

// // 22. rsort() - Sort descending
// rsort($nums);
// print_r($nums);
// echo "<br>";

// // 23. asort() - Sort ascending (assoc by value)
// asort($assoc);
// print_r($assoc);
// echo "<br>";

// // 24. arsort() - Sort descending (assoc by value)
// arsort($assoc);
// print_r($assoc);
// echo "<br>";

// // 25. ksort() - Sort by key ascending
// ksort($assoc);
// print_r($assoc);
// echo "<br>";

// // 26. krsort() - Sort by key descending
// krsort($assoc);
// print_r($assoc);
// echo "<br>";

// // 27. shuffle() - Randomize order
// shuffle($arr);
// print_r($arr);
// echo "<br>";

// // 28. range() - Create array range
// print_r(range(1, 100));
// echo "<br>";

// // 29. array_sum() - Sum values
// echo array_sum([1, 2, 3]) . "<br>";

// // 30. array_product() - Multiply values
// echo array_product([1, 2, 3, 4]) . "<br>";

// // 31. array_chunk() - Split array into chunks
// print_r(array_chunk($arr, 2));
// echo "<br>";

// // 32. array_intersect() - Intersection
// print_r(array_intersect([1, 2, 3], [2, 3, 4]));
// echo "<br>";

// // 33. array_diff() - Difference
// print_r(array_diff([1, 2, 3], [2, 3, 4]));
// echo "<br>";

// // 34. array_walk() - Apply function to each element
// array_walk($arr, function(&$item) { $item *= 2; });
// print_r($arr);
// echo "<br>";

// // 35. compact() - Create array from variables
// $var1 = "PHP";
// $var2 = "Laravel";
// print_r(compact("var1", "var2"));
// echo "<br>";

// // 36. extract() - Import variables from array
// $info = ["lang" => "PHP", "version" => "8.0"];
// extract($info);
// echo "Language: $lang, Version: $version<br>";

// // 37. list() - Assign variables from array
// list($a, $b, $c) = [10, 20, 30];
// echo "a=$a, b=$b, c=$c<br>";

// // 38. array_column() - Get column from multidimensional array
// print_r(array_column($nested, "name"));
// echo "<br>";

// // 39. array_rand() - Pick random keys
// $keys = array_rand($assoc, 2);
// print_r($keys);
// echo "<br>";

// // 40. array_search() - Search value and return key
// echo array_search(2, $assoc) . "<br>";

// // 41. end() - Get last element
// echo end($arr) . "<br>";

// // 42. current() - Get current element
// echo current($arr) . "<br>";

// // 43. next() - Move pointer forward
 next($arr);
 echo current($arr) . "<br>";

// 44. prev() - Move pointer backward
// prev($arr);
// echo current($arr) . "<br>";

// 45. reset() - Reset pointer to first element
reset($arr);
echo current($arr) . "<br>";
?>

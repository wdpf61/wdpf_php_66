<?php
/*
============================================================
PHP Superglobals - Notes & Examples
============================================================
Superglobals are built-in variables in PHP that are always accessible,
regardless of scope (inside functions, classes, or files).

List of PHP Superglobals:
1. $GLOBALS
2. $_SERVER
3. $_REQUEST
4. $_POST
5. $_GET
6. $_FILES
7. $_ENV
8. $_COOKIE
9. $_SESSION
*/

// 1. $GLOBALS
/*
- Stores all global variables in an associative array.
- Can be used to access global variables inside functions.
*/
// $a = 10;
// $b = 20;
// function sumNumbers() {
//     $GLOBALS['sum'] = $GLOBALS['a'] + $GLOBALS['b'];
// }
// sumNumbers();
// echo "GLOBALS Example - Sum: " . $sum . "\n\n";
// echo "<pre>" ;
// print_r($GLOBALS);
// echo "</pre>" ;

// // 2. $_SERVER
// /*
// - Contains information about headers, paths, and script locations.
// - Often used for debugging or getting request info.
// */
// echo "SERVER Example:\n";
// echo "PHP Self: " . $_SERVER['PHP_SELF'] . "\n";
// echo "Server Name: " . $_SERVER['SERVER_NAME'] . "\n";
// echo "Request Method: " . $_SERVER['REQUEST_METHOD'] . "\n\n";

// echo "<pre>" ;
// print_r($_SERVER);
// echo "</pre>" ;


// // 3. $_REQUEST
// /*
// - Combines $_GET, $_POST, and $_COOKIE data.
// - Usually used for quick form handling but not recommended for sensitive data.
// */
// if (!empty($_REQUEST['name'])) {
//     echo "REQUEST Example: Hello, " . htmlspecialchars($_REQUEST['name']) . "\n\n";
// }

// // 4. $_POST
// /*
// - Stores data sent via HTTP POST method.
// - Used for form submissions with sensitive data (login, registration).
// */
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     if (!empty($_POST['username'])) {
//         echo "POST Example: Username is " . htmlspecialchars($_POST['username']) . "\n\n";
//     }
// }

// // 5. $_GET
// /*
// - Stores data sent via HTTP GET method (query string).
// - Visible in the URL, so avoid sending sensitive data.
// Example URL: script.php?color=blue
// */
// if (!empty($_GET['color'])) {
//     echo "GET Example: Favorite color is " . htmlspecialchars($_GET['color']) . "\n\n";
// }

// // 6. $_FILES
// /*
// - Used to handle file uploads.
// - Stores information about uploaded files in an associative array.
// */
// if (!empty($_FILES['uploaded_file'])) {
//     echo "FILES Example:\n";
//     echo "File Name: " . $_FILES['uploaded_file']['name'] . "\n";
//     echo "File Type: " . $_FILES['uploaded_file']['type'] . "\n";
//     echo "File Size: " . $_FILES['uploaded_file']['size'] . " bytes\n\n";
// }

// 7. $_ENV
/*
- Stores environment variables.
- Often used for configuration values.
- Access may require enabling 'variables_order' in php.ini.
*/
// $_ENV['APP_ENV'] = 'development'; // Setting manually for example
// echo "ENV Example: Application Environment = " . $_ENV['APP_ENV'] . "\n\n";

// echo "<pre>" ;
// print_r($_ENV);
// echo "</pre>" ;

// // 8. $_COOKIE
// /*
// - Stores data sent to the client as cookies.
// - Useful for remembering user preferences.
// */
//  setcookie("user", "John Doe", time() + 3600); // 1-hour expiry
// if (!empty($_COOKIE['user'])) {
//     echo "COOKIE Example: Welcome back, " . htmlspecialchars($_COOKIE['user']) . "\n\n";
// }

// setcookie("user", "", time() - 3600, "/"); // Expired 1 hour ago

// // 9. $_SESSION
// /*
// - Stores user session data across multiple pages.
// - Requires session_start() to be called at the beginning of the script.
// */
// session_start();
// $_SESSION['loggedin'] = true;
// if (!empty($_SESSION['loggedin'])) {
//     echo "SESSION Example: User is logged in.\n\n";
// }
?>

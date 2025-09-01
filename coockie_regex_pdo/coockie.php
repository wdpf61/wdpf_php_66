<?php 

//setcookie(name, value, expire, path, domain, secure, httponly);
// Set a cookie that expires in 1 hour
//setcookie("user", "John Doe", time() + 3600, "/");

if (isset($_COOKIE["user"])) {
    echo "Hello " . $_COOKIE["user"];
} else {
    echo "Hello Guest";
}

// // Update the "user" cookie value to "Jane Doe" and extend expiration by 1 hour
// setcookie("user", "Jane Doe i am here", time() + 3600, "/");

//setcookie("user", "", time() - 3600, "/");



// // Secure cookies: Set the secure flag to ensure the cookie is sent only over HTTPS connections.
// // HttpOnly cookies: Set the httponly flag to prevent JavaScript access to cookies, which helps protect against XSS attacks.
// // SameSite cookies: To prevent Cross-Site Request Forgery (CSRF) attacks, set the SameSite attribute in PHP 7.3+:


// setcookie("user", "John Doe", [
//     "expires" => time() + 3600,
//     "path" => "/",
//     "domain" => "example.com",
//     "secure" => true,
//     "httponly" => true,
//     "samesite" => "Strict"
// ]);


// // Assuming login is successful
// setcookie("username", "JohnDoe", time() + (86400 * 30), "/"); // 30-day cookie
// if (isset($_COOKIE["username"])) {
//     echo "Welcome, " . $_COOKIE["username"];
// } else {
//     echo "Please log in.";
// }

// // Delete the cookie to log the user out
// setcookie("username", "", time() - 3600, "/");


// // User selects a language, and we set a cookie to remember it for 30 days
// if (isset($_POST['language'])) {
//     setcookie("language", $_POST['language'], time() + (86400 * 30), "/");
//     echo "Language preference saved!";
// }


// // Display content based on saved language preference
// if (isset($_COOKIE["language"])) {
//     echo "Welcome, you are viewing the site in " . $_COOKIE["language"];
// } else {
//     echo "Welcome, please select your language preference.";
// }


// if (!isset($_COOKIE["visit_count"])) {
//     $visit_count = 1;
// } else {
//     $visit_count = $_COOKIE["visit_count"] + 1;
// }
// setcookie("visit_count", $visit_count, time() + (86400 * 30), "/"); // 30 days
// echo "This is your visit number: " . $visit_count;



// if (isset($_POST['username']) && isset($_POST['remember_me'])) {
//     $username = $_POST['username'];
//     // Set cookie to remember user for 30 days
//     setcookie("username", $username, time() + (86400 * 30), "/"); 
//     echo "Login successful, welcome " . $username;
// } else {
//     echo "Please log in.";
// }



// if (isset($_COOKIE["username"])) {
//     echo "Welcome back, " . $_COOKIE["username"];
// } else {
//     echo "Hello Guest, please log in.";
// }



// if (isset($_POST['dark_mode'])) {
//     $dark_mode = $_POST['dark_mode'] == "on" ? "enabled" : "disabled";
//     setcookie("dark_mode", $dark_mode, time() + (86400 * 30), "/"); // 30 days
// }



// $dark_mode = isset($_COOKIE["dark_mode"]) && $_COOKIE["dark_mode"] == "enabled";
// if ($dark_mode) {
//     echo "<body class='dark-mode'>";
// } else {
//     echo "<body>";
// }






?>
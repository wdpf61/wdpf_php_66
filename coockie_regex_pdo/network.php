<?php 

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// echo "<pre>";
// print_r($_SERVER);
// echo "</pre>";

// $ip = gethostbyname("www.google.com");
// echo "IP address: $ip";

// $hostname = gethostbyaddr("8.8.8.8");
// echo "Hostname: $hostname";


$ch = curl_init("https://jsonplaceholder.typicode.com/todos");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);
echo $response;






?>
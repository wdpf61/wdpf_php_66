<?php 
$dsn = 'mysql:host=localhost;dbname=testdb';
$username = 'root';
$password = '';

try {
    $pdo = new PDO($dsn, $username, $password);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}


$stmt = $pdo->query("SELECT * FROM users");
foreach ($stmt as $row) {
    echo $row['username'] . "<br>";
}


$stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id");
$stmt->execute(['id' => $userId]);
$user = $stmt->fetch();


$stmt = $pdo->prepare("INSERT INTO users (username, email) VALUES (:username, :email)");
$stmt->execute(['username' => $username, 'email' => $email]);



try {
    $pdo->beginTransaction();
    $pdo->exec("INSERT INTO users (username) VALUES ('john_doe')");
    $pdo->exec("INSERT INTO orders (user_id, amount) VALUES (LAST_INSERT_ID(), 99.99)");
    $pdo->commit();
} catch (Exception $e) {
    $pdo->rollback();
    echo "Failed: " . $e->getMessage();
}




?>
<?php
$host = 'localhost';  // Change if your database is on a different server
$dbname = 'simple_api_db';
$username = 'vikram123';   // Replace with your database username
$password = 'Vikram@123';       // Replace with your database password

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Could not connect to the database $dbname :" . $e->getMessage());
}
?>

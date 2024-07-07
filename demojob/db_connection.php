<?php
// db_connection.php
$servername = "localhost";
$username = "vikram";
$password = "Parjapat@123";
$dbname = "coder";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

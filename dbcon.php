<?php

$server = "localhost";
$user = "vikram";
$password = "Parjapat@123";
$db = "coder";
$conn->set_charset("utf8mb4");
$con = mysqli_connect($server,$user,$password,$db);
if($con)
{
// echo "Connection Successful";
}else{
echo "No connection";
}

?>
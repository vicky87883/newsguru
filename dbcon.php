<?php

$server = "localhost";
$user = "vikram";
$password = "Parjapat@123";
$db = "coder";
$con = mysqli_connect($server,$user,$password,$db);
$con->set_charset("utf8mb4");
if($con)
{
// echo "Connection Successful";
}else{
echo "No connection";
}

?>
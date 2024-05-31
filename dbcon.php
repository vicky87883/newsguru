<?php

$server = "localhost";
$user = "vikram";
$password = "Parjapat@123";
$db = "coder";
mysqli_set_charset('utf8');
$con = mysqli_connect($server,$user,$password,$db);
if($con)
{
// echo "Connection Successful";
}else{
echo "No connection";
}

?>
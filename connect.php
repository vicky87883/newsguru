<?php
$con = mysqli_connect('localhost','vikram','Parjapat@123', 'coder');
if($con)
{
    echo "connection successful";
}
else{
    echo "No connection";
}    
mysqli_select_db($con, 'coder');

$firstname = $_POST['firstname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];

$query = "insert into newscontact (firstname,email,phone,message) values ('$firstname','$email','$phone','$message')";
mysqli_query($con,$query);
header("Location:https://www.newsguru.live/contact.php");
?>
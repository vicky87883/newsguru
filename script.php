<?php
$mysqli = new mysqli('localhost','vikram','Parjapat@123','coder');
if($mysqli->connect_errno !=0)
{
    echo $mysqli->connect_error;
    exit();
}
$start = 0;
// Setting the number of rows to display in a page
$rows_per_page = 9;
$records = $mysqli->query("SELECT * FROM `frontload`   ORDER BY `id` DESC");
$record2 = $mysqli->query("SELECT * FROM `topsection` ORDER BY `id` DESC");
$nr_of_rows = $records->num_rows;
// calculating of nr of pages
$pages = ceil($nr_of_rows / $rows_per_page);
// if the user clicks on the pagination buttons we set a new starting point.
if(isset($_GET['page-nr']))
{
    $page = $_GET['page-nr']-1;
    $start = $page * $rows_per_page;
}
$result = $mysqli->query("SELECT * FROM `frontload`   ORDER BY `id` DESC LIMIT $start,$rows_per_page");
?>
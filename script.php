<?php
$mysqli = new mysqli('localhost', 'vikram', 'Parjapat@123', 'coder');

// Check for connection error
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}

// Set the character set to utf8mb4
if (!$mysqli->set_charset("utf8mb4")) {
    echo "Error loading character set utf8mb4: " . $mysqli->error;
    exit();
}

$start = 0;
// Setting the number of rows to display on a page
$rows_per_page = 9;
$records = $mysqli->query("SELECT * FROM `frontload` ORDER BY `id` DESC");
$nr_of_rows = $records->num_rows;

// Calculating the number of pages
$pages = ceil($nr_of_rows / $rows_per_page);

// If the user clicks on the pagination buttons, set a new starting point
if (isset($_GET['page-nr'])) {
    $page = $_GET['page-nr'] - 1;
    $start = $page * $rows_per_page;
}

// Fetching the required rows from the database with a limit for pagination
$result = $mysqli->query("SELECT * FROM `frontload` ORDER BY `id` DESC LIMIT $start, $rows_per_page");
?>
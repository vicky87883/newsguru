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

// Setting the number of rows to display per page
$rows_per_page = 9;

// Determine the total number of rows
$result_total = $mysqli->query("SELECT COUNT(*) AS total FROM `frontload`");
$row_total = $result_total->fetch_assoc();
$nr_of_rows = $row_total['total'];

// Calculating the number of pages
$pages = ceil($nr_of_rows / $rows_per_page);

// Get the current page number from the URL, defaulting to 1 if not set
$page = isset($_GET['page-nr']) ? (int)$_GET['page-nr'] : 1;

// Calculate the starting row for the query
$start = ($page - 1) * $rows_per_page;

// Fetch the required rows from the database with a limit for pagination
$result = $mysqli->query("SELECT * FROM `frontload` ORDER BY `id` DESC LIMIT $start, $rows_per_page");

if ($result) {
    // Display the records
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row['id'] . " - Image: " . $row['image'] . " - Heading: " . $row['heading'] . " - Link: " . $row['link'] . "<br>";
    }
} else {
    echo "Error: " . $mysqli->error;
}

// Display pagination buttons
echo '<div style="margin-top: 20px;">';
for ($i = 1; $i <= $pages; $i++) {
    echo '<a href="?page-nr=' . $i . '" style="margin-right: 10px;">' . $i . '</a>';
}
echo '</div>';

$mysqli->close();
?>

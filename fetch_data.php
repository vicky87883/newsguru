<?php
require_once('dbcon.php');

// Determine which content to fetch based on the 'type' parameter
$type = $_GET['type'] ?? '';

if ($type === 'dontmiss') {
    $query = "SELECT * FROM `dontmiss` ORDER BY `id` DESC;";
} elseif ($type === 'toptrending') {
    $query = "SELECT * FROM `toptrending` ORDER BY `id` DESC;";
} elseif ($type === 'topsection') {
    $query = "SELECT * FROM `topsection` ORDER BY `id` DESC;";
} else {
    echo json_encode([]);
    exit();
}

$result = mysqli_query($con, $query);
$data = [];

while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

echo json_encode($data);
?>

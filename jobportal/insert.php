<?php
// insert.php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $job_title = $_POST["job_title"];
    $company = $_POST["company"];
    $location = $_POST["location"];
    $last_date_to_apply = $_POST["last_date_to_apply"];
    $more_info = $_POST["more_info"];

    $sql = "INSERT INTO job_alerts (job_title, company, location, last_date_to_apply, more_info)
    VALUES ('$job_title', '$company', '$location', '$last_date_to_apply', '$more_info')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<form method="POST" action="insert.php">
    <input type="text" name="job_title" placeholder="Job Title" required>
    <input type="text" name="company" placeholder="Company" required>
    <input type="text" name="location" placeholder="Location" required>
    <input type="date" name="last_date_to_apply" placeholder="Last Date to Apply" required>
    <input type="text" name="more_info" placeholder="More Info" required>
    <input type="submit" value="Insert">
</form>

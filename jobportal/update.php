<?php
// update.php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $job_title = $_POST["job_title"];
    $company = $_POST["company"];
    $location = $_POST["location"];
    $last_date_to_apply = $_POST["last_date_to_apply"];
    $more_info = $_POST["more_info"];

    $sql = "UPDATE job_alerts SET job_title='$job_title', company='$company', location='$location', last_date_to_apply='$last_date_to_apply', more_info='$more_info' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<form method="POST" action="update.php">
    <input type="number" name="id" placeholder="ID" required>
    <input type="text" name="job_title" placeholder="Job Title" required>
    <input type="text" name="company" placeholder="Company" required>
    <input type="text" name="location" placeholder="Location" required>
    <input type="date" name="last_date_to_apply" placeholder="Last Date to Apply" required>
    <input type="text" name="more_info" placeholder="More Info" required>
    <input type="submit" value="Update">
</form>

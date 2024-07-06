<?php
// retrieve.php
include 'db_connection.php';

$sql = "SELECT id, job_title, company, location, last_date_to_apply, more_info FROM job_alerts";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table class='styled-table'>";
    echo "<thead><tr><th>S.No</th><th>Job Title</th><th>Company</th><th>Location</th><th>Last Date to Apply</th><th>More Info</th></tr></thead>";
    echo "<tbody>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td data-label='S.No'>" . $row["id"]. "</td>";
        echo "<td data-label='Job Title'>" . $row["job_title"]. "</td>";
        echo "<td data-label='Company'>" . $row["company"]. "</td>";
        echo "<td data-label='Location'>" . $row["location"]. "</td>";
        echo "<td data-label='Last Date to Apply'>" . $row["last_date_to_apply"]. "</td>";
        echo "<td data-label='More Info'><a href='" . $row["more_info"] . "'><i class='fas fa-info-circle icon'></i> Details</a></td>";
        echo "</tr>";
    }
    echo "</tbody></table>";
} else {
    echo "0 results";
}
$conn->close();
?>

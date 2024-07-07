<?php
include 'db_connection.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $job_id = intval($_GET['id']);

    // Delete job from database
    $stmt = $conn->prepare("DELETE FROM job_alerts WHERE id = ?");
    $stmt->bind_param("i", $job_id);

    if ($stmt->execute()) {
        echo "Job deleted successfully.";
    } else {
        echo "Error deleting job: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Invalid job ID";
}

$conn->close();
?>

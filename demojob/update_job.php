<?php
include 'db_connection.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $job_id = intval($_GET['id']);

    // Fetch existing job details to populate the form
    $stmt = $conn->prepare("SELECT * FROM job_alerts WHERE id = ?");
    $stmt->bind_param("i", $job_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $job = $result->fetch_assoc();
    } else {
        echo "Job not found";
        exit;
    }

    $stmt->close();
} else {
    echo "Invalid job ID";
    exit;
}

// Handle form submission to update job details
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $job_title = $_POST['job_title'];
    $company = $_POST['company'];
    $posted_date = $_POST['posted_date'];
    $vacancies = $_POST['vacancies'];
    $qualification = $_POST['qualification'];
    $age_limit = $_POST['age_limit'];
    $pay_scale = $_POST['pay_scale'];
    $application_start_date = $_POST['application_start_date'];
    $application_end_date = $_POST['application_end_date'];
    $application_fee = $_POST['application_fee'];
    $how_to_apply = $_POST['how_to_apply'];
    $official_notification = $_POST['official_notification'];
    $apply_online = $_POST['apply_online'];
    $official_website = $_POST['official_website'];

    // Update job details in the database
    $stmt = $conn->prepare("UPDATE job_alerts SET job_title = ?, company = ?, posted_date = ?, vacancies = ?, qualification = ?, age_limit = ?, pay_scale = ?, application_start_date = ?, application_end_date = ?, application_fee = ?, how_to_apply = ?, official_notification = ?, apply_online = ?, official_website = ? WHERE id = ?");
    $stmt->bind_param("sssisissssssssi", $job_title, $company, $posted_date, $vacancies, $qualification, $age_limit, $pay_scale, $application_start_date, $application_end_date, $application_fee, $how_to_apply, $official_notification, $apply_online, $official_website, $job_id);

    if ($stmt->execute()) {
        echo "Job updated successfully.";
        // Redirect to the job details page or another appropriate page after updating
        header("Location: job_details.php?id=" . $job_id);
        exit;
    } else {
        echo "Error updating job: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Job</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
            line-height: 1.6;
            color: #333;
        }

        .container {
            max-width: 800px;
            margin: auto;
            padding: 20px;
            background: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin: 10px 0 5px;
            font-weight: bold;
        }

        input, textarea {
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 1em;
        }

        textarea {
            resize: vertical;
        }

        button {
            padding: 10px;
            background-color: #009879;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1em;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #007f67;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Update Job</h2>
        <form action="" method="POST">
            <label for="job_title">Job Title</label>
            <input type="text" id="job_title" name="job_title" value="<?php echo htmlspecialchars($job['job_title']); ?>" required>

            <label for="company">Company</label>
            <input type="text" id="company" name="company" value="<?php echo htmlspecialchars($job['company']); ?>" required>

            <label for="posted_date">Posted Date</label>
            <input type="date" id="posted_date" name="posted_date" value="<?php echo htmlspecialchars($job['posted_date']); ?>" required>

            <label for="vacancies">No. of Vacancies</label>
            <input type="number" id="vacancies" name="vacancies" value="<?php echo htmlspecialchars($job['vacancies']); ?>" required>

            <label for="qualification">Qualification</label>
            <input type="text" id="qualification" name="qualification" value="<?php echo htmlspecialchars($job['qualification']); ?>" required>

            <label for="age_limit">Age Limit</label>
            <input type="text" id="age_limit" name="age_limit" value="<?php echo htmlspecialchars($job['age_limit']); ?>" required>

            <label for="pay_scale">Pay Scale</label>
            <input type="text" id="pay_scale" name="pay_scale" value="<?php echo htmlspecialchars($job['pay_scale']); ?>">

            <label for="application_start_date">Application Start Date</label>
            <input type="date" id="application_start_date" name="application_start_date" value="<?php echo htmlspecialchars($job['application_start_date']); ?>" required>

            <label for="application_end_date">Application End Date</label>
            <input type="date" id="application_end_date" name="application_end_date" value="<?php echo htmlspecialchars($job['application_end_date']); ?>" required>

            <label for="application_fee">Application Fee</label>
            <input type="text" id="application_fee" name="application_fee" value="<?php echo htmlspecialchars($job['application_fee']); ?>" required>

            <label for="how_to_apply">How to Apply</label>
            <textarea id="how_to_apply" name="how_to_apply" required><?php echo htmlspecialchars($job['how_to_apply']); ?></textarea>

            <label for="official_notification">Official Notification URL</label>
            <input type="text" id="official_notification" name="official_notification" value="<?php echo htmlspecialchars($job['official_notification']); ?>">

            <label for="apply_online">Apply Online URL</label>
            <input type="text" id="apply_online" name="apply_online" value="<?php echo htmlspecialchars($job['apply_online']); ?>">

            <label for="official_website">Official Website URL</label>
            <input type="text" id="official_website" name="official_website" value="<?php echo htmlspecialchars($job['official_website']); ?>">

            <button type="submit">Update Job</button>
        </form>
    </div>
</body>
</html>

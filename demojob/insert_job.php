<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Fetch form data
    $job_title = $_POST['job_title'];
    $company = $_POST['company'];
    $location = $_POST['location'];
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

    // Insert into database
    $stmt = $conn->prepare("INSERT INTO job_alerts (job_title, company, location, posted_date, vacancies, qualification, age_limit, pay_scale, application_start_date, application_end_date, application_fee, how_to_apply, official_notification, apply_online, official_website) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssissssssssss", $job_title, $company, $location, $posted_date, $vacancies, $qualification, $age_limit, $pay_scale, $application_start_date, $application_end_date, $application_fee, $how_to_apply, $official_notification, $apply_online, $official_website);

    if ($stmt->execute()) {
        echo "New job inserted successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert New Job</title>
    <style>
        /* Include your previous CSS here */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: auto;
            padding: 20px;
            background: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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
            margin-top: 10px;
            font-weight: bold;
        }

        input[type="text"], input[type="date"], textarea {
            margin-top: 5px;
            padding: 10px;
            font-size: 1em;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            margin-top: 20px;
            padding: 10px;
            background-color: #009879;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
        }

        button:hover {
            background-color: #007b63;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Insert New Job</h2>
        <form method="POST" action="">
            <label for="job_title">Job Title</label>
            <input type="text" id="job_title" name="job_title" required>

            <label for="company">Company</label>
            <input type="text" id="company" name="company" required>

            <label for="location">Location</label>
            <input type="text" id="location" name="location">

            <label for="posted_date">Posted Date</label>
            <input type="date" id="posted_date" name="posted_date" required>

            <label for="vacancies">No. of Vacancies</label>
            <input type="text" id="vacancies" name="vacancies" required>

            <label for="qualification">Qualification</label>
            <textarea id="qualification" name="qualification" required></textarea>

            <label for="age_limit">Age Limit</label>
            <input type="text" id="age_limit" name="age_limit" required>

            <label for="pay_scale">Pay Scale</label>
            <input type="text" id="pay_scale" name="pay_scale">

            <label for="application_start_date">Application Start Date</label>
            <input type="date" id="application_start_date" name="application_start_date" required>

            <label for="application_end_date">Application End Date</label>
            <input type="date" id="application_end_date" name="application_end_date" required>

            <label for="application_fee">Application Fee</label>
            <input type="text" id="application_fee" name="application_fee" required>

            <label for="how_to_apply">How to Apply</label>
            <textarea id="how_to_apply" name="how_to_apply" required></textarea>

            <label for="official_notification">Official Notification URL</label>
            <input type="text" id="official_notification" name="official_notification">

            <label for="apply_online">Apply Online URL</label>
            <input type="text" id="apply_online" name="apply_online">

            <label for="official_website">Official Website URL</label>
            <input type="text" id="official_website" name="official_website">

            <button type="submit">Insert Job</button>
        </form>
    </div>
</body>
</html>

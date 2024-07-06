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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Job Alert</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            background: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h2 {
            text-align: center;
            color: #333;
            font-weight: 700;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        input[type="text"], input[type="date"], input[type="submit"] {
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1em;
        }

        input[type="submit"] {
            background-color: #009879;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #007f67;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Insert Job Alert</h2>
        <form method="POST" action="insert.php">
            <input type="text" name="job_title" placeholder="Job Title" required>
            <input type="text" name="company" placeholder="Company" required>
            <input type="text" name="location" placeholder="Location" required>
            <input type="date" name="last_date_to_apply" placeholder="Last Date to Apply" required>
            <input type="text" name="more_info" placeholder="More Info" required>
            <input type="submit" value="Insert">
        </form>
    </div>
</body>
</html>

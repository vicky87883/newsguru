<?php
// db_connection.php
$servername = "localhost";
$username = "vikram";
$password = "Parjapat@123";
$dbname = "coder";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<?php
// job_details.php
include 'db_connection.php';

$job_id = $_GET['id'];
$sql = "SELECT * FROM job_alerts WHERE id = $job_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $job = $result->fetch_assoc();
} else {
    echo "Job not found";
    exit;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Details - <?php echo $job['job_title']; ?></title>
    <style>
        /* Global Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
            line-height: 1.6;
            color: #333;
        }

        a {
            color: #009879;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        /* Header */
        .header {
            background-color: #009879;
            color: #fff;
            padding: 15px 20px;
            text-align: center;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .header .logo h1 {
            margin: 0;
        }

        /* Breadcrumb Navigation */
        .breadcrumb {
            padding: 10px 20px;
            background-color: #e0e0e0;
            margin-bottom: 20px;
            border-radius: 8px;
        }

        .breadcrumb a {
            color: #009879;
            font-weight: bold;
        }

        .breadcrumb span {
            color: #666;
        }

        /* Main Content */
        main {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background: white;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h2, h3 {
            color: #333;
        }

        .job-summary, .job-details, .application-info, .important-links {
            margin-bottom: 20px;
        }

        .job-summary h2 {
            margin-top: 0;
            font-size: 1.8em;
            border-bottom: 2px solid #009879;
            padding-bottom: 10px;
        }

        .job-summary p {
            margin: 5px 0;
        }

        /* Styled Table */
        .styled-table {
            width: 100%;
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 1em;
            font-family: 'Roboto', sans-serif;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
            border-radius: 8px;
            overflow: hidden;
        }

        .styled-table thead tr {
            background-color: #009879;
            color: #ffffff;
            text-align: left;
        }

        .styled-table th,
        .styled-table td {
            padding: 12px 15px;
        }

        .styled-table tbody tr {
            border-bottom: 1px solid #dddddd;
        }

        .styled-table tbody tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }

        .styled-table tbody tr:last-of-type {
            border-bottom: 2px solid #009879;
        }

        .styled-table tbody tr:hover {
            background-color: #f1f1f1;
        }

        /* Application and Important Links */
        .application-info, .important-links {
            padding: 20px;
            background: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 8px;
        }

        .application-info h3, .important-links h3 {
            border-bottom: 2px solid #009879;
            padding-bottom: 10px;
        }

        .application-info ul, .important-links ul {
            list-style-type: none;
            padding: 0;
        }

        .application-info li, .important-links li {
            margin: 10px 0;
        }

        /* Footer */
        .footer {
            text-align: center;
            padding: 20px 0;
            background-color: #009879;
            color: #fff;
            margin-top: 20px;
            border-radius: 8px;
            position: fixed;
            bottom: 0;
            width: calc(100% - 40px); /* 100% minus body padding */
            left: 20px; /* body padding */
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="logo">
            <h1>Job Alert</h1>
        </div>
    </header>
    <nav class="breadcrumb">
        <a href="index.html">Home</a> &gt;
        <a href="#">Latest Jobs</a> &gt;
        <span><?php echo $job['job_title']; ?></span>
    </nav>
    <main>
        <section class="job-summary">
            <h2><?php echo $job['job_title']; ?></h2>
            <p>Posted on: <?php echo date('d-M-Y', strtotime($job['posted_date'])); ?></p>
            <p>Organization: <?php echo $job['company']; ?></p>
        </section>
        <section class="job-details">
            <h3>Job Details</h3>
            <table class="styled-table">
                <thead>
                    <tr>
                        <th>Post Name</th>
                        <th>No. of Vacancies</th>
                        <th>Qualification</th>
                        <th>Age Limit</th>
                        <th>Pay Scale</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $job['job_title']; ?></td>
                        <td><?php echo $job['vacancies']; ?></td>
                        <td><?php echo $job['qualification']; ?></td>
                        <td><?php echo $job['age_limit']; ?></td>
                        <td><?php echo $job['pay_scale']; ?></td>
                    </tr>
                </tbody>
            </table>
        </section>
        <section class="application-info">
            <h3>Application Details</h3>
            <ul>
                <li><strong>Application Start Date:</strong> <?php echo date('d-M-Y', strtotime($job['application_start_date'])); ?></li>
                <li><strong>Application End Date:</strong> <?php echo date('d-M-Y', strtotime($job['application_end_date'])); ?></li>
                <li><strong>Application Fee:</strong> <?php echo $job['application_fee']; ?></li>
                <li><strong>How to Apply:</strong> <?php echo $job['how_to_apply']; ?></li>
            </ul>
        </section>
        <section class="important-links">
            <h3>Important Links</h3>
            <ul>
                <li><a href="<?php echo $job['official_notification']; ?>">Official Notification</a></li>
                <li><a href="<?php echo $job['apply_online']; ?>">Apply Online</a></li>
                <li><a href="<?php echo $job['official_website']; ?>">Official Website</a></li>
            </ul>
        </section>
    </main>
    <footer class="footer">
        <p>&copy; 2024 Job Alert. All rights reserved.</p>
    </footer>
</body>
</html>

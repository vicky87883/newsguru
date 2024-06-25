<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "coder";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the search query
$searchQuery = isset($_GET['query']) ? $_GET['query'] : '';

// Prepare and execute the SQL query
$sql = "SELECT heading, content, published_at FROM news WHERE heading LIKE ?";
$stmt = $conn->prepare($sql);
$searchTerm = '%' . $searchQuery . '%';
$stmt->bind_param('s', $searchTerm);
$stmt->execute();
$result = $stmt->get_result();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="results-container">
        <h2>Search Results for "<?php echo htmlspecialchars($searchQuery); ?>"</h2>
        <?php if ($result->num_rows > 0): ?>
            <ul class="results-list">
                <?php while ($row = $result->fetch_assoc()): ?>
                    <li class="result-item">
                        <h3><?php echo htmlspecialchars($row['heading']); ?></h3>
                        <p><?php echo htmlspecialchars($row['content']); ?></p>
                        <small>Published on: <?php echo htmlspecialchars($row['published_at']); ?></small>
                    </li>
                <?php endwhile; ?>
            </ul>
        <?php else: ?>
            <p>No results found.</p>
        <?php endif; ?>
    </div>
</body>
</html>

<?php
// Close connection
$conn->close();
?>

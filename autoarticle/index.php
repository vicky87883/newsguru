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

// Fetch the articles from the database
$sql = "SELECT id, heading, description FROM article";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="article-list">
        <h1>Article List</h1>
        <?php if ($result->num_rows > 0): ?>
            <ul>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <li class="article-item">
                        <a href="article.php?id=<?php echo $row['id']; ?>">
                            <h2><?php echo htmlspecialchars($row['heading']); ?></h2>
                        </a>
                        <p><?php echo htmlspecialchars(mb_strimwidth($row['description'], 0, 150, '...')); ?></p>
                    </li>
                <?php endwhile; ?>
            </ul>
        <?php else: ?>
            <p>No articles found.</p>
        <?php endif; ?>
    </div>
</body>
</html>

<?php
// Close connection
$conn->close();
?>

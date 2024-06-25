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

// Get the article ID from the URL
$articleId = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Fetch the article from the database
$sql = "SELECT heading, content FROM article WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $articleId);
$stmt->execute();
$result = $stmt->get_result();
$article = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($article['heading']); ?></title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="article-content">
        <?php if ($article): ?>
            <h1><?php echo htmlspecialchars($article['heading']); ?></h1>
            <p><?php echo nl2br(htmlspecialchars($article['content'])); ?></p>
        <?php else: ?>
            <p>Article not found.</p>
        <?php endif; ?>
    </div>
</body>
</html>

<?php
// Close connection
$conn->close();
?>

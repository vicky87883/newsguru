<?php
// Database connection details
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
$conn->set_charset("utf8");
// Get the article ID from the URL
$articleId = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Fetch the article from the database
$sql = "SELECT heading, content FROM article WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $articleId);
$stmt->execute();
$result = $stmt->get_result();
$article = $result->fetch_assoc();

// Fetch other articles for the sidebar
$sqlSidebar = "SELECT id, heading FROM article WHERE id != ?";
$stmtSidebar = $conn->prepare($sqlSidebar);
$stmtSidebar->bind_param('i', $articleId);
$stmtSidebar->execute();
$resultSidebar = $stmtSidebar->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($article['heading']); ?></title>
    <!-- <link rel="stylesheet" href="styles.css"> -->
    <style>
        /* Basic Reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f9;
    color: #333;
    display: flex;
    justify-content: center;
    align-items: start;
    padding: 20px;
}

/* Container */
.container {
    display: flex;
    max-width: 1200px;
    width: 100%;
    margin: auto;
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    overflow: hidden;
}

/* Sidebar */
.sidebar {
    width: 250px;
    background: #333;
    color: #fff;
    padding: 20px;
    overflow-y: auto;
    height: 100vh;
    position: sticky;
    top: 0;
}

.sidebar h2 {
    font-size: 24px;
    margin-bottom: 20px;
}

.sidebar ul {
    list-style: none;
}

.sidebar ul li {
    margin-bottom: 10px;
}

.sidebar ul li a {
    color: #fff;
    text-decoration: none;
    font-size: 18px;
}

.sidebar ul li a:hover {
    text-decoration: underline;
}

/* Main Content */
.article-content {
    flex: 1;
    padding: 20px;
    overflow-y: auto;
}

.article-content h1 {
    font-size: 32px;
    margin-bottom: 20px;
    color: #333;
}

.article-content p {
    font-size: 18px;
    line-height: 1.6;
}

/* Responsive Design */
@media (max-width: 768px) {
    .container {
        flex-direction: column;
    }

    .sidebar {
        width: 100%;
        height: auto;
        position: relative;
    }

    .article-content {
        padding: 10px;
    }
}

    </style>
</head>
<body>
    <div class="container">
        <aside class="sidebar">
            <h2>Other Articles</h2>
            <ul>
                <?php while ($row = $resultSidebar->fetch_assoc()): ?>
                    <li><a href="?id=<?php echo $row['id']; ?>"><?php echo htmlspecialchars($row['heading']); ?></a></li>
                <?php endwhile; ?>
            </ul>
        </aside>
        <main class="article-content">
            <?php if ($article): ?>
                <h1><?php echo htmlspecialchars($article['heading']); ?></h1>
                <p><?php echo nl2br(htmlspecialchars($article['content'])); ?></p>
            <?php else: ?>
                <p>Article not found.</p>
            <?php endif; ?>
        </main>
    </div>
</body>
</html>

<?php
// Close connection
$conn->close();
?>

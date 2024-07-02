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
$sql = "SELECT heading, content, image FROM article WHERE id = ?";
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
    <link rel="stylesheet" href="styles.css">
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6958761602872755"
     crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <aside class="sidebar">
            <div class="hamburger-menu" onclick="toggleSidebar()">☰</div>
            <h2>Other Articles</h2>
            <ul class="sidebar-links">
                <?php while ($row = $resultSidebar->fetch_assoc()): ?>
                    <li><a href="?id=<?php echo $row['id']; ?>"><?php echo htmlspecialchars($row['heading']); ?></a></li>
                <?php endwhile; ?>
            </ul>
        </aside>
        <main class="article-content">
            <?php if ($article): ?>
                <h1><?php echo htmlspecialchars($article['heading']); ?></h1>
                <p><?php echo (htmlspecialchars($article['time'])); ?></p>
                <?php if (!empty($article['image'])): // Check if image exists ?>
                    <img src="<?php echo htmlspecialchars($article['image']); ?>" alt="Article Image" width="100px" height="100px">
                <?php endif; ?>
                <p><?php echo (nl2br($article['content'])); ?></p>
            <?php else: ?>
                <p>Article not found.</p>
            <?php endif; ?>
        </main>
    </div>

    <!-- JavaScript to toggle sidebar visibility -->
    <script>
        function toggleSidebar() {
            const sidebarLinks = document.querySelector('.sidebar-links');
            sidebarLinks.classList.toggle('show');
        }
    </script>
</body>
</html>

<?php
// Close connection
$conn->close();
?>

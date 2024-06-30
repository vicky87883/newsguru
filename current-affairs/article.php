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
    <style>/* Basic Reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Helvetica Neue', Arial, sans-serif; /* Softer, modern font */
    background-color: #f0f4f8; /* Light background color */
    color: #333;
    display: flex;
    justify-content: center;
    align-items: flex-start;
    padding: 20px;
    min-height: 100vh;
}

/* Container */
.container {
    display: flex;
    max-width: 1200px;
    width: 100%;
    margin: auto;
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); /* Softer shadow */
    overflow: hidden;
    min-height: calc(100vh - 40px);
}

/* Sidebar */
.sidebar {
    width: 250px;
    background: #e1e9f1; /* Light blue-grey color */
    color: #555; /* Darker text color for contrast */
    padding: 20px;
    overflow-y: auto;
    position: sticky;
    top: 0;
    flex-shrink: 0;
    height: 100vh;
}

.sidebar h2 {
    font-size: 22px;
    margin-bottom: 20px;
    color: #007acc; /* Light blue for header text */
}

.sidebar ul {
    list-style: disc; /* Use bullet points for the list */
    padding-left: 20px; /* Indent list items */
}

.sidebar ul li {
    margin-bottom: 10px;
}

.sidebar ul li a {
    color: #007acc; /* Light blue for links */
    text-decoration: none;
    font-size: 18px;
    display: block;
    padding: 10px 15px;
    border-radius: 6px;
    transition: background 0.3s, color 0.3s;
}

.sidebar ul li a:hover {
    background: #d1e4f1; /* Light hover background color */
    color: #005f99; /* Slightly darker blue on hover */
}

/* Main Content */
.article-content {
    flex: 1;
    padding: 20px;
    overflow-y: auto;
}

.article-content h1 {
    font-size: 28px; /* Slightly smaller font size for a softer look */
    margin-bottom: 20px;
    color: #007acc; /* Light blue for main heading */
}

.article-content h2, .article-content h3, .article-content h4, .article-content h5, .article-content h6 {
    color: #005f99; /* Use a consistent color for sub-headings */
    margin-top: 20px;
    margin-bottom: 10px;
}

.article-content p {
    font-size: 18px;
    line-height: 1.6;
    color: #555; /* Softer text color */
}

.article-content ul {
    list-style: disc; /* Use bullet points in main content as well */
    margin-left: 20px; /* Indent list items */
}

.article-content ul li {
    margin-bottom: 10px; /* Space between list items */
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
st
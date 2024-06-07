<?php
// Database connection parameters
$host = 'localhost';
$dbname = 'coder';
$username = 'vikram';
$password = 'Parjapat@123';

try {
    // Create a new PDO instance and connect to the database
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Query to fetch the latest articles
    $stmt = $pdo->query('SELECT title, link, publication_date, description FROM articles ORDER BY publication_date DESC LIMIT 10');

    // Start the RSS feed output
    header('Content-Type: application/rss+xml; charset=utf-8');
    echo '<?xml version="1.0" encoding="UTF-8"?>';
    echo '<rss version="2.0">';
    echo '<channel>';
    echo '<title>Newsguru Live Updates</title>';
    echo '<link>https://newsguru.live</link>';
    echo '<description>Latest updates and news from Newsguru Live.</description>';
    echo '<language>en-us</language>';

    // Fetch and display each article
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo '<item>';
        echo '<title>' . htmlspecialchars($row['title']) . '</title>';
        echo '<link>' . htmlspecialchars($row['link']) . '</link>';
        echo '<pubDate>' . date(DATE_RSS, strtotime($row['publication_date'])) . '</pubDate>';
        echo '<description>' . htmlspecialchars($row['description']) . '</description>';
        echo '</item>';
    }

    // End the RSS feed
    echo '</channel>';
    echo '</rss>';

} catch (PDOException $e) {
    echo 'Database error: ' . $e->getMessage();
}
?>

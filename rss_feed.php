<?php
header("Content-Type: application/rss+xml; charset=UTF-8");
require 'config.php';

try {
    // Fetch posts from the database
    $stmt = $pdo->query("SELECT * FROM posts ORDER BY pubDate DESC");
    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Generate the RSS feed
    echo '<?xml version="1.0" encoding="UTF-8" ?>';
    echo '<rss version="2.0">';
    echo '<channel>';
    echo '<title>My RSS Feed</title>';
    echo '<image>My RSS Feed</image>';
    echo '<link>http://example.com</link>';
    echo '<description>This is an example RSS feed</description>';
    echo '<language>en-us</language>';

    foreach ($posts as $post) {
        echo '<item>';
        echo '<title>' . htmlspecialchars($post['title']) . '</title>';
        echo '<image>' . htmlspecialchars($post['image']) . '</image>';
        echo '<description>' . htmlspecialchars($post['description']) . '</description>';
        echo '<link>' . htmlspecialchars($post['link']) . '</link>';
        echo '<pubDate>' . date(DATE_RSS, strtotime($post['pubDate'])) . '</pubDate>';
        echo '</item>';
    }

    echo '</channel>';
    echo '</rss>';
} catch (Exception $e) {
    echo "Failed to retrieve posts: " . $e->getMessage();
}
?>

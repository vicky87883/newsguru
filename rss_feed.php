<?php
header("Content-Type: application/rss+xml; charset=UTF-8");
require 'config.php';

try {
    // Fetch posts from the database with prepared statement to secure the query
    $stmt = $pdo->prepare("SELECT title, description, link, pubDate, image FROM posts ORDER BY pubDate DESC");
    $stmt->execute();
    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Generate the RSS feed
    echo '<?xml version="1.0" encoding="UTF-8" ?>';
    echo '<rss version="2.0">';
    echo '<channel>';
    echo '<title><![CDATA[My RSS Feed]]></title>';
    echo '<link>http://example.com</link>';
    echo '<description><![CDATA[This is an example RSS feed with styled content]]></description>';
    echo '<language>en-us</language>';
    echo '<image>';
    echo '<url>http://example.com/path/to/image.jpg</url>'; // Replace with the actual image URL
    echo '<title><![CDATA[My RSS Feed Image]]></title>';
    echo '<link>http://example.com</link>';
    echo '</image>';

    // Define inline CSS for styling within the feed
    $css = "
        <style type='text/css'>
            .rss-item { border-bottom: 1px solid #ccc; padding: 10px; margin-bottom: 10px; }
            .rss-title { font-size: 18px; font-weight: bold; margin-bottom: 5px; }
            .rss-image { margin-bottom: 10px; }
            .rss-description { font-size: 14px; color: #555; }
            .rss-date { font-size: 12px; color: #999; margin-top: 10px; }
        </style>
    ";

    echo $css;

    foreach ($posts as $post) {
        // Sanitize output using htmlspecialchars
        $title = htmlspecialchars($post['title']);
        $description = htmlspecialchars($post['description']);
        $link = htmlspecialchars($post['link']);
        $pubDate = date(DATE_RSS, strtotime($post['pubDate']));
        $image = htmlspecialchars($post['image']);

        echo '<item>';
        echo '<title><![CDATA[' . $title . ']]></title>';

        // Create a styled description with HTML and inline CSS
        $descriptionContent = "
            <div class='rss-item'>
                <div class='rss-title'>" . $title . "</div>";

        if (!empty($image)) {
            $descriptionContent .= "<div class='rss-image'><img src='" . $image . "' alt='" . $title . "' style='max-width: 100%; height: auto;' /></div>";
        }

        $descriptionContent .= "
                <div class='rss-description'>" . $description . "</div>
                <div class='rss-date'>" . date("F j, Y, g:i a", strtotime($post['pubDate'])) . "</div>
            </div>
        ";

        echo '<description><![CDATA[' . $descriptionContent . ']]></description>';
        echo '<link>' . $link . '</link>';
        echo '<pubDate>' . $pubDate . '</pubDate>';

        // Optionally include GUID, which is a unique identifier for the item
        echo '<guid isPermaLink="false">' . sha1($link) . '</guid>';

        // Optionally include author if available
        if (!empty($post['author'])) {
            echo '<author><![CDATA[' . htmlspecialchars($post['author']) . ']]></author>';
        }

        // Optionally include categories if available
        if (!empty($post['categories'])) {
            $categories = explode(',', $post['categories']);
            foreach ($categories as $category) {
                echo '<category><![CDATA[' . htmlspecialchars(trim($category)) . ']]></category>';
            }
        }

        echo '</item>';
    }

    echo '</channel>';
    echo '</rss>';
} catch (Exception $e) {
    // Log the error to a file instead of displaying it
    error_log("RSS Feed Error: " . $e->getMessage());
    // Optionally, you could send an error message or a simple fallback RSS feed
    echo '<?xml version="1.0" encoding="UTF-8" ?>';
    echo '<rss version="2.0">';
    echo '<channel>';
    echo '<title>My RSS Feed - Error</title>';
    echo '<description>An error occurred while generating the RSS feed. Please try again later.</description>';
    echo '</channel>';
    echo '</rss>';
}
?>

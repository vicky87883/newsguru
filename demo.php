<?php
// Configuration for connecting to the database
require 'config.php';

// Function to fetch news items
function fetchNews($pdo, $limit = 5, $offset = 0) {
    $stmt = $pdo->prepare("SELECT * FROM frontload ORDER BY id DESC LIMIT :limit OFFSET :offset");
    $stmt->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $stmt->bindValue(':offset', (int) $offset, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Handle update request if any
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_id'])) {
    $updateId = $_POST['update_id'];
    $tag = $_POST['tag'];
    $heading = $_POST['heading'];
    $text = $_POST['text'];
    $name = $_POST['name'];
    $readtime = $_POST['readtime'];
    $link = $_POST['link'];
    
    try {
        $stmt = $pdo->prepare("UPDATE frontload SET tag = :tag, heading = :heading, text = :text, name = :name, readtime = :readtime, link = :link WHERE id = :id");
        $stmt->execute([
            ':tag' => $tag,
            ':heading' => $heading,
            ':text' => $text,
            ':name' => $name,
            ':readtime' => $readtime,
            ':link' => $link,
            ':id' => $updateId
        ]);
        $updateMessage = "News item updated successfully!";
    } catch (Exception $e) {
        $updateMessage = "Error updating news item: " . $e->getMessage();
    }
}

// Initial fetch of news items
$newsItems = fetchNews($pdo);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latest News Items</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .news-item {
            border: 1px solid #ccc;
            padding: 15px;
            margin-bottom: 10px;
            border-radius: 4px;
        }
        .news-item img {
            max-width: 100%;
            height: auto;
            border-radius: 4px;
            margin-bottom: 10px;
        }
        .load-more {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            text-align: center;
            cursor: pointer;
        }
        .load-more:hover {
            background-color: #0056b3;
        }
        .update-form {
            margin-top: 20px;
        }
        .update-form label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }
        .update-form input, .update-form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .update-form button {
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .update-form button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <h1>Latest News</h1>
    <?php if (isset($updateMessage)): ?>
        <p><?php echo $updateMessage; ?></p>
    <?php endif; ?>
    <div id="newsContainer">
        <?php foreach ($newsItems as $item): ?>
            <div class="news-item">
                <img src="<?php echo htmlspecialchars($item['image']); ?>" alt="News Image">
                <h3><?php echo htmlspecialchars($item['heading']); ?></h3>
                <p><?php echo htmlspecialchars($item['text']); ?></p>
                <p><strong>Tag:</strong> <?php echo htmlspecialchars($item['tag']); ?></p>
                <p><strong>By:</strong> <?php echo htmlspecialchars($item['name']); ?> | <strong>Published:</strong> <?php echo htmlspecialchars($item['time']); ?> | <strong>Read Time:</strong> <?php echo htmlspecialchars($item['readtime']); ?></p>
                <a href="<?php echo htmlspecialchars($item['link']); ?>" target="_blank">Read more</a>
                <button onclick="populateUpdateForm(<?php echo htmlspecialchars(json_encode($item)); ?>)">Update</button>
            </div>
        <?php endforeach; ?>
    </div>
    <button id="loadMoreBtn" class="load-more">Load More</button>

    <!-- Update Form -->
    <div class="update-form">
        <h2>Update News Item</h2>
        <form id="updateForm" method="POST">
            <input type="hidden" id="updateId" name="update_id">
            <label for="updateTag">Tag:</label>
            <input type="text" id="updateTag" name="tag" required>
            <label for="updateHeading">Heading:</label>
            <input type="text" id="updateHeading" name="heading" required>
            <label for="updateText">Description:</label>
            <textarea id="updateText" name="text" required></textarea>
            <label for="updateName">Name:</label>
            <input type="text" id="updateName" name="name" required>
            <label for="updateReadtime">Read Time:</label>
            <input type="text" id="updateReadtime" name="readtime" required>
            <label for="updateLink">Link:</label>
            <input type="url" id="updateLink" name="link" required>
            <button type="submit">Update</button>
        </form>
    </div>

    <script>
        let currentPage = 1;
        const loadMoreBtn = document.getElementById('loadMoreBtn');

        loadMoreBtn.addEventListener('click', () => {
            currentPage++;
            fetch(`https://www.newsguru.live/api.php?page=${currentPage}`)
                .then(response => response.json())
                .then(data => {
                    const newsContainer = document.getElementById('newsContainer');
                    data.forEach(item => {
                        const newsItem = document.createElement('div');
                        newsItem.classList.add('news-item');
                        newsItem.innerHTML = `
                            <img src="${item.image}" alt="News Image">
                            <h3>${item.heading}</h3>
                            <p>${item.text}</p>
                            <p><strong>Tag:</strong> ${item.tag}</p>
                            <p><strong>By:</strong> ${item.name} | <strong>Published:</strong> ${item.time} | <strong>Read Time:</strong> ${item.readtime}</p>
                            <a href="${item.link}" target="_blank">Read more</a>
                            <button onclick="populateUpdateForm(${JSON.stringify(item)})">Update</button>
                        `;
                        newsContainer.appendChild(newsItem);
                    });
                })
                .catch(error => console.error('Error loading news:', error));
        });

        function populateUpdateForm(item) {
            document.getElementById('updateId').value = item.id;
            document.getElementById('updateTag').value = item.tag;
            document.getElementById('updateHeading').value = item.heading;
            document.getElementById('updateText').value = item.text;
            document.getElementById('updateName').value = item.name;
            document.getElementById('updateReadtime').value = item.readtime;
            document.getElementById('updateLink').value = item.link;
        }
    </script>
</body>
</html>

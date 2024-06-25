<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search News</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="search-container">
        <form action="search.php" method="GET">
            <input type="text" name="query" placeholder="Search news by heading..." required>
            <button type="submit">Search</button>
        </form>
    </div>
</body>
</html>

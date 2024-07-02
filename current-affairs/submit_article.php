<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit New Article</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="form-container">
        <h1>Submit New Article</h1>
        <form id="articleForm" enctype="multipart/form-data">
            <label for="heading">Heading:</label>
            <input type="text" id="heading" name="heading" required>

            <label for="content">Content:</label>
            <textarea id="content" name="content" required></textarea>

            <label for="image">Image:</label>
            <input type="file" id="image" name="image" accept="image/*">

            <button type="submit">Submit</button>
        </form>
        <div id="response"></div>
    </div>

    <script>
    document.getElementById('articleForm').addEventListener('submit', function(event) {
        event.preventDefault();

        var formData = new FormData(this);

        fetch('api.php', {
            method: 'POST',
            body: formData
        })
        .then(response => {
            console.log('Response:', response);
            return response.json(); // This line might throw an error if the response is not valid JSON
        })
        .then(data => {
            console.log('Data:', data);
            document.getElementById('response').innerHTML = 
                data.success ? `Article created with ID: ${data.id}` : `Error: ${data.error}`;
        })
        .catch(error => {
            console.error('Error:', error);
            document.getElementById('response').innerHTML = `Error: ${error.message}`;
        });
    });
</script>

</body>
</html>

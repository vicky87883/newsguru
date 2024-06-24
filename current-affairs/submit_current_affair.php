<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Latest Current Affairs</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        form {
            max-width: 500px;
            margin: auto;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }
        input, textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #218838;
        }
        .response-message {
            margin-top: 20px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Submit Latest News</h1>
    <form id="rssForm" enctype="multipart/form-data">
    <label for="image">File (Image or PDF):</label>
    <input type="file" id="image" name="image" accept=".jpg,.jpeg,.png,.gif,.webp,.pdf,.JPG,.JPEG,.PNG,.GIF,.WEBP" required>
        <label for="heading">Heading:</label>
        <input type="text" id="heading" name="heading" required>
<label for="text">Description:</label>
        <input type="text" id="text" name="text" required>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <label for="readtime">ReadTime:</label>
        <input type="text" id="readtime" name="readtime" required>
        <label for="link">Link:</label>
        <input type="url" id="link" name="link" required>
       

        <button type="submit">Submit</button>
    </form>

    <div class="response-message" id="responseMessage"></div>

    <script>
        document.getElementById('rssForm').addEventListener('submit', function(event) {
            event.preventDefault();

            const formData = new FormData(this);

            fetch('https://www.newsguru.live/current-affairs/newsapi.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                const responseMessage = document.getElementById('responseMessage');
                if (data.message) {
                    responseMessage.innerHTML = 'Success: ' + data.message;
                    responseMessage.style.color = 'green';
                } else {
                    responseMessage.innerHTML = 'Error: ' + data.error;
                    responseMessage.style.color = 'red';
                }
            })
            .catch(error => {
                const responseMessage = document.getElementById('responseMessage');
                responseMessage.innerHTML = 'Error: ' + error.message;
                responseMessage.style.color = 'red';
            });
        });
    </script>
</body>
</html>

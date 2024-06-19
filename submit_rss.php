<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit RSS Feed Item</title>
    <style>
        /* Add your styles here */
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
    <h1>Submit a New RSS Feed Item</h1>
    <form id="rssForm" enctype="multipart/form-data">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required>

        <label for="description">Description:</label>
        <textarea id="description" name="description" rows="4" required></textarea>

        <label for="link">Link:</label>
        <input type="url" id="link" name="link" required>

        <label for="image">Image:</label>
        <input type="file" id="image" name="image" accept="image/*" required>

        <button type="submit">Submit</button>
    </form>

    <div class="response-message" id="responseMessage"></div>

    <script>
        document.getElementById('rssForm').addEventListener('submit', function(event) {
            event.preventDefault();

            const formData = new FormData(this);

            fetch('https://www.newsguru.live/api.php', {
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

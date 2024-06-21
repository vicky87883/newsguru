<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
            box-sizing: border-box;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 5px;
            color: #555;
        }
        input[type="text"], input[type="file"] {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 100%;
            box-sizing: border-box;
        }
        input[type="submit"] {
            padding: 10px;
            border: none;
            border-radius: 4px;
            background-color: #28a745;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #218838;
        }
        .message {
            margin-top: 15px;
            text-align: center;
            color: #555;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Upload Image</h2>
        <form action="https://www.newsguru.live/frontpost_api.phpe" method="post" enctype="multipart/form-data">
            <label for="heading">Heading:</label>
            <input type="text" name="heading" id="heading" required>

            <label for="link">Link:</label>
            <input type="text" name="link" id="link" required>

            <label for="image">Upload Image:</label>
            <input type="file" name="image" id="image" required>

            <input type="submit" value="Upload">
        </form>
        <div class="message">
            <!-- This will display messages after form submission, if needed -->
        </div>
    </div>
</body>
</html>

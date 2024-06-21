<!DOCTYPE html>
<html>
<head>
    <title>Job Portal</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 20px;
        }
        h1 {
            color: #333;
        }
        form {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        label {
            font-weight: bold;
            display: block;
            margin-bottom: 8px;
        }
        input[type="text"],
        textarea,
        input[type="file"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }
        textarea {
            height: 120px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Post a Job</h1>
    <form action="frontpost_api.php" method="post" enctype="multipart/form-data">
        <label for="image">Image:</label><br>
        <input type="file" id="image" name="image"><br><br>
        <label for="heading">Heading:</label><br>
        <input type="text" id="heading" name="heading"><br><br>
        <label for="link">Link:</label><br>
        <input type="text" id="link" name="link"><br><br>
        <input type="submit" value="Post Job">
    </form>
</body>
</html>

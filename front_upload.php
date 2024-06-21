<!DOCTYPE html>
<html>
<head>
    <title>Upload Form</title>
</head>
<body>
    <form action="http://yourserver.com/upload.php" method="post" enctype="multipart/form-data">
        <label for="heading">Heading:</label>
        <input type="text" name="heading" id="heading" required><br><br>
        <label for="link">Link:</label>
        <input type="text" name="link" id="link" required><br><br>
        <label for="image">Upload Image:</label>
        <input type="file" name="image" id="image" required><br><br>
        <input type="submit" value="Upload">
    </form>
</body>
</html>

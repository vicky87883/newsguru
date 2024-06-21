<?php
$servername = "localhost";
$username = "vikram";
$password = "Parjapat@123";
$dbname = "coder";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

header('Content-Type: application/json');

// Handle GET request
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $sql = "SELECT * FROM topsection";
    $result = $conn->query($sql);

    $jobs = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $jobs[] = $row;
        }
    }
    echo json_encode($jobs);
}

// Handle POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $heading = $_POST['heading'];
    $link = $_POST['link'];

    // File upload handling
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["image"]["size"] > 500000) {
        echo json_encode(["error" => "Sorry, your file is too large."]);
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo json_encode(["error" => "Sorry, only JPG, JPEG, PNG & GIF files are allowed."]);
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo json_encode(["error" => "Sorry, your file was not uploaded."]);
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            $image = $targetFile; // Store the path to the uploaded image in the database

            // Insert data into database
            $sql = "INSERT INTO topsection (image, heading, link) VALUES ('$image', '$heading','$link')";
            if ($conn->query($sql) === TRUE) {
                echo json_encode(["message" => "New record created successfully"]);
            } else {
                echo json_encode(["error" => "Error: " . $sql . "<br>" . $conn->error]);
            }
        } else {
            echo json_encode(["error" => "Sorry, there was an error uploading your file."]);
        }
    }
}

$conn->close();
?>

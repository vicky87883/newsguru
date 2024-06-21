<?php
$servername = "localhost";
$username = "vikram";  // Change this to your MySQL username
$password = "Parjapat@123";      // Change this to your MySQL password
$dbname = "coder";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if file is uploaded
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $target_dir = "uploads/"; // Directory to save uploaded files
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        
        // Check if the image file is a real image or fake image
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false) {
            // Move uploaded file to target directory
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                $heading = $_POST['heading'];
                $link = $_POST['link'];
                $image_path = $target_file;

                // Prepare SQL statement to insert data
                $stmt = $conn->prepare("INSERT INTO topsection (heading, link, image_path) VALUES (?, ?, ?)");
                $stmt->bind_param("sss", $heading, $link, $image_path);

                if ($stmt->execute()) {
                    echo json_encode(["message" => "Record successfully added"]);
                } else {
                    echo json_encode(["message" => "Error adding record: " . $stmt->error]);
                }

                $stmt->close();
            } else {
                echo json_encode(["message" => "Sorry, there was an error uploading your file."]);
            }
        } else {
            echo json_encode(["message" => "File is not an image."]);
        }
    } else {
        echo json_encode(["message" => "No file uploaded or there was an upload error."]);
    }
} else {
    echo json_encode(["message" => "Invalid request method."]);
}

$conn->close();
?>

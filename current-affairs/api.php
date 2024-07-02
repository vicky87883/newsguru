<?php
header("Content-Type: application/json");

// Database connection details
$servername = "localhost";
$username = "vikram";
$password = "Parjapat@123";
$dbname = "coder";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die(json_encode(["error" => "Connection failed: " . $conn->connect_error]));
}

// Determine the request method
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        // Handle GET request
        if (isset($_GET['id'])) {
            $articleId = intval($_GET['id']);
            $sql = "SELECT id, heading, content, image FROM article WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('i', $articleId);
            $stmt->execute();
            $result = $stmt->get_result();
            $article = $result->fetch_assoc();

            echo json_encode($article ? $article : ["error" => "Article not found"]);
        } else {
            $sql = "SELECT id, heading, content, image FROM article";
            $result = $conn->query($sql);

            $articles = [];
            while ($row = $result->fetch_assoc()) {
                $articles[] = $row;
            }

            echo json_encode($articles);
        }
        break;

    case 'POST':
        // Handle POST request
        $heading = $_POST['heading'] ?? '';
        $content = $_POST['content'] ?? '';

        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $imageTmpPath = $_FILES['image']['tmp_name'];
            $imageName = basename($_FILES['image']['name']);
            $uploadDir = 'uploads/';
            $imagePath = $uploadDir . $imageName;

            if (move_uploaded_file($imageTmpPath, $imagePath)) {
                $sql = "INSERT INTO article (heading, content, image) VALUES (?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param('sss', $heading, $content, $imagePath);

                if ($stmt->execute()) {
                    echo json_encode(["success" => true, "id" => $stmt->insert_id]);
                } else {
                    echo json_encode(["error" => "Database insert failed: " . $conn->error]);
                }
            } else {
                echo json_encode(["error" => "Failed to upload image"]);
            }
        } else {
            echo json_encode(["error" => "No image uploaded or upload error"]);
        }
        break;

    default:
        echo json_encode(["error" => "Invalid request method"]);
        break;
}

$conn->close();
?>

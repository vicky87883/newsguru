<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

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
    echo json_encode(["error" => "Connection failed: " . $conn->connect_error]);
    exit;
}

// Initialize response array
$response = [];

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

            $response = $article ? $article : ["error" => "Article not found"];
        } else {
            $sql = "SELECT id, heading, content, image FROM article";
            $result = $conn->query($sql);

            $articles = [];
            while ($row = $result->fetch_assoc()) {
                $articles[] = $row;
            }

            $response = $articles;
        }
        break;

    case 'POST':
        // Handle POST request
        $heading = $_POST['heading'] ?? '';
        $content = $_POST['content'] ?? '';

        // Log inputs for debugging
        error_log("Heading: " . $heading);
        error_log("Content: " . $content);

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
                    $response = ["success" => true, "id" => $stmt->insert_id];
                } else {
                    $response = ["error" => "Database insert failed: " . $conn->error];
                }
            } else {
                $response = ["error" => "Failed to upload image"];
            }
        } else {
            $response = ["error" => "No image uploaded or upload error"];
        }
        break;

    default:
        $response = ["error" => "Invalid request method"];
        break;
}

// Output JSON response
echo json_encode($response);

$conn->close();
?>

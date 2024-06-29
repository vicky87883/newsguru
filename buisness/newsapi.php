<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json; charset=UTF-8");

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Handle OPTIONS request (CORS preflight)
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    http_response_code(200);
    exit();
}

// Include database configuration
require 'config.php';

// Initialize response array
$response = array();

try {
    // Determine the request method and call the corresponding function
    $method = $_SERVER['REQUEST_METHOD'];
    switch ($method) {
        case 'GET':
            handleGetRequest($pdo);
            break;
        case 'POST':
            handlePostRequest($pdo);
            break;
        default:
            http_response_code(405);
            echo json_encode(["message" => "Method Not Allowed"]);
            break;
    }
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(["message" => "Internal Server Error", "error" => $e->getMessage()]);
}

// Function to handle GET requests
function handleGetRequest($pdo) {
    try {
        $stmt = $pdo->query("SELECT * FROM buisness ORDER BY pubDate DESC");
        $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($posts);
    } catch (Exception $e) {
        http_response_code(500);
        echo json_encode(["message" => "Failed to retrieve posts", "error" => $e->getMessage()]);
    }
}

// Function to handle POST requests
function handlePostRequest($pdo) {
    if (isset($_FILES['image']) && isset($_POST['tag']) && isset($_POST['heading']) && isset($_POST['text']) && isset($_POST['name']) &&  isset($_POST['readtime']) && isset($_POST['link'])) {
        $image = $_FILES['image'];
        $tag = $_POST['tag'];
        $heading = $_POST['heading'];
        $text = $_POST['text'];
        $name = $_POST['name'];
        $readtime = $_POST['readtime'];
        $link = $_POST['link'];

        // Define the target directory for uploaded files
        $targetDir = "uploads/";
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

        // Generate a unique file name to avoid overwriting existing files
        $targetFile = $targetDir . basename($image["name"]);
        $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Debugging: Log the file type
        error_log("Uploaded file type: " . $fileType);

        // Valid file types
        $validFileTypes = ['jpg', 'jpeg', 'png', 'gif', 'webp', 'pdf'];

        // Check file type
        if (in_array($fileType, $validFileTypes)) {
            if (move_uploaded_file($image["tmp_name"], $targetFile)) {
                // File uploaded successfully, save the post data with file path in the database
                try {
                    $stmt = $pdo->prepare("INSERT INTO buisness (image, tag, heading, text, name, time, readtime, link) VALUES (:image, :tag, :heading, :text, :name, NOW(), :readtime, :link)");
                    $stmt->execute([
                        'image' => $targetFile, // Save the file path, not just the file name
                        'tag' => $tag,
                        'heading' => $heading,
                        'text' => $text,
                        'name' => $name,
                        'readtime' => $readtime,
                        'link' => $link
                    ]);
                    $newPostId = $pdo->lastInsertId();
                    echo json_encode(["message" => "Post added successfully", "post_id" => $newPostId]);
                } catch (Exception $e) {
                    http_response_code(500);
                    echo json_encode(["message" => "Failed to add post", "error" => $e->getMessage()]);
                }
            } else {
                http_response_code(500);
                echo json_encode(["message" => "Failed to upload file"]);
            }
        } else {
            http_response_code(400);
            echo json_encode(["message" => "Invalid file type"]);
        }
    } else {
        http_response_code(400);
        echo json_encode(["message" => "Invalid input"]);
    }
}

<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");

error_reporting(E_ALL);
ini_set('display_errors', 1);

$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'OPTIONS') {
    http_response_code(200);
    exit();
}

require 'config.php';

try {
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
        $stmt = $pdo->query("SELECT * FROM posts ORDER BY pubDate DESC");
        $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($posts);
    } catch (Exception $e) {
        http_response_code(500);
        echo json_encode(["message" => "Failed to retrieve posts", "error" => $e->getMessage()]);
    }
}

// Function to handle POST requests
function handlePostRequest($pdo) {
    if (isset($_POST['title'], $_POST['description'], $_POST['link'], $_FILES['image'])) {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $link = $_POST['link'];
        $image = $_FILES['image'];

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
                    $stmt = $pdo->prepare("INSERT INTO posts (title, description, link, image, pubDate) VALUES (:title, :description, :link, :image, NOW())");
                    $stmt->execute([
                        'title' => $title,
                        'description' => $description,
                        'link' => $link,
                        'image' => $targetFile // Store the file path
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

<?php
header("Content-Type: application/json");
require 'config.php';  // Include the database connection file

// Check the request method
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        handleGetRequest($pdo);
        break;

    case 'POST':
        $input = json_decode(file_get_contents('php://input'), true);
        handlePostRequest($input, $pdo);
        break;

    default:
        http_response_code(405);
        echo json_encode(["message" => "Method Not Allowed"]);
        break;
}

// Function to handle GET requests
function handleGetRequest($pdo) {
    try {
        $stmt = $pdo->query("SELECT * FROM api");
        $api = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($api);
    } catch (Exception $e) {
        http_response_code(500);
        echo json_encode(["message" => "Failed to retrieve api", "error" => $e->getMessage()]);
    }
}

// Function to handle POST requests
function handlePostRequest($input, $pdo) {
    if (isset($input['name']) && isset($input['email'])) {
        try {
            $stmt = $pdo->prepare("INSERT INTO api (name, email) VALUES (:name, :email)");
            $stmt->execute(['name' => $input['name'], 'email' => $input['email']]);
            $newUserId = $pdo->lastInsertId();
            echo json_encode(["message" => "User added successfully", "user_id" => $newUserId]);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(["message" => "Failed to add user", "error" => $e->getMessage()]);
        }
    } else {
        http_response_code(400);
        echo json_encode(["message" => "Invalid input"]);
    }
}
?>

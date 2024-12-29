<?php
// Database connection
$host = "localhost";
$user = "root";
$password = "";
$dbname = "bfdb"; // Your database name

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = intval($_POST['user_id']);
    $product_name = $_POST['product_name'];
    $price = floatval($_POST['price']);
    $image = $_POST['image'];
    $quantity = intval($_POST['quantity']);

    $sql = "INSERT INTO cart_details (user_id, product_name, price, image, quantity) 
            VALUES (?, ?, ?, ?, ?) 
            ON DUPLICATE KEY UPDATE quantity = quantity + ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isdsii", $user_id, $product_name, $price, $image, $quantity, $quantity);

    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "Item added to cart!"]);
    } else {
        echo json_encode(["status" => "error", "message" => $stmt->error]);
    }

    $stmt->close();
}
$conn->close();
?>

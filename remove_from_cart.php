<?php
// Database connection
$host = "localhost";
$user = "root";
$password = "";
$dbname = "bfdb";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = intval($_POST['user_id']);
    $product_name = $_POST['product_name'];

    $sql = "DELETE FROM cart_details WHERE user_id = ? AND product_name = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("is", $user_id, $product_name);

    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "Item removed from cart!"]);
    } else {
        echo json_encode(["status" => "error", "message" => $stmt->error]);
    }

    $stmt->close();
}
$conn->close();
?>

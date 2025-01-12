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

        $user_id = $_POST['user_id'];
        $product_id = $_POST['product_id'];
        $action = $_POST['action'] ?? null;
        $quantity = $_POST['quantity'] ?? null;

        if ($action === 'increase') {
            $sql = "UPDATE cart_details SET quantity = quantity + 1 WHERE user_id = ? AND product_id = ?";
        } elseif ($action === 'decrease') {
            $sql = "UPDATE cart_details SET quantity = quantity - 1 WHERE user_id = ? AND product_id = ?";
        } elseif ($quantity !== null) {
            $sql = "UPDATE cart_details SET quantity = ? WHERE user_id = ? AND product_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("iii", $quantity, $user_id, $product_id);
            $stmt->execute();
            echo "success";
            exit();
        }

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $user_id, $product_id);
        $stmt->execute();
}
echo "success";
?>

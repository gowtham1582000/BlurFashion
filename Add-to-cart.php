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

    // Check if the product already exists in the cart for the user
    $checkSql = "SELECT * FROM cart_details WHERE user_id = ? AND product_name = ?";
    $checkStmt = $conn->prepare($checkSql);
    $checkStmt->bind_param("is", $user_id, $product_name);
    $checkStmt->execute();
    $result = $checkStmt->get_result();

    if ($result->num_rows > 0) {
        // If product exists, update the quantity
        $updateSql = "UPDATE cart_details SET quantity = quantity + ? WHERE user_id = ? AND product_name = ?";
        $updateStmt = $conn->prepare($updateSql);
        $updateStmt->bind_param("iis", $quantity, $user_id, $product_name);

        if ($updateStmt->execute()) {
            echo json_encode(["status" => "success", "message" => "Quantity updated successfully!"]);
        } else {
            echo json_encode(["status" => "error", "message" => $updateStmt->error]);
        }

        $updateStmt->close();
    } else {
        // If product does not exist, insert a new record
        $insertSql = "INSERT INTO cart_details (user_id, product_name, price, image, quantity) VALUES (?, ?, ?, ?, ?)";
        $insertStmt = $conn->prepare($insertSql);
        $insertStmt->bind_param("isdsi", $user_id, $product_name, $price, $image, $quantity);

        if ($insertStmt->execute()) {
            echo json_encode(["status" => "success", "message" => "Product added to cart!"]);
        } else {
            echo json_encode(["status" => "error", "message" => $insertStmt->error]);
        }

        $insertStmt->close();
    }

    $checkStmt->close();
}

$conn->close();
?>

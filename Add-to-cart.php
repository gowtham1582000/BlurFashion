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
    $size = $_POST['size']; // New size field
    $color = $_POST['color']; // New color field

    // Check if the product with the same size and color exists in the cart for the user
    $checkSql = "SELECT * FROM cart_details WHERE user_id = ? AND product_name = ? AND size = ? AND color = ?";
    $checkStmt = $conn->prepare($checkSql);
    $checkStmt->bind_param("isss", $user_id, $product_name, $size, $color);
    $checkStmt->execute();
    $result = $checkStmt->get_result();

    if ($result->num_rows > 0) {
        // If product exists, update the quantity
        $updateSql = "UPDATE cart_details SET quantity = quantity + ? WHERE user_id = ? AND product_name = ? AND size = ? AND color = ?";
        $updateStmt = $conn->prepare($updateSql);
        $updateStmt->bind_param("iisss", $quantity, $user_id, $product_name, $size, $color);

        if ($updateStmt->execute()) {
            echo json_encode(["status" => "success", "message" => "Quantity updated successfully!"]);
        } else {
            echo json_encode(["status" => "error", "message" => $updateStmt->error]);
        }

        $updateStmt->close();
    } else {
        // If product does not exist, insert a new record
        $insertSql = "INSERT INTO cart_details (user_id, product_name, price, image, quantity, size, color) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $insertStmt = $conn->prepare($insertSql);
        $insertStmt->bind_param("isdssss", $user_id, $product_name, $price, $image, $quantity, $size, $color);

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

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

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $userId = intval($_POST['user_id']);
    $firstName = $conn->real_escape_string($_POST['first_name']);
    $lastName = $conn->real_escape_string($_POST['last_name']);
    $address1 = $conn->real_escape_string($_POST['billing_address_1']);
    $address2 = $conn->real_escape_string($_POST['billing_address_2']);
    $city = $conn->real_escape_string($_POST['billing_city']);
    $state = $conn->real_escape_string($_POST['billing_state']);
    $postcode = $conn->real_escape_string($_POST['billing_postcode']);
    $phone = $conn->real_escape_string($_POST['billing_phone']);
    $email = $conn->real_escape_string($_POST['billing_email']);
    $orderNotes = $conn->real_escape_string($_POST['order_comments']);
    $country = $conn->real_escape_string($_POST['billing_country']);
 

    // Default address flag
    $defaultAddress = $conn->real_escape_string($_POST['default_address']); // Default to 'N'
    $p_useraddressId=$conn->real_escape_string($_POST['userbillId']);
    // Assuming you have form data in $_POST
    $orderItems = $_POST['order_items'];

    // Convert $orderItems to JSON
    $orderItemsJson = json_encode($orderItems);

    $sql = "CALL InsertUserBillingDetails(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";


    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        "isssssssssssssi", 
        $userId, 
        $firstName, 
        $lastName, 
        $address1, 
        $address2, 
        $city, 
        $state, 
        $postcode, 
        $phone, 
        $email, 
        $orderNotes, 
        $country,  
        $defaultAddress, 
        $orderItemsJson ,// Pass the JSON data for order items
        $p_useraddressId
    );
    

    if ($stmt->execute()) {
        echo json_encode(['success' => true, "status" => "success", "message" => "Order placed successfully."]);
    } else {
        echo json_encode(['success' => false, "status" => "error", "message" => $stmt->error]);
    }

    $stmt->close();
}

$conn->close();
?>

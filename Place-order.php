<?php
require('razorpay-php/Razorpay.php'); // Include Razorpay PHP library

use Razorpay\Api\Api;

// Razorpay API credentials
$keyId = "rzp_test_gH7uWmfygand8W";
$keySecret = "wWxnJ1oKTRSDqPnGrGYlIVKk";

// Create Razorpay API instance
$api = new Api($keyId, $keySecret);

// Connect to the database
$host = "localhost";
$user = "root";
$password = "";
$dbname = "bfdb";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $razorpayPaymentId = $_POST['razorpay_payment_id'];
    $razorpayOrderId = $_POST['razorpay_order_id'];
    $razorpaySignature = $_POST['razorpay_signature'];

    // Verify Razorpay payment signature
    try {
        $attributes = [
            'razorpay_payment_id' => $razorpayPaymentId,
            'razorpay_order_id' => $razorpayOrderId,
            'razorpay_signature' => $razorpaySignature
        ];

        $api->utility->verifyPaymentSignature($attributes); // Throws an exception if verification fails

        // Payment verified successfully, save user details
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

        $sql = "INSERT INTO billing_details 
                (user_id, first_name, last_name, address_1, address_2, city, state, postcode, phone, email, order_notes) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("issssssssss", $userId, $firstName, $lastName, $address1, $address2, $city, $state, $postcode, $phone, $email, $orderNotes);

        if ($stmt->execute()) {
            echo json_encode(["status" => "success", "message" => "Order placed successfully."]);
        } else {
            echo json_encode(["status" => "error", "message" => $stmt->error]);
        }

        $stmt->close();
    } catch (Exception $e) {
        echo json_encode(["status" => "error", "message" => "Payment verification failed: " . $e->getMessage()]);
    }
}

$conn->close();
?>

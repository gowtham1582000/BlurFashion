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
    $userId = $_POST['UserId'];
    $addressId = $_POST['AddressId'] ?? null;
    $firstName = $_POST['FirstName'] ?? "";
    $lastName = $_POST['LastName'] ?? "";
    $doorNo = $_POST['DoorNo'] ?? "";
    $streetAddress = $_POST['StreetAddress'] ?? "";
    $city = $_POST['City'] ?? "";
    $state = $_POST['State'] ?? "";
    $postcode = $_POST['Postcode'] ?? "";
    $phone = $_POST['Phone'] ?? "";
    $country = $_POST['Country'] ?? "";
    $defaultAddress = $_POST['DefaultAddress'] ?? "N";
    $operationType = $_POST['OperationType']; // 'I', 'U', or 'D'

    if ($conn->connect_error) {
        die(json_encode(["status" => "error", "message" => "Database connection failed"]));
    }

    $stmt = $conn->prepare("CALL UserBillingAddressInsUpd_prc(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param(
        "iissssssissss",
        $userId,
        $addressId,
        $firstName,
        $lastName,
        $doorNo,
        $streetAddress,
        $city,
        $state,
        $postcode,
        $phone,
        $defaultAddress,
        $operationType,
        $country
    );

    if ($stmt->execute()) {
        echo json_encode(['success' => true,"status" => "success", "message" => "Operation successful"]);
    } else {
        echo json_encode(['success' => false,"status" => "error", "message" => "Database error: " . $stmt->error]);
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request method"]);
}
?>
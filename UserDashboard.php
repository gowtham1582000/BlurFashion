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

$userId = intval($_POST['user_id']);
$sql = "CALL UserDashBoard(?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $userId);

if ($stmt->execute()) {
    $output = [];
    // First Result Set
    $result = $stmt->get_result();
    if ($result) {
        $orderList = [];
        while ($row = $result->fetch_assoc()) {
            $orderList[] = $row;
        }
        $output['OrderList'] = $orderList;
        $result->free();
    }

    // Move to the next result set
    $stmt->next_result();

    // Second Result Set (User Details)
    if ($result = $stmt->get_result()) {
        $userDetails = [];
        while ($row = $result->fetch_assoc()) {
            $userDetails[] = $row;
        }
        $output['UserDetails'] = $userDetails;
        $result->free();
    }

    // Move to the third result set
    $stmt->next_result();

    // Third Result Set (User Address)
    if ($result = $stmt->get_result()) {
        $userAddress = [];
        while ($row = $result->fetch_assoc()) {
            $userAddress[] = $row;
        }
        $output['UserAddress'] = $userAddress;
        $result->free();
    }

    echo json_encode([
        'success' => true,
        'status' => 'success',
        'message' => 'Data fetched successfully.',
        'data' => $output
    ]);
} else {
    echo json_encode([
        'success' => false,
        'status' => 'error',
        'message' => $stmt->error
    ]);
}

$stmt->close();
$conn->close();
?>

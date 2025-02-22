<?php

$host = "localhost";
$user = "root";
$password = "";
$dbname = "bfdb";

$conn = new mysqli($host, $user, $password, $dbname);

$user_id = isset($_GET['user_id']) ? $_GET['user_id'] : null;

if ($user_id) {
    // Prepare SQL query using MySQLi
    $sql = "SELECT * FROM useraddressdetails WHERE user_id = ? and DefaultAddress='Y' LIMIT 1";
    
    // Initialize statement
    $stmt = $conn->prepare($sql);
    
    if ($stmt) {
        // Bind parameters
        $stmt->bind_param("i", $user_id);
        
        // Execute the statement
        $stmt->execute();
        
        // Get the result
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $address = $result->fetch_assoc();
            
            // Return address details as JSON
            echo json_encode([
                'status' => 'success',
                'billid'     =>$address['id'],
                'first_name' => $address['first_name'],
                'last_name'  => $address['last_name'],
                'phone'      => $address['phone'],
                'email'      => $address['email'],
                'address'    => $address['address_1'] . ', ' . $address['city'] . ', ' . $address['state'] . ', ' . $address['postcode'] . ', ' . $address['country']
            ]);
        } else {
            echo json_encode(['status' => 'no_default']);
        }
        
        // Close statement
        $stmt->close();
    } else {
        echo json_encode(['status' => 'query_error', 'error' => $conn->error]);
    }
} else {
    echo json_encode(['status' => 'not_logged_in']);
}

// Close the connection
$conn->close();
?>
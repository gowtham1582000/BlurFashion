<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

// Parse form data
$host = "localhost";
$user = "root";
$password = "";
$dbname = "bfdb";

$conn = new mysqli($host, $user, $password, $dbname);

$userBillingId = isset($_POST['userbillId']) ? intval($_POST['userbillId']) : 0;

$userId= isset($_POST['user_id']) ? intval($_POST['user_id']) : 0;

if ($userBillingId > 0) {
    // Fetch the billing or shipping details from the database
    $sql = "SELECT * FROM useraddressdetails WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $userBillingId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $billingData = $result->fetch_assoc();

            // Use Billing Address from database
            $deliveryAddress = $billingData['address_1'] . ', ' . 
                               $billingData['address_2'] . ', ' . 
                               $billingData['city'] . ', ' . 
                               $billingData['state'] . ', ' . 
                               $billingData['postcode'] . ', ' . 
                               $billingData['country'];

            $customerName = $billingData['first_name'] . ' ' . $billingData['last_name'];
            $customerEmail = $billingData['email'];

    } else {
        echo json_encode(['success' => false, 'message' => 'No billing details found for the provided ID.']);
        exit;
    }

    $stmt->close();

}else{
        $deliveryAddress = $_POST['billing_address_1'] . ', ' . $_POST['billing_address_2'] . ', ' . $_POST['billing_city'] . ', ' . $_POST['billing_state'] . ', ' . $_POST['billing_postcode'] . ', ' . $_POST['billing_country'];
        $customerName = $_POST['first_name'] . ' ' . $_POST['last_name'];
        $customerEmail = $_POST['billing_email'];
    
}


// Parse order comments
$orderComments = $_POST['order_comments'];

// Parse order items
$orderItems = $_POST['order_items'];
$totalAmount = 0;
$orderItemsHtml = "";

foreach ($orderItems as $item) {
    $totalAmount += $item['price'] * $item['quantity'];
    $orderItemsHtml .= "
        <tr>
            <td><img src='{$item['image']}' alt='Product Image' width='100' height='100'></td>
            <td>{$item['name']}</td>
            <td>{$item['quantity']}</td>
            <td>₹" . number_format($item['price'], 2) . "</td>
        </tr>
    ";
}

// Add email template details
$logoUrl = "./assets/img/B-removebg-preview (1).png";
$yourOrdersUrl = "https://example.com/your-orders?user_id=" . urlencode($userId) . "&order=Y";
$myAccountUrl = "https://example.com/my-account?user_id=" . urlencode($userId);
$websiteUrl = "https://www.blurfashion.in";

// Load the email template
$template = file_get_contents('mail-template.php');
$template = str_replace('{{logo_url}}', $logoUrl, $template);
$template = str_replace('{{your_orders_url}}', $yourOrdersUrl, $template);
$template = str_replace('{{my_account_url}}', $myAccountUrl, $template);
$template = str_replace('{{website_url}}', $websiteUrl, $template);
$template = str_replace('{{customer_name}}', $customerName, $template);
$template = str_replace('{{order_items}}', $orderItemsHtml, $template);
$template = str_replace('{{total_amount}}', $totalAmount, $template);
$template = str_replace('{{address}}', $deliveryAddress, $template);

try {
    // Configure PHPMailer
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'blurfashion007@gmail.com';
    $mail->Password = 'lkxz svtk pjqt wayl'; // Replace with your actual password or app-specific password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Set email parameters
    $mail->setFrom('blurfashion007@gmail.com', 'Blur Fashion');
    $mail->addAddress($customerEmail);
    $mail->isHTML(true);
    $mail->Subject = 'Order Confirmation';
    $mail->Body = $template;

    // Send the email
    if ($mail->send()) {
        echo json_encode(['success' => true, 'message' => 'Email sent successfully.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to send email.']);
    }
} catch (Exception $e) {
    echo json_encode(['success' => false,'email'=> $customerEmail, 'message' => 'Mailer Error: ' . $mail->ErrorInfo]);
}

?>

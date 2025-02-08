<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

// Parse form data
$MailShipAddress = $_POST['MailShipAddress'];

if ($MailShipAddress === 'B') {
    // Use Billing Address
    $deliveryAddress = $_POST['billing_address_1'] . ', ' . $_POST['billing_address_2'] . ', ' . $_POST['billing_city'] . ', ' . $_POST['billing_state'] . ', ' . $_POST['billing_postcode'] . ', ' . $_POST['billing_country'];
    $customerName = $_POST['first_name'] . ' ' . $_POST['last_name'];
    $customerEmail = $_POST['billing_email'];
} elseif ($MailShipAddress === 'S') {
    // Use Shipping Address
    $deliveryAddress = $_POST['shipping_address_1'] . ', ' . $_POST['shipping_address_2'] . ', ' . $_POST['shipping_city'] . ', ' . $_POST['shipping_state'] . ', ' . $_POST['shipping_postcode'] . ', ' . $_POST['shipping_country'];
    $customerName = $_POST['shipping_first_name'] . ' ' . $_POST['shipping_last_name'];
    $customerEmail = $_POST['shipping_email'];
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid address type.']);
    exit;
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
$yourOrdersUrl = "https://example.com/your-orders";
$myAccountUrl = "https://example.com/my-account";
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
    $mail->Username = 'kishorekumar6961608@gmail.com';
    $mail->Password = 'ljho prod yoec mvrq'; // Replace with your actual password or app-specific password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Set email parameters
    $mail->setFrom('blurfashion07@gmail.com', 'Blur Fashion');
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
    echo json_encode(['success' => false, 'message' => 'Mailer Error: ' . $mail->ErrorInfo]);
}

?>

<?php
require('razorpay-php/Razorpay.php');

use Razorpay\Api\Api;

$keyId = 'rzp_test_gH7uWmfygand8W';
$keySecret = 'wWxnJ1oKTRSDqPnGrGYlIVKk';
$api = new Api($keyId, $keySecret);

$amount = 50000; // Amount in paise (500.00 INR)
$receiptId = "receipt_" . uniqid();

$order = $api->order->create([
    'receipt' => $receiptId,
    'amount' => $amount,
    'currency' => 'INR',
]);

$orderId = $order['id'];

// Return order_id to the frontend
echo json_encode(['order_id' => $orderId,'ReceiptId'=>$receiptId]);
?>

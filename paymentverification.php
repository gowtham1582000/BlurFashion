<?php
require('razorpay-php/Razorpay.php');
use Razorpay\Api\Api;

// Razorpay API credentials
$keyId = 'rzp_test_gH7uWmfygand8W';
$keySecret = 'wWxnJ1oKTRSDqPnGrGYlIVKk';

// Get the JSON input
$input = file_get_contents('php://input');
$data = json_decode($input, true);

if (!isset($data['razorpay_payment_id'], $data['razorpay_order_id'], $data['razorpay_signature'])) {
    echo json_encode([
        "status" => "error",
        "message" => "Missing required payment parameters.",
    ]);
    exit;
}

$razorpayPaymentId = $data['razorpay_payment_id'];
$razorpayOrderId = $data['razorpay_order_id'];
$razorpaySignature = $data['razorpay_signature'];

try {
    // Verify payment signature
    $api = new Api($keyId, $keySecret);

    $attributes = [
        'razorpay_payment_id' => $razorpayPaymentId,
        'razorpay_order_id' => $razorpayOrderId,
        'razorpay_signature' => $razorpaySignature,
    ];

    $api->utility->verifyPaymentSignature($attributes);

    $payment = $api->payment->fetch($razorpayPaymentId);

    $paymentStatus = $payment->status;

    // Payment verified successfully
    echo json_encode([
        "status" => "success",
        "message" => "Payment verified successfully.",
        "payment_status" => $paymentStatus,  // Shows "captured", "failed", etc.
        "amount" => $payment->amount / 100,  // Amount in rupees
        "payment_method" => $payment->method, // Card, UPI, Netbanking, etc.
    ]);
} catch (Exception $e) {
    // Verification failed
    echo json_encode([
        "status" => "error",
        "message" => "Payment verification failed: " . $e->getMessage(),
    ]);
}
?>

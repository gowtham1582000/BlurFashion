<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Load PHPMailer

// Database connection
$host = "localhost";
$user = "root";
$password = "";
$dbname = "bfdb";

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die(json_encode(['success' => false, 'message' => 'Database connection failed!']));
}

session_start();
$user_id = $_POST['UserId'] ?? null;
$fieldType = $_POST['Field'] ?? null;
$newValue = $_POST['Value'] ?? null;

// Ensure required fields are present
if (!$user_id || !$fieldType || !$newValue) {
    echo json_encode(['success' => false, 'message' => 'Missing required fields.']);
    exit;
}

// Fetch current user details
$query = $conn->prepare("SELECT email, full_name, password FROM users WHERE user_id = ?");
$query->bind_param("i", $user_id);
$query->execute();
$result = $query->get_result();
$user = $result->fetch_assoc();
$oldEmail = $user['email'];
$userName = $user['full_name'];
$oldPasswordHash = $user['password'];

$subject = "";
$message = "";
$updateQuery = null;

if ($fieldType === 'name') {
    if ($newValue === $userName) {
        echo json_encode(['success' => false, 'message' => 'No changes detected in name.']);
        exit;
    }

    $updateQuery = $conn->prepare("UPDATE users SET full_name = ? WHERE user_id = ?");
    $updateQuery->bind_param("si", $newValue, $user_id);
    $subject = "Profile Name Updated";
    $message = "Dear $userName, <br><br> Your name has been updated successfully.";
} elseif ($fieldType === 'email') {
    if ($newValue === $oldEmail) {
        echo json_encode(['success' => false, 'message' => 'New email cannot be the same as the old email.']);
        exit;
    }

    $updateQuery = $conn->prepare("UPDATE users SET email = ? WHERE user_id = ?");
    $updateQuery->bind_param("si", $newValue, $user_id);
    $subject = "Email Address Updated";
    $message = "Dear $userName, <br><br> Your email address has been successfully updated to <b>$newValue</b>.";
} elseif ($fieldType === 'password') {
    $currentPassword = $_POST['CurrentPassword'] ?? null;

    if (!$currentPassword) {
        echo json_encode(['success' => false, 'message' => 'Current password is required.']);
        exit;
    }

    // Verify current password
    if (!password_verify($currentPassword, $oldPasswordHash)) {
        echo json_encode(['success' => false, 'message' => 'Current password is incorrect.']);
        exit;
    }

    $hashedPassword = password_hash($newValue, PASSWORD_DEFAULT);
    $updateQuery = $conn->prepare("UPDATE users SET password = ? WHERE user_id = ?");
    $updateQuery->bind_param("si", $hashedPassword, $user_id);
    $subject = "Password Updated";
    $message = "Dear $userName, <br><br> Your password has been changed successfully.";
}

// Execute the update
if ($updateQuery && $updateQuery->execute()) {
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'blurfashion007@gmail.com';
        $mail->Password = 'lkxz svtk pjqt wayl'; // Replace with an app password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
        $mail->isHTML(true);
        $mail->setFrom('blurfashion007@gmail.com', 'Blur Fashion');

        // If updating email, send two emails (old and new)
        if ($fieldType === 'email') {
            // Email to OLD email address
            $mail->clearAddresses();
            $mail->addAddress($oldEmail);
            $mail->Subject = "Email Address Changed";
            $mail->Body = "Dear $userName, <br><br> Your account email has been changed from <b>$oldEmail</b> to <b>$newValue</b>.<br>If you did not make this change, please contact support immediately.";
            $mail->send();

            // Email to NEW email address
            $mail->clearAddresses();
            $mail->addAddress($newValue);
            $mail->Subject = "Email Update Confirmation";
            $mail->Body = "Dear $userName, <br><br> Your account email is now set to <b>$newValue</b>. Welcome back!";
            $mail->send();
        } else {
            // For name or password updates, send a single email
            $mail->clearAddresses();
            $mail->addAddress($oldEmail);
            $mail->Subject = $subject;
            $mail->Body = $message . "<br><br>If you did not make this change, please contact support immediately.";
            $mail->send();
        }

        echo json_encode(['success' => true, 'message' => 'Details updated and confirmation email(s) sent.']);
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => 'Mailer Error: ' . $mail->ErrorInfo]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Database update failed.']);
}

$conn->close();
?>

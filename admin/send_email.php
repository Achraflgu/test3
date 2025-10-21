<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
require 'vendor/autoload.php';
include_once 'db_connection.php';
session_start();
if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit;
}
$sql = "SELECT admin_name, admin_job FROM admins WHERE admin_email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $_SESSION['email']);
$stmt->execute();
$stmt->bind_result($adminName, $adminJob); 
$stmt->fetch();
$stmt->close();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $subject = $_POST['emailSubject'];
    $body = $_POST['emailBody'];
    $customerId = $_POST['customerId'];
    $orderId = $_POST['orderId'];
    $sql = "SELECT customer_name, customer_email FROM customers WHERE customer_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $customerId);
    $stmt->execute();
    $stmt->bind_result($customerName, $customerEmail);
    $stmt->fetch();
    $stmt->close();
    $stmt = $conn->prepare("SELECT invoice_no FROM orders WHERE order_id = ?");
    $stmt->bind_param("i", $orderId);
    $stmt->execute();
    $stmt->bind_result($invoiceNo);
    $stmt->fetch();
    $stmt->close();
    $emailBody = "Dear {$customerName},<br><br>";
    $emailBody .= "We hope this email finds you well.<br><br>";
    $emailBody .= "We would like to inform you about an update regarding your recent order. ";
    $emailBody .= "Please find the details below:<br><br>";
    $emailBody .= "{$body}<br><br>";
    $emailBody .= "You can view your order details by clicking on the link below:<br>";
    $emailBody .= "View Order Details: <a href='http://localhost/msport/admin/view_order_details.php?order_id={$orderId}'>{$invoiceNo}</a><br><br>";
    $emailBody .= "If you have any questions or concerns, feel free to reach out to us. ";
    $emailBody .= "We're always here to help.<br><br>";
    $emailBody .= "Best regards,<br>";
    $emailBody .= "{$adminName}, {$adminJob}.<br>";
    $emailBody .= "Customer Service Team<br>";
    $emailBody .= "Spark";
    $mail = new PHPMailer();
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'achrafgu92@gmail.com'; 
    $mail->Password = 'frfpvyagagwfwhju'; 
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    $mail->setFrom($_SESSION['email'], $adminName); 
    $mail->addAddress($customerEmail, $customerName); 
    $mail->Subject = $subject;
    $mail->msgHTML($emailBody);
    if ($mail->send()) {
        echo 'Message has been sent';
        echo '<script>window.location.href = "index.php?page=orders";</script>';
    } else {
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }
} else {
    header('Location: index.php');
    exit;
}
?>
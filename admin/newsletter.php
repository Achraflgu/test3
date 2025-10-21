<?php
if (isset($_SERVER['HTTP_REFERER']) && strpos($_SERVER['HTTP_REFERER'], 'index.php') !== false) {
    session_start();
    if (!isset($_SESSION['email'])) {
        header("Location: login.php");
        exit();
    }
    include_once 'db_connection.php'; 
    $email = $_SESSION['email'];
} else {
    header("Location: index.php?page=newsletter");
    exit(); 
}
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php'; 
function sendNewsletter($subject, $message, $conn) {
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP(); 
        $mail->Host = 'smtp.gmail.com'; 
        $mail->SMTPAuth = true; 
        $mail->Username = 'achrafgu92@gmail.com'; 
        $mail->Password = 'frfpvyagagwfwhju'; 
        $mail->SMTPSecure = 'ssl'; 
        $mail->Port = 465; 
        $mail->isHTML(true);
        $mail->setFrom('achrafgu92@gmail.com', 'SPARK');
        $result = $conn->query("SELECT DISTINCT email FROM newsletter_emails");
        $newsletterSent = false;
        while ($row = $result->fetch_assoc()) {
            $email = $row['email'];
            $mail->addAddress($email);
            $mail->Subject = $subject;
            $mail->Body = $message;
            $mail->send();
            $mail->clearAddresses(); 
            $newsletterSent = true; 
        }
        if ($newsletterSent) {
            echo "Newsletter sent to all subscribers.";
            echo "<script>alert('Newsletter successfully sent to all subscribers !'); window.location.href='index.php?page=newsletter';</script>";
        } else {
            echo "No subscribers found to send the newsletter.";
        }
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['send_newsletter'])) {
        $subject = $_POST['subject'];
        $message = $_POST['message'];
        sendNewsletter($subject, $message, $conn);
    }
}
$result = $conn->query("SELECT COUNT(DISTINCT email) AS count FROM newsletter_emails");
$row = $result->fetch_assoc();
$count = $row['count'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Newsletters</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        h1 {
            text-align: center;
            margin-top: 20px;
        }
        h2 {
            margin-top: 40px;
        }
        form {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .dark form {
            background-color: #333;
                        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .dark .table{
            color: white;
        }
        .table-hover tbody tr:hover{
            color: #606da6;
        }
        .dark .table-hover tbody tr:hover{
            color: #f26c4f;
        }
        .btn-primary {
            background-color: #606da6;
            border-color: #606da6;
        }
        .dark .btn-primary {
            background-color: #f26c4f !important;
            border-color: #f26c4f;
        }
        .btn-sm:hover {
            background-color: #606da6b5 !important;
        }
        .dark .btn-sm:hover {
            background-color: #f26c4f9c !important;
        }
        .badge-primary {
            background-color: #606da6;
            border-color: #606da6;
        }
        .dark .badge-primary {
            background-color: #f26c4f !important;
            border-color: #f26c4f;
        }
        .btn-sm:hover {
            background-color: #606da6b5 !important;
        }
        .dark .btn-sm:hover {
            background-color: #f26c4f9c !important;
        }
        .page-item.active .page-link {
            background-color: #606da6 !important;
            border-color: #606da6;
        }
        .dark .page-item.active .page-link {
            background-color: #f26c4f !important;
            border-color: #f26c4f;
        }
        .dark .page-link {
            color: white;
            background-color: #000;
            border: 1px solid #000000;
        }
        .dark a {
    color: #f26c4f;
}
a {
    color: #606da6;
}
.dark .btn-primary{
            color: white;
        }
        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }
        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 20px;
            box-sizing: border-box;
        }
        textarea {
            resize: vertical;
        }
        button {
            padding: 10px 20px;
            background-color: #606da6;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .dark button {
            background-color: #f26c4f;
        }
        button:hover {
            background-color: #0056b3;
        }
        .subscriber-count {
            text-align: center;
            margin-top: 40px;
            font-weight: bold;
        }
        @media (max-width: 768px) {
            form {
                padding: 15px;
            }
        }
    </style>
</head>
<body>
    <h1>Send Newsletters</h1>
<br><br>
    <form method="POST" action="newsletter.php">
        <label for="subject">Subject:</label>
        <input type="text" id="subject" name="subject" required><br><br>
        <label for="message">Message:</label>
        <textarea id="message" name="message" rows="10" cols="30" required></textarea><br><br>
        <button type="submit" name="send_newsletter">Send Newsletter</button>
    </form>
    <div class="subscriber-count">
        Total Subscribed Emails: <?php echo $count; ?>
    </div>
</body>
</html>
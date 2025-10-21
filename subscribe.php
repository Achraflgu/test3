<?php
session_start();
include("db_connection.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        http_response_code(400);
        echo "Invalid email format";
        exit();
    }
    $stmt = $conn->prepare("INSERT INTO newsletter_emails (email) VALUES (?)");
    $stmt->bind_param("s", $email);
    if ($stmt->execute()) {
        echo "Subscription successful";
    } else {
        http_response_code(500);
        echo "Internal server error";
    }
    $stmt->close();
}
$conn->close();
?>
<?php
ob_start();
session_start();
include("db_connection.php"); 
if (isset($_GET['code'])) {
    $confirmation_code = $_GET['code'];
    if (isset($_SESSION['registration_details'])) {
        $registration_details = $_SESSION['registration_details'];
        if ($registration_details['confirmation_code'] == $confirmation_code) {
            $query = "INSERT INTO customers (customer_name, customer_email, customer_password, customer_address, customer_city, customer_postal_code, customer_country, customer_phone, customers_photo) VALUES ('{$registration_details['customer_name']}', '{$registration_details['customer_email']}', '{$registration_details['customer_password']}', '{$registration_details['customer_address']}', '{$registration_details['customer_city']}', '{$registration_details['customer_postal_code']}', '{$registration_details['customer_country']}', '{$registration_details['customer_phone']}', '{$registration_details['customer_photo']}')";
            $result = mysqli_query($conn, $query);
            if ($result) {
                echo "Registration successful! You can now login.";
                header("Location: login.php");
                exit();
            } else {
                echo "Registration failed. Please try again later.";
            }
        } else {
            echo "Invalid confirmation code.";
        }
    } else {
        echo "Session data not found. Please try again.";
    }
} else {
    echo "Confirmation code not provided.";
}
?>
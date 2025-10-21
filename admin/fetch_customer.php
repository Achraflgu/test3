<?php
include_once 'db_connection.php'; 
if (isset($_POST['customerId']) && !empty($_POST['customerId'])) {
    $customerId = mysqli_real_escape_string($conn, $_POST['customerId']);
    $query = "SELECT * FROM customers WHERE customer_id = '$customerId'";
    $result = mysqli_query($conn, $query);
    if ($result) {
        $customerData = mysqli_fetch_assoc($result);
        echo json_encode($customerData);
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "Invalid input";
}
?>
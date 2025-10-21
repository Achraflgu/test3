<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['customerId']) && isset($_POST['customerName']) && isset($_POST['customerAddress']) && isset($_POST['customerEmail'])) {
        include_once 'db_connection.php'; 
        $customerId = mysqli_real_escape_string($conn, $_POST['customerId']);
        $customerName = mysqli_real_escape_string($conn, $_POST['customerName']);
        $customerAddress = mysqli_real_escape_string($conn, $_POST['customerAddress']);
        $customerEmail = $_POST['customerEmail'];
$customerPhoto = isset($_POST['customerPhoto']) ? $_POST['customerPhoto'] : 'uploads/default.jpg';
        $sql = "UPDATE customers SET customer_name='$customerName', customer_address='$customerAddress', customers_photo='$customerPhoto' WHERE customer_id='$customerId'";
        if (mysqli_query($conn, $sql)) {
            $response = array(
                "status" => "success",
                "message" => "Customer information updated successfully."
            );
            echo json_encode($response);
        } else {
            $response = array(
                "status" => "error",
                "message" => "Error updating customer information: " . mysqli_error($conn)
            );
            echo json_encode($response);
        }
        mysqli_close($conn);
    } else {
        $response = array(
            "status" => "error",
            "message" => "Missing parameters."
        );
        echo json_encode($response);
    }
} else {
    $response = array(
        "status" => "error",
        "message" => "Invalid request method."
    );
    echo json_encode($response);
}
?>
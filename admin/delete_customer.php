<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['customerId'])) {
        include_once 'db_connection.php'; 
        $customerId = mysqli_real_escape_string($conn, $_POST['customerId']);
        $sql = "DELETE FROM customers WHERE customer_id = '$customerId'";
        if (mysqli_query($conn, $sql)) {
            $response = array(
                "status" => "success",
                "message" => "Customer deleted successfully."
            );
        } else {
            $response = array(
                "status" => "error",
                "message" => "Error deleting customer: " . mysqli_error($conn)
            );
        }
        mysqli_close($conn);
        header('Content-Type: application/json');
        echo json_encode($response);
    } else {
        $response = array(
            "status" => "error",
            "message" => "Customer ID is missing."
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
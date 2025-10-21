<?php
if (isset($_POST['adminId'])) {
    include_once 'db_connection.php'; 
    $adminId = mysqli_real_escape_string($conn, $_POST['adminId']);
    $sql = "DELETE FROM admins WHERE admin_id = '$adminId'";
    if (mysqli_query($conn, $sql)) {
        $response = array(
            "status" => "success",
            "message" => "Admin deleted successfully."
        );
        echo json_encode($response);
    } else {
        $response = array(
            "status" => "error",
            "message" => "Error deleting admin: " . mysqli_error($conn)
        );
        echo json_encode($response);
    }
    mysqli_close($conn);
} else {
    $response = array(
        "status" => "error",
        "message" => "Admin ID not provided."
    );
    echo json_encode($response);
}
?>
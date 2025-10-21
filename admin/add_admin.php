<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['addadminName']) && isset($_POST['addadminEmail']) && isset($_POST['addadminPassword']) && isset($_POST['addadminJob']) && isset($_POST['addadminPhone'])) {
        include_once 'db_connection.php'; 
        $adminName = mysqli_real_escape_string($conn, $_POST['addadminName']);
        $adminEmail = mysqli_real_escape_string($conn, $_POST['addadminEmail']);
        $adminPassword = mysqli_real_escape_string($conn, $_POST['addadminPassword']); 
        $adminJob = mysqli_real_escape_string($conn, $_POST['addadminJob']);
        $adminPhone = mysqli_real_escape_string($conn, $_POST['addadminPhone']);
        $adminPhoto = ''; 
        if (isset($_FILES['addAdminPhoto'])) {
            $targetDir = "uploads/"; 
            $fileName = basename($_FILES["addAdminPhoto"]["name"]);
            $targetFilePath = $targetDir . $fileName;
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
            $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
            if (in_array($fileType, $allowTypes)) {
                if (move_uploaded_file($_FILES["addAdminPhoto"]["tmp_name"], $targetFilePath)) {
                    $adminPhoto = $targetFilePath;
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            } else {
                echo "Sorry, only JPG, JPEG, PNG, GIF files are allowed.";
            }
        }
        $sql = "INSERT INTO admins (admin_name, admin_email, admin_password, admin_job, admin_phone, admin_photo) VALUES ('$adminName', '$adminEmail', '$adminPassword', '$adminJob', '$adminPhone', '$adminPhoto')";
        if (mysqli_query($conn, $sql)) {
            $response = array(
                "status" => "success",
                "message" => "New admin added successfully."
            );
            echo json_encode($response);
        } else {
            $response = array(
                "status" => "error",
                "message" => "Error adding new admin: " . mysqli_error($conn)
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
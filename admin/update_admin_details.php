<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['adminId']) && isset($_POST['adminName']) && isset($_POST['adminJob']) && isset($_POST['adminPhone'])) {
        include_once 'db_connection.php'; 
        $adminId = mysqli_real_escape_string($conn, $_POST['adminId']);
        $adminName = mysqli_real_escape_string($conn, $_POST['adminName']);
        $adminJob = mysqli_real_escape_string($conn, $_POST['adminJob']);
        $adminPhone = mysqli_real_escape_string($conn, $_POST['adminPhone']);
        $targetDirectory = "uploads/";
        $newAdminPhotoPath = ''; 
        if (!empty($_FILES['newAdminPhoto']['name'])) {
            $fileName = basename($_FILES['newAdminPhoto']['name']);
            $targetFilePath = $targetDirectory . $fileName;
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
            $allowedTypes = array('jpg', 'jpeg', 'png', 'gif');
            if (in_array($fileType, $allowedTypes)) {
                if (move_uploaded_file($_FILES['newAdminPhoto']['tmp_name'], $targetFilePath)) {
                    $newAdminPhotoPath = $targetFilePath;
                } else {
                    $response = array(
                        "status" => "error",
                        "message" => "Error uploading photo."
                    );
                    echo json_encode($response);
                    exit; 
                }
            } else {
                $response = array(
                    "status" => "error",
                    "message" => "Invalid file format. Only JPG, JPEG, PNG, and GIF files are allowed."
                );
                echo json_encode($response);
                exit; 
            }
        }
        $sql = "UPDATE admins SET admin_name='$adminName', admin_job='$adminJob', admin_phone='$adminPhone'";
        if (!empty($newAdminPhotoPath)) {
            $sql .= ", admin_photo='$newAdminPhotoPath'";
        }
        $sql .= " WHERE admin_id='$adminId'";
        if (mysqli_query($conn, $sql)) {
            $response = array(
                "status" => "success",
                "message" => "Admin information updated successfully.",
                "newAdminPhotoPath" => $newAdminPhotoPath 
            );
            echo json_encode($response);
        } else {
            $response = array(
                "status" => "error",
                "message" => "Error updating admin information: " . mysqli_error($conn)
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
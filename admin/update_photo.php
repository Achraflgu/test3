<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}
include_once 'db_connection.php'; 
$email = $_SESSION['email'];
$photoUpdated = false;
if (isset($_FILES['admin_photo'])) {
    $file = $_FILES['admin_photo'];
    $fileError = $file['error'];
    if ($fileError === 0) {
        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileDestination = 'uploads/' . $fileName; 
        move_uploaded_file($fileTmpName, $fileDestination);
        $updateQuery = "UPDATE admins SET admin_photo = ? WHERE admin_email = ?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $updateQuery)) {
            echo "SQL error: " . mysqli_error($conn);
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "ss", $fileDestination, $email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            $photoUpdated = true;
        }
    } else {
        echo "File upload error: " . $fileError;
        exit();
    }
}
if ($photoUpdated) {
    echo $fileDestination;
} else {
    echo ""; 
}
mysqli_close($conn);
?>
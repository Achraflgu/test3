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
        if (move_uploaded_file($fileTmpName, $fileDestination)) {
            $updateQuery = "UPDATE admins SET admin_photo = ? WHERE admin_email = ?";
            $stmt = mysqli_stmt_init($conn);
            if (mysqli_stmt_prepare($stmt, $updateQuery)) {
                mysqli_stmt_bind_param($stmt, "ss", $fileDestination, $email);
                if (mysqli_stmt_execute($stmt)) {
                    $photoUpdated = true;
                } else {
                    echo "Error updating photo: " . mysqli_error($conn);
                    exit();
                }
            } else {
                echo "SQL error: " . mysqli_error($conn);
                exit();
            }
            mysqli_stmt_close($stmt);
        } else {
            echo "Error moving uploaded file.";
            exit();
        }
    } else {
        echo "File upload error: " . $fileError;
        header("Location: index.php?page=Profile&error=photo_error");
        exit();
    }
}
if ($photoUpdated || !isset($_FILES['admin_photo'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $newEmail = $_POST['email'];
    $currentPassword = $_POST['current_password'];
    $newPassword = $_POST['new_password']; 
    $sql = "SELECT * FROM admins WHERE admin_email = ? AND admin_password = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $email, $currentPassword);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if (mysqli_num_rows($result) == 1) {
        $updatePassword = "";
        if (!empty($newPassword)) {
            $updatePassword = ", admin_password = ?";
        }
        $updateQuery = "UPDATE admins SET admin_name = ?, admin_phone = ?, admin_email = ? $updatePassword WHERE admin_email = ?";
        $stmt = mysqli_prepare($conn, $updateQuery);
        if (!empty($newPassword)) {
            mysqli_stmt_bind_param($stmt, "sssss", $name, $phone, $newEmail, $newPassword, $email);
        } else {
            mysqli_stmt_bind_param($stmt, "ssss", $name, $phone, $newEmail, $email);
        }
        if (mysqli_stmt_execute($stmt)) {
            $_SESSION['email'] = $newEmail; 
            header("Location: index.php?page=Profile&success=true");
            exit();
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
    } else {
        header("Location: index.php?page=Profile&error=incorrect_password");
        exit();
    }
}
mysqli_close($conn);
?>
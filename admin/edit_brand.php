<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}
include_once 'db_connection.php'; 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $editBrandId = $_POST['editBrandId'];
    $editBrandName = $_POST['editBrandName'];
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES["editBrandPhoto"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["editBrandPhoto"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
    if (file_exists($targetFile)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    if ($_FILES["editBrandPhoto"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["editBrandPhoto"]["tmp_name"], $targetFile)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["editBrandPhoto"]["name"])). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
    $update_query = "UPDATE brands SET brand_name='$editBrandName', brand_photo='$targetFile' WHERE brand_id='$editBrandId'";
    if (mysqli_query($conn, $update_query)) {
        echo "Brand updated successfully";
    } else {
        echo "Error updating brand: " . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>
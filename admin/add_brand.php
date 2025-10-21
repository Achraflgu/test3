<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}
include_once 'db_connection.php'; 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $brandName = $_POST['brandName'];
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES["brandPhoto"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["brandPhoto"]["tmp_name"]);
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
    if ($_FILES["brandPhoto"]["size"] > 500000) {
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
        if (move_uploaded_file($_FILES["brandPhoto"]["tmp_name"], $targetFile)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["brandPhoto"]["name"])). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
    $insert_query = "INSERT INTO brands (brand_name, brand_photo) VALUES ('$brandName', '$targetFile')";
    if (mysqli_query($conn, $insert_query)) {
        echo "New brand added successfully";
    } else {
        echo "Error: " . $insert_query . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>
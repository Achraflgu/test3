<?php
include_once 'db_connection.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $categoryName = mysqli_real_escape_string($conn, $_POST['categoryName']);
    if(isset($_FILES['categoryPhoto']) && $_FILES['categoryPhoto']['error'] === UPLOAD_ERR_OK) {
        $photoTmpName = $_FILES['categoryPhoto']['tmp_name'];
        $photoName = $_FILES['categoryPhoto']['name'];
        $photoPath = "uploads/" . $photoName; 
        if(move_uploaded_file($photoTmpName, $photoPath)) {
            $query = "INSERT INTO productcategories (pcategory_name, pcategory_photo) VALUES ('$categoryName', '$photoPath')";
            $result = mysqli_query($conn, $query);
            if($result) {
                echo "Category added successfully.";
            } else {
                echo "Error adding category.";
            }
        } else {
            echo "Error uploading photo.";
        }
    } else {
        echo "Error: Photo not uploaded.";
    }
}
?>
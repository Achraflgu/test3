<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'db_connection.php';
    $productName = $_POST['productName'];
    $productCategory = $_POST['productCategory'];
    $productDescription = $_POST['productDescription'];
    $productPrice = $_POST['productPrice'];
    $productStock = $_POST['productStock'];
    $brandId = $_POST['brandId'];
    $productFeatures = $_POST['productFeatures'];
    $productDetails = $_POST['productDetails'];
    $productTag = $_POST['productTag'];
    $productUrl = $_POST['productUrl']; 
    $productKeywords = json_decode($_POST['productKeywords'], true);
    if ($productTag == "Sale") {
        $productSalePrice = isset($_POST['productSalePrice']) ? $_POST['productSalePrice'] : null;
        $productSaleStartDate = isset($_POST['productSaleStartDate']) ? $_POST['productSaleStartDate'] : null;
        $productSaleEndDate = isset($_POST['productSaleEndDate']) ? $_POST['productSaleEndDate'] : null;
    } else {
        $productSalePrice = null;
        $productSaleStartDate = null;
        $productSaleEndDate = null;
    }
    $targetDir = "uploads/";
    $uploadOk = 1;
    function handleFileUpload($fileKey, $targetDir) {
        global $uploadOk;
        $targetFile = $targetDir . basename($_FILES[$fileKey]["name"]);
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        if (empty($_FILES[$fileKey]["name"])) {
            return null; 
        }
        $check = getimagesize($_FILES[$fileKey]["tmp_name"]);
        if ($check === false) {
            $uploadOk = 0;
            return null;
        }
        if ($_FILES[$fileKey]["size"] > 500000) {
            $uploadOk = 0;
            return null;
        }
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            $uploadOk = 0;
            return null;
        }
        if ($uploadOk == 0) {
            return null;
        } else {
            if (move_uploaded_file($_FILES[$fileKey]["tmp_name"], $targetFile)) {
                return $targetFile;
            } else {
                return null;
            }
        }
    }
    $productPhoto = handleFileUpload("productPhoto", $targetDir);
    $productPhoto1 = handleFileUpload("productPhoto1", $targetDir);
    $productPhoto2 = handleFileUpload("productPhoto2", $targetDir);
    $productPhoto3 = handleFileUpload("productPhoto3", $targetDir);
    if ($productPhoto !== null) {
        $sql = "INSERT INTO products (product_name, pcategory_id, product_description, product_price, product_stock_quantity, brand_id, product_photo, product_features, product_details, product_tag, product_sale_price, sale_start_date, sale_end_date, product_photo_1, product_photo_2, product_photo_3, product_url, product_keywords) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sisdiissssssssssss", $productName, $productCategory, $productDescription, $productPrice, $productStock, $brandId, $productPhoto, $productFeatures, $productDetails, $productTag, $productSalePrice, $productSaleStartDate, $productSaleEndDate, $productPhoto1, $productPhoto2, $productPhoto3, $productUrl, $_POST['productKeywords']);
        $stmt->execute();
        if ($stmt->affected_rows > 0) {
            $response = array('success' => true, 'message' => 'Product added successfully');
        } else {
            $response = array('success' => false, 'message' => 'Failed to add product');
        }
        $stmt->close();
    } else {
        $sql = "INSERT INTO products (product_name, pcategory_id, product_description, product_price, product_stock_quantity, brand_id, product_photo, product_features, product_details, product_tag, product_sale_price, sale_start_date, sale_end_date, product_url, product_keywords) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sisdiisssssssssss", $productName, $productCategory, $productDescription, $productPrice, $productStock, $brandId, $productPhoto, $productFeatures, $productDetails, $productTag, $productSalePrice, $productSaleStartDate, $productSaleEndDate, $productUrl, $_POST['productKeywords']);
        $stmt->execute();
        if ($stmt->affected_rows > 0) {
            $response = array('success' => true, 'message' => 'Product added successfully');
        } else {
            $response = array('success' => false, 'message' => 'Failed to add product');
        }
        $stmt->close();
    }
    $conn->close();
    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    $response = array('success' => false, 'message' => 'Form not submitted');
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>
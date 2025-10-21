<?php
include 'db_connection.php'; // Ensure this file contains your database connection setup

function getProductDetails($conn, $product_id) {
    $query = "SELECT * FROM products WHERE product_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

function getOtherProductInCategory($conn, $product_id, $category_id) {
    $query = "SELECT * FROM products WHERE product_id != ? AND pcategory_id = ? ORDER BY RAND() LIMIT 1";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ii", $product_id, $category_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // If no product found in the same category, try fetching from other categories
    if ($result->num_rows === 0) {
        $query = "SELECT * FROM products WHERE product_id != ? ORDER BY RAND() LIMIT 1";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $product_id);
        $stmt->execute();
        $result = $stmt->get_result();
    }

    return $result->fetch_assoc();
}


if (isset($_POST['product_id'])) {
    $product_id = intval($_POST['product_id']);
    $product_details = getProductDetails($conn, $product_id);

    if ($product_details) {
        $category_id = $product_details['pcategory_id'];
        $other_product_details = getOtherProductInCategory($conn, $product_id, $category_id);

        if ($other_product_details) {
            echo json_encode([
                'product' => $product_details,
                'other_product' => $other_product_details
            ]);
        } else {
            echo json_encode(['error' => 'No other product found in the same category']);
        }
    } else {
        echo json_encode(['error' => 'Product not found']);
    }
} else {
    echo json_encode(['error' => 'Invalid request']);
}
?>

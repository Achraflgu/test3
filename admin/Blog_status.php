<?php
include_once 'db_connection.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['blog_id']) && isset($_POST['status'])) {
        $blogId = mysqli_real_escape_string($conn, $_POST['blog_id']);
        $status = mysqli_real_escape_string($conn, $_POST['status']);
        $sql = "UPDATE blog SET status='$status' WHERE blog_id=$blogId";
        if (mysqli_query($conn, $sql)) {
            echo "Status updated successfully";
        } else {
            echo "Error updating status: " . mysqli_error($conn);
        }
    } else {
        echo "Invalid request";
    }
} else {
    echo "Method not allowed";
}
?>
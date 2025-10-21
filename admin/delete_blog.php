<?php
if (isset($_POST['blog_id']) && !empty($_POST['blog_id'])) {
    include_once 'db_connection.php';
    $blogId = $_POST['blog_id'];
    $sql = "DELETE FROM blog WHERE blog_id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $blogId);
    if (mysqli_stmt_execute($stmt)) {
        echo "Blog post deleted successfully.";
    } else {
        echo "Error deleting blog post: " . mysqli_error($conn);
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    echo "Invalid request.";
}
?>
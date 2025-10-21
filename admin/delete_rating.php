<?php
include_once 'db_connection.php';
if (isset($_POST['ratingId'])) {
    $ratingId = mysqli_real_escape_string($conn, $_POST['ratingId']);
    $query = "DELETE FROM productreviews WHERE review_id = '$ratingId'";
    $result = mysqli_query($conn, $query);
    if ($result) {
        echo json_encode(array('success' => true));
    } else {
        echo json_encode(array('error' => 'Failed to delete rating'));
    }
    mysqli_close($conn);
} else {
    echo json_encode(array('error' => 'RatingId not provided'));
}
?>
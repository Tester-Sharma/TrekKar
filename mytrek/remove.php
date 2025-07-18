<?php
session_start();

// Include the database connection file
include('../connect/connect.php');

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the post_id of the participation to be removed
    $post_id = $_POST['postid'];
    $user_id = $_SESSION['user_id'];

    // Delete the participation record from my_trek table
    $delete_query = "DELETE FROM my_trek WHERE post_id = '$post_id' AND user_id = '$user_id'";
    mysqli_query($con, $delete_query);

    // Decrement the member_count in post_details table
    $update_post_query = "UPDATE post_details SET member_count = member_count - 1 WHERE created_post_id = '$post_id'";
    mysqli_query($con, $update_post_query);

    // Redirect the user back to the mytrek.php page
    header("Location: http://localhost/trek-kar/mytrek/mytrek.php");
    exit();
}
?>

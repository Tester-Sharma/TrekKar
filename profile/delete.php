<?php
session_start();

// Include the database connection file
include('../connect/connect.php');

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the post_id to be deleted
    $post_id = $_POST['postid'];
    
    // Delete the record from post_details table
    $delete_post_query = "DELETE FROM post_details WHERE created_post_id = '$post_id'";
    mysqli_query($con, $delete_post_query);

    // Delete the record from my_trek table
    $delete_trek_query = "DELETE FROM my_trek WHERE post_id = '$post_id'";
    mysqli_query($con, $delete_trek_query);

    // Redirect the user back to the profile page
    header("Location: http://localhost/trek-kar/profile/userprofile.php");
    exit();
}
?>
    
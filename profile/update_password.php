<?php
// Include the database connection file
include('../connect/connect.php');

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Start the session
    session_start();

    // Retrieve user_id from session
    $userid = $_SESSION['user_id'];

    // Collect form data
    $old_password = isset($_POST['old_password']) ? $_POST['old_password'] : '';
    $new_password = isset($_POST['new_password']) ? $_POST['new_password'] : '';
    $confirm_password = isset($_POST['confirm_password']) ? $_POST['confirm_password'] : '';

    // Verify that the old password matches the one stored in the database
    $verify_query = mysqli_query($con, "SELECT password FROM user_detail WHERE user_id='$userid'");
    $row = mysqli_fetch_assoc($verify_query);
    $stored_password = $row['password'];

    if ($old_password != $stored_password) {
        // Old password does not match, show an error message
        echo '<script>alert("Old password is incorrect.");';
        echo 'window.location.href = "userprofile.php";</script>';
        exit; // Stop further execution
    }

    // Check if the new password and confirm password match
    if ($new_password != $confirm_password) {
        // New password and confirm password do not match, show an error message
        echo '<script>alert("New password and confirm password do not match.");';
        echo 'window.location.href = "userprofile.php";</script>';
        exit; // Stop further execution
    }

    // Prepare an SQL statement to update the password for the current user
    $sql = "UPDATE user_detail SET password='$new_password' WHERE user_id='$userid'";

    // Execute the SQL statement
    if (mysqli_query($con, $sql)) {
        // Redirect to profile page after successful update
        header("location: userprofile.php");
        exit();
    } else {
        // Handle error if update fails
        echo "Error updating password: " . mysqli_error($con);
    }

    // Close the database connection
    mysqli_close($con);
}
?>
    
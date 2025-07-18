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
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
    $city = isset($_POST['city']) ? $_POST['city'] : '';

    // Prepare an SQL statement to update user details for the current user
    $sql = "UPDATE user_detail SET ";
    $updates = array();

    // Check each field and add to updates array if not empty
    if (!empty($username)) {
        $verify_query_username = mysqli_query($con, "SELECT username FROM user_detail WHERE username='$username' AND user_id != '$userid'");
        if (mysqli_num_rows($verify_query_username) > 0) {
            // Username already exists, show an alert
            echo '<script>alert("Username already used, please try another one.");';
            echo 'window.location.href = "userprofile.php";</script>';
            exit; // Stop further execution
        } else {
            $updates[] = "username='$username'";
            $_SESSION['username'] = $username; // Update session variable
        }
    }

    if (!empty($name)) {
        $updates[] = "name='$name'";
        $_SESSION['name'] = $name; // Update session variable
    }

    if (!empty($email)) {
        $verify_query_email = mysqli_query($con, "SELECT email FROM user_detail WHERE email='$email' AND user_id != '$userid'");
        if (mysqli_num_rows($verify_query_email) > 0) {
            // Email already exists, show an alert
            echo '<script>alert("Email already used, please try another one.");';
            echo 'window.location.href = "userprofile.php";</script>';
            exit; // Stop further execution
        } else {
            $updates[] = "email='$email'";
            $_SESSION['email'] = $email; // Update session variable
        }
    }

    if (!empty($gender)) {
        $updates[] = "gender='$gender'";
        $_SESSION['gender'] = $gender; // Update session variable
    }

    if (!empty($city)) {
        $updates[] = "city='$city'";
        $_SESSION['city'] = $city; // Update session variable
    }

    // Add updates to SQL query
    $sql .= implode(", ", $updates);
    $sql .= " WHERE user_id='$userid'";

    // Execute the SQL statement
    if (mysqli_query($con, $sql)) {
        // Update corresponding fields in post_details table
        $post_sql = "UPDATE post_details SET ";
        $post_updates = array();

        if (!empty($username)) {
            $post_updates[] = "username='$username'";
        }

        if (!empty($name)) {
            $post_updates[] = "name='$name'";
        }

        if (!empty($email)) {
            $post_updates[] = "email='$email'";
        }

        if (!empty($gender)) {
            $post_updates[] = "gender='$gender'";
        }

        if (!empty($city)) {
            $post_updates[] = "city='$city'";
        }

        // Add updates to post SQL query
        $post_sql .= implode(", ", $post_updates);
        $post_sql .= " WHERE user_id='$userid'";

        mysqli_query($con, $post_sql);

        // Redirect to profile page after successful update
        header("location: userprofile.php");
        exit();
    } else {
        // Handle error if update fails
        echo "Error updating record: " . mysqli_error($con);
    }

    // Close the database connection
    mysqli_close($con);
}
?>

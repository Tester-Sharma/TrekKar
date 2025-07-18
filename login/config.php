<?php
    session_start();
    
    // Include the database connection file
    include('../connect/connect.php');

    // Retrieve the current date and time
    $currentDateTime = date("Y-m-d H:i:s");

    // Construct SQL query to select posts from post_details table where date and time are less than current date and time
    $sql = "SELECT * FROM post_details WHERE CONCAT(date, ' ', time) < '$currentDateTime'";

    // Execute the SQL query
    $result = mysqli_query($con, $sql);

    // Check if there are any expired posts
    if (mysqli_num_rows($result) > 0) {
        // Iterate through each row in the result set
        while ($row = mysqli_fetch_assoc($result)) {
            $postID = $row['created_post_id'];

            // Delete post from post_details table
            $deletePostQuery = "DELETE FROM post_details WHERE created_post_id = '$postID'";
            mysqli_query($con, $deletePostQuery);

            // Delete corresponding post from my_trek table
            $deleteMyTrekQuery = "DELETE FROM my_trek WHERE post_id = '$postID'";
            mysqli_query($con, $deleteMyTrekQuery);
        }
    }

    // Close the database connection
    mysqli_close($con);

    // Redirect to the home page
    header("Location: http://localhost/trek-kar/home/home.php");
    exit();
?>

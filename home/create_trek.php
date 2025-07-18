<?php
include("../connect/connect.php"); // Include your database connection file

// Start the session
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Retrieve username and user_id from session
    $username = $_SESSION['username'];
    $name = $_SESSION['name'];
    $user_id = $_SESSION['user_id'];
    $city = $_SESSION['city'];
    $profile = $_SESSION['profile'];

    // Retrieve form data
    $date = $_POST['date'];
    $time = $_POST['time'];
    $duration = $_POST['duration'];
    $distance = $_POST['distance'];
    $meetingSpot = $_POST['meetingSpot'];
    $maxMembers = $_POST['maxMembers'];
    $minAge = $_POST['minAge'];
    $maxAge = $_POST['maxAge'];
    $difficulty = $_POST['difficulty'];
    $gender = $_POST['gender'];
    $description = $_POST['description'];
    $today = date("Y-m-d");

    if ($date < $today) {
        // Date is in the past, display an error message and prevent data insertion
        echo '<script>alert("Select a Valid date"); window.location.href = "home.php";</script>';
        exit; // Stop further execution
    }

    // Validate maximum duration: Check if duration is greater than zero
    if ($duration <= 0) {
        // Duration is zero or negative, display an error message and prevent data insertion
        echo '<script>alert("Maximum duration must be greater than zero."); window.location.href = "home.php";</script>';
        exit; // Stop further execution
    }

    // Validate maximum distance: Check if distance is greater than zero
    if ($distance <= 0) {
        // Distance is zero or negative, display an error message and prevent data insertion
        echo '<script>alert("Maximum distance must be greater than zero."); window.location.href = "home.php";</script>';
        exit; // Stop further execution
    }
    
    // Validate maximum Member
    if ($maxMembers <= 0) {
        // Members is zero or negative, display an error message and prevent data insertion
        echo '<script>alert("Maximum Members must be greater than zero."); window.location.href = "home.php";</script>';
        exit; // Stop further execution
    }
    
    // Maximum age must be greater than minimum age
    if ($maxAge < $minAge) {
        echo '<script>alert("Invalid Age Group !"); window.location.href = "home.php";</script>';
        exit; // Stop further execution
    }

    // Insert data into the database
    $insertQuery = "INSERT INTO post_details (user_id, username,name,profile,city, time,date, description ,intensity,duration,distance,meetup_point,gender,min_age,max_age,max_member) VALUES ('$user_id', '$username', '$name','$profile','$city','$time','$date','$description','$difficulty','$duration','$distance','$meetingSpot','$gender','$minAge','$maxAge','$maxMembers')";

    if (mysqli_query($con, $insertQuery)) {
        // Data inserted successfully
        header("Location: home.php");
        exit;
        // echo '<script>alert("Post created successfully!");</script>'; 
        // echo 'window.location.href = "home.php";</script>';
    } else {
        // Error occurred while inserting data
        echo '<script>alert("Error occurred. Please try again.");';
        echo 'window.location.href = "home.php";</script>';
    }
}

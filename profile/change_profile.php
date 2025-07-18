<?php
session_start();

// Include the database connection file
include('../connect/connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Check if profile picture was uploaded
    if (!empty($_FILES['fileToUpload']['name'])) {

        // Handle file upload logic
        $targetDir = "../uploads/";
        $fileName = $_FILES["fileToUpload"]["name"];
        $fileTmpName = $_FILES["fileToUpload"]["tmp_name"];
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

        // Allow certain file formats
        $allowTypes = array('jpg', 'png', 'jpeg');

        if (in_array($fileType, $allowTypes)) {

            // Move uploaded file to target directory
            $newFileName = "Image_" . uniqid() . "." . $fileType;
            $targetFilePath = $targetDir . $newFileName;

            if (move_uploaded_file($fileTmpName, $targetFilePath)) {

                // Update session with new profile picture filename
                $_SESSION['profile'] = $newFileName;

                // Get old profile picture filename from user_detail table
                $user_id = $_SESSION['user_id'];
                $getUserQuery = "SELECT profile_pic FROM user_detail WHERE user_id = '$user_id'";
                $result = mysqli_query($con, $getUserQuery);
                $row = mysqli_fetch_assoc($result);
                $oldFileName = $row['profile_pic'];

                // Update profile picture filename in user_detail table
                $updateUserQuery = "UPDATE user_detail SET profile_pic = '$newFileName' WHERE user_id = '$user_id'";
                mysqli_query($con, $updateUserQuery);

                // Update profile picture filename in post_details table
                $updatePostQuery = "UPDATE post_details SET profile = '$newFileName' WHERE user_id = '$user_id' AND profile = '$oldFileName'";
                mysqli_query($con, $updatePostQuery);

                // Update profile picture filename in my_trek table
                $updateMyTrekQuery = "UPDATE my_trek SET profile = '$newFileName' WHERE user_id = '$user_id' AND profile = '$oldFileName'";
                mysqli_query($con, $updateMyTrekQuery);

                // Redirect to userprofile.php
                header("Location: http://localhost/trek-kar/profile/userprofile.php");
                exit();
            } else {
                // Error handling for file upload
                echo '<script>alert("Sorry, there was an error uploading your file.");';
                echo 'window.location.href = "http://localhost/trek-kar/profile/userprofile.php";</script>';
                exit(); // Stop further execution
            }
        } else {
            // Invalid file type
            echo '<script>alert("Sorry, only JPG, JPEG, PNG files are allowed.");';
            echo 'window.location.href = "http://localhost/trek-kar/profile/userprofile.php";</script>';
            exit(); // Stop further execution
        }
    } else {
        // If no profile picture was uploaded, show an alert and redirect
        echo '<script>alert("Please select a file to upload.");';
        echo 'window.location.href = "http://localhost/trek-kar/profile/userprofile.php";</script>';
        exit(); // Stop further execution
    }
} else {
    // If accessed without form submission, redirect to userprofile.php
    header("Location: http://localhost/trek-kar/profile/userprofile.php");
    exit();
}

// Close the database connection
mysqli_close($con);

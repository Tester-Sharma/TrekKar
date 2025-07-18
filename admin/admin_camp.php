<?php
// Include database connection file
include("../connect/connect.php");

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form data
    $username = mysqli_real_escape_string($con, $_POST['user-name']);
    $name = mysqli_real_escape_string($con, $_POST['host-name']);
    $altitude = mysqli_real_escape_string($con, $_POST['altitude']);
    $location = mysqli_real_escape_string($con, $_POST['camp-location']);
    $intensity = mysqli_real_escape_string($con, $_POST['intensity']);
    $stay = mysqli_real_escape_string($con, $_POST['time']);
    $date = mysqli_real_escape_string($con, $_POST['date']);
    $gender = mysqli_real_escape_string($con, $_POST['gender']);
    $min_age = mysqli_real_escape_string($con, $_POST['min_age']);
    $max_age = mysqli_real_escape_string($con, $_POST['max_age']);
    $max_members = mysqli_real_escape_string($con, $_POST['member']);
    $price = mysqli_real_escape_string($con, $_POST['price']);
    $description = mysqli_real_escape_string($con, $_POST['camp-description']);

    // Directory to store the camp images
    $target_dir = "../camp/camp_image/";

    // Generate new filename using the location as the identifier
    $modified_filename = $location . ".jpg";

    // Get the temporary file path of the uploaded camp image
    $temp_camp_image_path = $_FILES["camp-image"]["tmp_name"];

    // Final path to move the uploaded image
    $final_camp_image_path = $target_dir . $modified_filename;

    // Check if the camp image was uploaded successfully and move it
    if (move_uploaded_file($temp_camp_image_path, $final_camp_image_path)) {
        // Insert data into the database
        $sql = "INSERT INTO camp (username, name, altitude, location, intensity, stay, date, gender, min_age, max_age, max_members, image, price, description) 
                VALUES ('$username', '$name', '$altitude', '$location', '$intensity', '$stay', '$date', '$gender', '$min_age', '$max_age', '$max_members', '$modified_filename', '$price', '$description')";

        if (mysqli_query($con, $sql)) {
            echo "New camp added successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }
    } else {
        echo "Sorry, there was an error uploading your image.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Trekkar</title>
    <link rel="stylesheet" href="admin.css"> <!-- Link to your CSS -->
</head>
<body>
    <div class="admin-panel">
        <header>
            <h1>Admin Panel</h1>
            <img class="banner" src="banner.png">
        </header>

        <nav> <!--nav bar-->
            <ul>
                <li><a href="#" target="_self"> CAMP </a></li>
                <li><a href="http://localhost/trek-kar/admin/admin_activity.php" target="_self"> ACTIVITY</a></li>
                <li><a href="http://localhost/trek-kar/admin/admin_explore.php" target="_self"> EXPLORER</a></li>
            </ul>
        </nav>

        <div class="dashboard">
            <h2>Dashboard</h2>
            <div class="stats">
                <p>Total Treks: <span id="total-treks">0</span></p>
                <p>Total Camps: <span id="total-camps">0</span></p>
                <p>Total Explorers: <span id="total-explorers">0</span></p>
            </div>
        </div>

        <div class="create-section">
            <h2>Create Camp</h2>
            <form id="create-camp-form" method="POST" enctype="multipart/form-data">
                <label for="user-name">User Name:</label>
                <input type="text" name="user-name" id="user-name" required>

                <label for="host-name">Host Name:</label>
                <input type="text" name="host-name" id="host-name" required>

                <label for="altitude">Altitude:</label>
                <input type="text" name="altitude" id="altitude" required>

                <label for="camp-location">Location:</label>
                <input type="text" name="camp-location" id="camp-location" required>

                <label for="intensity">Intensity:</label>
                <input type="text" name="intensity" id="intensity" required>

                <label for="time">Time period:</label>
                <input type="text" name="time" id="time" required>

                <label for="date">Date:</label>
                <input type="date" name="date" id="date" required>

                <label for="gender">Gender:</label>
                <input type="text" name="gender" id="gender" required>

                <label for="min_age">Minimum Age:</label>
                <input type="number" name="min_age" id="min_age" placeholder="min-age" required>

                <label for="max_age">Maximum Age:</label>
                <input type="number" name="max_age" id="max_age" placeholder="max-age" required>

                <label for="member">Maximum Member:</label>
                <input type="number" name="member" id="member" required>

                <label for="camp-image">Upload camp Image:</label>
                <input type="file" name="camp-image" id="camp-image" required>

                <label for="price">Price:</label>
                <input type="number" name="price" id="price" required>

                <label for="camp-description">Description:</label>
                <textarea name="camp-description" id="camp-description" required></textarea>

                <button type="submit">CREATE CAMP</button>
            </form>
        </div>

        <div class="manage-entries">
            <h2>Manage Entries</h2>
            <div class="camp-list">
                <h3>Existing Camps</h3>
                <ul id="camp-list">
                    <!-- List of camps will be populated here -->
                </ul>
            </div>

            <div class="explorer-list">
                <h3>Existing Explorers</h3>
                <ul id="explorer-list">
                    <!-- List of explorers will be populated here -->
                </ul>
            </div>
        </div>
    </div>

    <script src="script.js"></script> <!-- Link to your JavaScript -->
</body>
</html>

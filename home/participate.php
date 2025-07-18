
    <?php
    // Include the database connection file
    include('../connect/connect.php');

    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Start the session
        session_start();

        // Collect form data
        $created_postid = $_POST['created_postid'];
        $user_id = $_SESSION['user_id'];
        $user_gender = $_SESSION['gender'];
        $member_count = $_POST['member_count'];
        $username = $_POST['username'];
        $name = $_POST['name'];
        $profile = $_POST['profile'];
        $city = $_POST['city'];
        $time = $_POST['time'];
        $date = $_POST['date'];
        $description = $_POST['description'];
        $intensity = $_POST['intensity'];
        $duration = $_POST['duration'];
        $distance = $_POST['distance'];
        $meetup_point = $_POST['meetup'];
        $gender = $_POST['gender'];
        $min_age = $_POST['minage'];
        $max_age = $_POST['maxage'];
        $max_member = $_POST['maxmember'];

        // Increment member count by one
        $member_count++;

        // Check if member count exceeds max member
        if ($member_count > $max_member) {
            echo '<script>alert("Maximum member count reached for this trek.");';
            echo 'window.location.href = "http://localhost/trek-kar/home/home.php";</script>';
            exit();
        }


        // // Check if user's gender matches post gender
        // if ($user_gender == 'other') {
        //     // If post gender requirement is not "male-female"
        //     if ($post_gender != 'anyone') {
        //         echo '<script>alert("Your gender does not match the requirements for this trek.");';
        //         echo 'window.location.href = "http://localhost/trek-kar/home/home.php";</script>';
        //         exit();
        //     }
        // }
        // // If post gender requirement is "male-female", allow participation

        // if ($user_gender != $gender) {
        //     echo '<script>alert("Your gender does not match the requirements for this trek.");';
        //     // echo 'window.location.href = "http://localhost/trek-kar/home/home.php";</script>';
        //     exit();
        // }


        // Convert date from dd/mm/yyyy format to yyyy/mm/dd format
        $dateParts = explode('/', $date);
        $date = $dateParts[2] . '-' . $dateParts[1] . '-' . $dateParts[0];

        if ($gender == 'anyone') {

            // Check if the same post ID already exists in my_trek
            $check_post_query = mysqli_query($con, "SELECT post_id FROM my_trek WHERE post_id='$created_postid'AND user_id='$user_id'");

            if (mysqli_num_rows($check_post_query) == 0) {
                // Insert data into my_trek table
                $insert_query = "INSERT INTO my_trek (post_id, user_id, member_count, username, name, profile, city, time, date, description, intensity, duration, distance, meetup_point, gender, min_age, max_age, max_member) VALUES ('$created_postid', '$user_id', '$member_count', '$username', '$name', '$profile', '$city', '$time', '$date', '$description', '$intensity', '$duration', '$distance', '$meetup_point', '$gender', '$min_age', '$max_age', '$max_member')";

                if (mysqli_query($con, $insert_query)) {

                    $update_post_query = "UPDATE post_details SET member_count = '$member_count' WHERE created_post_id = '$created_postid'";
                    mysqli_query($con, $update_post_query);

                    // Successfully participated, redirect to a success page or do something else
                    header("location: http://localhost/trek-kar/mytrek/mytrek.php");
                    exit();
                } else {
                    // Handle error if insertion fails
                    echo "Error inserting record: " . mysqli_error($con);
                }
            } else {
                // Post ID already exists in my_trek, show an alert or redirect back to the page
                echo '<script>alert("You have already participated in this trek.");';
                echo 'window.location.href = "http://localhost/trek-kar/home/home.php";</script>';
            }
        } else {

            if ($gender != $user_gender) {
                echo '<script>alert("Your gender does not match the requirements for this trek.");';
                echo 'window.location.href = "http://localhost/trek-kar/home/home.php";</script>';
                exit();
            } else {
                // Check if the same post ID already exists in my_trek
                $check_post_query = mysqli_query($con, "SELECT post_id FROM my_trek WHERE post_id='$created_postid'AND user_id='$user_id'");

                if (mysqli_num_rows($check_post_query) == 0) {
                    // Insert data into my_trek table
                    $insert_query = "INSERT INTO my_trek (post_id, user_id, member_count, username, name, profile, city, time, date, description, intensity, duration, distance, meetup_point, gender, min_age, max_age, max_member) VALUES ('$created_postid', '$user_id', '$member_count', '$username', '$name', '$profile', '$city', '$time', '$date', '$description', '$intensity', '$duration', '$distance', '$meetup_point', '$gender', '$min_age', '$max_age', '$max_member')";

                    if (mysqli_query($con, $insert_query)) {

                        $update_post_query = "UPDATE post_details SET member_count = '$member_count' WHERE created_post_id = '$created_postid'";
                        mysqli_query($con, $update_post_query);

                        // Successfully participated, redirect to a success page or do something else
                        header("location: http://localhost/trek-kar/mytrek/mytrek.php");
                        exit();
                    } else {
                        // Handle error if insertion fails
                        echo "Error inserting record: " . mysqli_error($con);
                    }
                } else {
                    // Post ID already exists in my_trek, show an alert or redirect back to the page
                    echo '<script>alert("You have already participated in this trek.");';
                    echo 'window.location.href = "http://localhost/trek-kar/home/home.php";</script>';
                }
            }
        }
        // Close the database connection
        mysqli_close($con);
    }
    ?>

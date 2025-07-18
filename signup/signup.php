<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Signup</title>
  <link rel="stylesheet" href="signup.css" />
</head>

<body>
  <div class="screen">
    <div class="container">
      <div class="logo">
        <img src="http://localhost/trek-kar/images/banner.png" alt="" />
      </div>

      <?php
      include("../connect/connect.php");
      if (isset($_POST['signup'])) {

        $username = $_POST['username'];
        $password = $_POST['password'];
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $email = $_POST['email'];
        $name = $_POST['name'];
        $city = $_POST['city'];
        $gender = $_POST['gender'];
        $age = $_POST['age'];

        // Check if profile picture was uploaded
        if (!empty($_FILES['profile']['name'])) {

          // Handle file upload logic
          $targetDir = "../uploads/";
          $fileName = $_FILES["profile"]["name"];
          $fileTmpName = $_FILES["profile"]["tmp_name"];
          $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

          // Allow certain file formats
          $allowTypes = array('jpg', 'png', 'jpeg');

          if (in_array($fileType, $allowTypes)) {

            // Move uploaded file to target directory
            $newFileName = "Image_" . uniqid() . "." . $fileType;
            $targetFilePath = $targetDir . $newFileName;

            if (move_uploaded_file($fileTmpName, $targetFilePath)) {

              // Insert user details with uploaded image filename into database
              $profilePic = $newFileName;
            } else {

              // Error handling for file upload
              echo '<script>alert("Sorry, there was an error uploading your file.");';
              echo 'window.location.href = "signup.php";</script>';
              exit; // Stop further execution
            }
          } else {

            // Invalid file type
            echo '<script>alert("Sorry, only JPG, JPEG, PNG files are allowed.");';
            echo 'window.location.href = "signup.php";</script>';
            exit; // Stop further execution
          }
        } else {

          // If no profile picture was uploaded, use the default image filename
          $profilePic = "default.jpg";
        }

        // Check for existing email and username
        $verify_query_email = mysqli_query($con, "SELECT email FROM user_detail WHERE email='$email'");
        $verify_query_username = mysqli_query($con, "SELECT username FROM user_detail WHERE username='$username'");

        if (mysqli_num_rows($verify_query_email) != 0) {

          echo '<script>alert("Email already used, please try another one.");';
          echo 'window.location.href = "signup.php";</script>';
          exit; // Stop further execution
        } elseif (mysqli_num_rows($verify_query_username) != 0) {

          echo '<script>alert("Username already used, please try another one.");';
          echo 'window.location.href = "signup.php";</script>';
          exit; // Stop further execution

        } else {

          // Insert user details into database
          $insert = mysqli_query($con, "INSERT INTO user_detail (username, password, email, name,gender,age, city, profile_pic) VALUES ('$username', '$hashed_password', '$email', '$name', '$gender' , '$age' , '$city', '$profilePic')");

          if ($insert) {
            echo '<script>alert("Signup Successful!");';
            echo 'window.location.href = "http://localhost/trek-kar/login/login.php";</script>';
          } else {
            echo '<script>alert("Error occurred. Please try again.");';
            echo 'window.location.href = "signup.php";</script>';
          }
        }
      } else {
      ?>
        <form action="" method="post" enctype="multipart/form-data">

          <div class="image">
            <label for="file-upload" class="profile">
              <img src="http://localhost/trek-kar/svg_icon/profile.svg" />
              Upload profile
            </label>
            <input type="file" id="file-upload" id="profile" name="profile" accept="image/*" />
          </div>
          <div class="field">
            <input type="text" placeholder="Full Name" required name="name" />
            <img src="http://localhost/trek-kar/svg_icon/fullname.svg" class="svg" alt="" />
          </div>
          <div class="field">
            <input type="text" placeholder="UserName" required name="username" />
            <img src="http://localhost/trek-kar/svg_icon/User.svg" class="svg" alt="" />
          </div>
          <div class="field">
            <input type="password" placeholder="Password" required name="password" />
            <img src="http://localhost/trek-kar/svg_icon/passkey.svg" class="svg" alt="" />
          </div>
          <div class="field">
            <input type="number" placeholder="Age" name="age" min="0" required />
            <img src="http://localhost/trek-kar/svg_icon/calendar.svg" class="svg" alt="" />
          </div>

          <div class="field">
            <input type="email" placeholder="E-mail" required name="email" />
            <img src="http://localhost/trek-kar/svg_icon/email.svg" class="svg" alt="" />
          </div>
          <div class="field">
            <select id="stateSelect" class="selector" name="city" required>
              <option value="" selected="selected">Select a city</option>
              <option value="jaipur">Jaipur</option>
              <option value="jodhpur">Jodhpur</option>
              <option value="udaipur">Udaipur</option>
              <option value="banglore">Banglore</option>
            </select>
            <img src="http://localhost/trek-kar/svg_icon/location.svg" class="svg" alt="" />
          </div>
          <div class="field">
            <select id="genderSelect" class="selector" name="gender" required>
              <option value="" selected="selected">Select a gender</option>
              <option value="male">Male</option>
              <option value="female">Female</option>
              <option value="other">Other</option>
            </select>
            <img src="http://localhost/trek-kar/svg_icon/gender_white.svg" class="svg" alt="" />

          </div>


          <div class="Signup">
            <input type="submit" value="SIGNUP" name="signup" />
          </div>
        </form>
        <div class="login">
          Already have an account?
          <a href="http://localhost/trek-kar/login/login.php">Login</a>
        </div>
    </div>
  <?php } ?>
  </div>
</body>

</html>
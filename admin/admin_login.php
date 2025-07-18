<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Login</title>
  <link rel="stylesheet" href="admin_login.css" />
</head>

<body>
  <div class="screen">
    <div class="container">
      <div class="logo">
        <img src="http://localhost/trek-kar/images/banner.png" alt="" />
      </div>
      <?php

      include("../connect/connect.php");

      if (isset($_POST['login'])) {

        $username = $_POST['username'];
        $password = $_POST['password'];

        // Retrieve hashed password from the database for admin_details table
        $result = mysqli_query($con, "SELECT * FROM admin_details WHERE username='$username'") or die("Select Error");
        $row = mysqli_fetch_assoc($result);
      
        if (is_array($row) && !empty($row)) {
          // Compare the entered password with the stored hashed password
          if ($password == $row['password']) {
            // // Passwords match, set session variables and redirect to admin.php page
            // $_SESSION['admin_id'] = $row['admin_id'];
            // $_SESSION['username'] = $row['username'];
            // $_SESSION['name'] = $row['name'];

            // Redirect to admin.php
            header("Location: admin_camp.php");
            exit;
          } else {
            // Passwords don't match, display error message
            echo '<script>alert("Wrong Username or Password!");';
            echo 'window.location.href = "admin_login.php";</script>';
          }
        } else {
          // Username not found in database, display error message
          echo '<script>alert("Wrong Username or Password!");';
          echo 'window.location.href = "admin_login.php";</script>';
        }
      }

      ?>
      <form action="" method="post">
        <div class="field">
          <input type="text" placeholder="Username" required name="username" />
          <img src="http://localhost/trek-kar/svg_icon/User.svg" class="svg" alt="" />
        </div>
        <div class="field">
          <input type="password" placeholder="Password" required name="password" />
          <img src="http://localhost/trek-kar/svg_icon/passkey.svg" alt="" class="svg" />
        </div>
        <div class="forget">
          <a href="#">Forgot Password ?</a>
        </div>
        <div class="login">
          <input type="submit" value="LOGIN" name="login" />
        </div>
      </form>
    </div>
  </div>
</body>

</html>
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
  <link rel="stylesheet" href="login.css" />
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

        $username = mysqli_real_escape_string($con, $_POST['username']);
        $password = mysqli_real_escape_string($con, $_POST['password']);

        // Retrieve hashed password from the database
        $result = mysqli_query($con, "SELECT * FROM user_detail WHERE username='$username'") or die("Select Error");
        $row = mysqli_fetch_assoc($result);

        if (is_array($row) && !empty($row)) {
          // Compare the entered password with the stored hashed password
          if (password_verify($password, $row['password'])) {
            // Passwords match, set session variables and redirect to home page
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['gender'] = $row['gender'];
            $_SESSION['city'] = $row['city'];
            $_SESSION['age'] = $row['age'];
            $_SESSION['profile'] = $row['profile_pic'];

            // Redirect to home page
            header("Location: http://localhost/trek-kar/login/config.php");
            exit();
          } else {
            // Passwords don't match, display error message
            echo '<script>alert("Wrong Username or Password !");';
            echo 'window.location.href = "login.php";</script>';
          }
        } else {
          // Username not found in database, display error message
          echo '<script>alert("Wrong Username or Password !");';
          echo 'window.location.href = "login.php";</script>';
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
      <div class="signup">
        <p>Don't have an account ?
          <a href="http://localhost/trek-kar/signup/signup.php">Signup</a>
        </p>
      </div>
    </div>
  </div>
</body>

</html>

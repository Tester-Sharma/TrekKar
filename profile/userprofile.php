<?php
session_start();

if (!isset($_SESSION['user_id'])) {
  header("Location: http://localhost/trek-kar/login/login.php");
}

// get data from database and dyanmically print
include("../connect/connect.php");
$selectedCity = $_GET['city'] ?? $_SESSION['city'];
$current_user_id = $_SESSION['user_id'];
$result = mysqli_query($con, "SELECT * FROM post_details WHERE city = '$selectedCity' AND user_id = '$current_user_id' ") or die("Select Error");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>trekkar-PROFILE</title>
  <link rel="stylesheet" href="userprofile.css" />

  <link rel="icon" href="http://localhost/trek-kar/images/icon.png">
</head>

<body>

 <div class="upper"> <!--itss upper section -->
    <div class="mountain1"><img src="http://localhost/trek-kar/images/mountain1.png"></div>
    <div class="bird"><img src="http://localhost/trek-kar/images/bird.png" id="bird"></div>
    <div class="mountain2"><img src="http://localhost/trek-kar/images/mountain2 1.png" id="mountain2"></div>
    <div class="mountain3"><img src="http://localhost/trek-kar/images/mountain3.png"> </div>
    <div class="banner"> <img src="http://localhost/trek-kar/images/banner.png"> </div>
    <div class="upgrad"></div>
  </div>
  <nav> <!--nav baar-->
    <ul>
      <li><a href="http://localhost/trek-kar/home/home.php" target="_self"> HOME </a></li>
      <li><a href="http://localhost/trek-kar/group/group.php" target="_self"> GROUP </a></li>
      <li><a href="http://localhost/trek-kar/mytrek/mytrek.php" target="_self"> MY TREK </a></li>
      <li><a href="http://localhost/trek-kar/explorer/explorer.php" target="_self"> EXPLORER</a></li>
      <li><a href="http://localhost/trek-kar/camp/camp.php" target="_self"> CAMP </a></li>
      <li><a href="http://localhost/trek-kar/activity/activity.php" target="_self"> ACTIVITY </a></li>
    </ul>
  </nav>

  <!-- EDIT PROFILE MODAL  -->
  <form action="update.php" method="POST">
    <div class="editprofile" id="edit-modal">
      <h1>Profile Edit</h1>
      <div class="editline"></div>
      <div class="editinfo">
        <!-- Row 1 -->
        <div class="edititem">
          <p class="edittitle">User Name</p><input type="text" name="username">
        </div>
        <div class="edititem">
          <p class="edittitle">Name</p><input type="text" name="name">
        </div>
        <!-- Row 2 -->
        <div class="edititem">
          <p class="edittitle">E-mail</p><input type="email" name="email">
        </div>
        <div class="edititem">
          <p class="edittitle">Gender</p><input type="text" name="gender">
        </div>
        <!-- Row 3 -->
        <div class="edititem">
          <p class="edittitle">City</p><input type="text" name="city">
        </div>
        <div class="edititem"><br><a id="open-modal-change">Change Password</a><br><input type="submit" class="update" value="Update"></div>
      </div>
      <div id="close-modal-edit" class="close">x</div>
    </div>
  </form>

  <div id="edit-backdrop"></div>
  <!-- EDIT PROFILE MODAL WINDOW END -->

  <!-- CHANGE PASSWORD MODAL -->
  <div class="password" id="change-modal">
    <form action="update_password.php" method="POST">
      <div class="passinfo">
        <div class="passitem"><input type="text" name="old_password" placeholder="Old Password"></div>
        <div class="passitem"><input type="text" name="new_password" placeholder="New Password"></div>
        <div class="passitem"><input type="text" name="confirm_password" placeholder="Re-enter New Password"></div>
        <input type="submit" class="change" value="CHANGE">
      </div>
    </form>
    <div id="close-modal-change" class="close">x</div>
  </div>
  <div id="change-backdrop"></div>
  <!-- CHANGE PASSWORD MODAL WINDOW END -->


  <div class="profileuser">
    <h1>Profile</h1>
    <div class="edit" id="open-modal-edit">
      <img src="http://localhost/trek-kar/svg_icon/edit.svg" alt="Edit Icon">
    </div>
    <div class="line"></div>
    <form id="profileForm" action="change_profile.php" method="post" enctype="multipart/form-data" onchange="this.submit()">
      <div class="profile-pic" style="background-image: url('../uploads/<?php echo $_SESSION['profile']; ?>')">
        <label for="fileToUpload">
          <span class="glyphicon glyphicon-camera"></span>
          <span>Change Profile</span>
        </label>
        <input type="file" name="fileToUpload" id="fileToUpload">
      </div>
    </form>

    <div class="info">
      <!-- Row 1 -->
      <div class="item">
        <p class="title"> User Name</p>
        <p class="profilename"><?php echo  $_SESSION['username']; ?></p>
      </div>
      <div class="item">
        <p class="title">Name</p>
        <p class="profilename"><?php echo  $_SESSION['name']; ?></p>
      </div>
      <!-- Row 2 -->
      <div class="item">
        <p class="title">E-mail</p>
        <p class="profilename"><?php echo  $_SESSION['email']; ?></p>
      </div>
      <div class="item">
        <p class="title"> Gender</p>
        <p class="profilename"><?php echo  $_SESSION['gender']; ?></p>
      </div>
      <!-- Row 3 -->
      <div class="item">
        <p class="title">City</p>
        <p class="profilename"><?php echo  $_SESSION['city']; ?></p>
      </div>
      <div class="item"><br><a href="logout.php"><button class="logout">LOG-OUT</button></a></div>
    </div>
  </div>
  </div>

  <h1 class="heading"> YOUR TREK</h1>

  <div class="wrapper">
    <div class="boxout"> <!--boxout is grid layout that help to create flash card-->
      <?php
      while ($row = mysqli_fetch_assoc($result)) {

        // $post[]=$row;

        $post_id = $row['created_post_id'];
        // getting time in HH:MM am/pm format
        $time = mysqli_query($con, "SELECT DATE_FORMAT(time, '%h:%i %p') AS ftime FROM post_details where created_post_id = '$post_id ' ");
        $time = mysqli_fetch_assoc($time);
        $time = $time['ftime'];

        // getting date in dd/mm/yyyy format
        $date = mysqli_query($con, "SELECT DATE_FORMAT(date, '%d/%m/%Y') AS fdate FROM post_details where created_post_id = '$post_id ' ");
        $date = mysqli_fetch_assoc($date);
        $date = $date['fdate'];

        $name = $row['name'];
        $username = $row['username'];
        $description = $row['description'];
        $distance = $row['distance'];
        $intensity = $row['intensity'];
        $duration = $row['duration'];
        $meetup_point = $row['meetup_point'];
        $gender = $row['gender'];
        $min_age = $row['min_age'];
        $max_age = $row['max_age'];
        $max_member = $row['max_member'];
        $profile = $row['profile'];
        $member_count = $row['member_count'];
        $postid = $row['created_post_id'];
      ?>
        <div class="boxin"> <!--boxin is main flash card with grid property-->
          <div class="profile"> <!--profile section contain userr info-->
            <img src="../uploads/<?php echo $profile; ?>">
            <div class="utext">
              <p class="name"><?php echo $name; ?></p>
              <p class="username"><?php echo $username; ?></p>
            </div>
          </div>
          <div class="mininfo"> <!--a simple svg quick info-->
            <div class="mode"><img src="http://localhost/trek-kar/svg_icon/<?php echo $intensity; ?>.svg">
              <p class="txtmode"><?php echo $intensity; ?></p>
            </div>
            <div class="span"><img src="http://localhost/trek-kar/svg_icon/sandclock.svg">
              <p class="duration"><?php echo $duration; ?> Hr</p>
            </div>
            <div class="range"><img src="http://localhost/trek-kar/svg_icon/flag.svg">
              <p class="rangetxt"><?php echo $distance; ?> Km</p>
            </div>
            <div class="checkpoint"><img src="http://localhost/trek-kar/svg_icon/scope.svg">
              <p class="poimt"><?php echo $meetup_point; ?></p>
            </div>
            <div class="genderselect"><img src="http://localhost/trek-kar/svg_icon/gender.svg">
              <p class="gender"><?php echo $gender; ?></p>
            </div>
            <div class="age"><img src="http://localhost/trek-kar/svg_icon/age-group.svg">
              <p class="agegrp"><?php echo $min_age; ?>-<?php echo $max_age; ?></p>
            </div>
            <div class="max"><img src="http://localhost/trek-kar/svg_icon/max-people.svg">
              <p class="maxmember"><?php echo $member_count; ?>/<?php echo $max_member; ?> Members</p>
            </div>
          </div>
          <div class="time-grid"> <!--display time wiyth svg-->
            <div class="time"><img src="http://localhost/trek-kar/svg_icon/clock.svg">
              <p class="time-digit"><?php echo $time; ?></p>
            </div>
            <div class="date">
              <p class="date-digit"><?php echo $date; ?></p>
            </div>
          </div>
          <div></div>
          <div class="descr"> <!--description-->
            <p class="description"> <?php echo $description; ?> </p>
          </div>
          <form action="http://localhost/trek-kar/profile/delete.php" method="post">
            <div class="click"> <!--button-->
              <input type="hidden" name="postid" value="<?php echo $postid; ?>">
              <button type="submit" class="delete">DELETE</button>
            </div>
          </form>
        </div>
      <?php } ?>


    </div>
  </div>

  <div class="footer">
    <div class="footbg"><img src="http://localhost/trek-kar/svg_icon/footer.svg"></div>
    <div class="help">
      <p class="foottxt"> Meaning ? </p>
      <div></div>
      <div class="fmode"><img src="http://localhost/trek-kar/svg_icon/hard.svg">
        <p class="ftxt">HARD</p>
      </div>
      <div class="fmode"><img src="http://localhost/trek-kar/svg_icon/moderate.svg">
        <p class="ftxt">MODERATE</p>
      </div>
      <div class="fmode"><img src="http://localhost/trek-kar/svg_icon/easy.svg ">
        <p class="ftxt">EASY</p>
      </div>
      <div class="fmode"><img src="http://localhost/trek-kar/svg_icon/sandclock white.svg">
        <p class="ftxt">Approx time</p>
      </div>
      <div class="fmode"><img src="http://localhost/trek-kar/svg_icon/age-group-white.svg">
        <p class="ftxt">Age group </p>
      </div>
      <div class="fmode"><img src="http://localhost/trek-kar/svg_icon/flag white.svg">
        <p class="ftxt">Trek range</p>
      </div>
      <div class="fmode"><img src="http://localhost/trek-kar/svg_icon/scope white.svg">
        <p class="ftxt">Meeting point</p>
      </div>
      <div class="fmode"><img src="http://localhost/trek-kar/svg_icon/max-people-white.svg">
        <p class="ftxt">Maximum people on trek</p>
      </div>
      <div class="fmode"><img src="http://localhost/trek-kar/svg_icon/gender white.svg">
        <p class="ftxt">Gender</p>
      </div>
      <div class="fmode"><img src="http://localhost/trek-kar/svg_icon/clock-white.svg">
        <p class="ftxt">Time of trek</p>
      </div>
    </div>
    <div class="about">
      <p class="foottxt">About Us</p>
      <div class="social">
        <a href=""><img src="http://localhost/trek-kar/images/instagram.png"></a>
        <a href=""><img src="http://localhost/trek-kar/images/facebook.png"></a>
        <a href=""><img src="http://localhost/trek-kar/images/twitter.png"></a>
      </div>
    </div>
    <div class="whatsapp"><a href=""><img src="http://localhost/trek-kar/svg_icon/whatsapp.svg"></a></div>
    <p class="copyright">© 2024 trekaar.com</p>

  </div>
  <!-- <script src="userprofile.js"></script> -->
  <script src="edit_profile.js"></script>
  <script src="change_pass.js"></script>
</body>

</html>
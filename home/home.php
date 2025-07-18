<?php
session_start();

if (!isset($_SESSION['user_id'])) {
  header("Location: http://localhost/trek-kar/login/login.php");
}


// get data from database and dyanmically print
include("../connect/connect.php");
$selectedCity = $_GET['city'] ?? $_SESSION['city'];
$current_user_id = $_SESSION['user_id'];
$result = mysqli_query($con, "SELECT * FROM post_details WHERE city = '$selectedCity' AND user_id != '$current_user_id' ORDER BY RAND()") or die("Select Error");

$countQuery = "SELECT COUNT(*) AS count FROM post_details WHERE user_id != '$current_user_id'";
$countResult = mysqli_query($con, $countQuery);
$countRow = mysqli_fetch_assoc($countResult);
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>trekkar-HOME</title>
  <link rel="stylesheet" href="home.css" />
  <script src="home_banner_animation.js"></script>
  <link rel="icon" href="http://localhost/trek-kar/images/icon.png">
</head>

<body>

  <div class="location">
    <img src="http://localhost/trek-kar/svg_icon/location.svg">
    <form method="GET" action="home.php" id="state">
      <select id="stateSelect" onchange=" this.form.submit()" class="selector" name="city">
        <option value="" selected="selected"><?php echo $selectedCity ?></option>
        <option value="jaipur">Jaipur</option>
        <option value="jodhpur">Jodhpur</option>
        <option value="udaipur">Udaipur</option>
        <option value="banglore">Banglore</option>
      </select>
    </form>
  </div>
  <div class="upper"> <!--itss upper section -->
    <div class="user"><a href="http://localhost/trek-kar/profile/userprofile.php"><img src="../uploads/<?php echo $_SESSION['profile']; ?>"></a></div>
    <div class="weather" id="weather"></div>
    <div class="mountain1"><img src="http://localhost/trek-kar/images/mountain1.png"></div>
    <div class="bird"><img src="http://localhost/trek-kar/images/bird.png" id="bird"></div>
    <div class="mountain2"><img src="http://localhost/trek-kar/images/mountain2 1.png" id="mountain2"></div>
    <div class="mountain3"><img src="http://localhost/trek-kar/images/mountain3.png"> </div>
    <div class="banner"> <img src="http://localhost/trek-kar/images/banner.png"> </div>
    <div class="upgrad"></div>
  </div>
  <nav> <!--nav baar-->
    <ul>
      <li><a href="#" target="_self" id="active"> HOME </a></li>
      <li><a href="http://localhost/trek-kar/group/group.php" target="_self"> GROUP </a></li>
      <li><a href="http://localhost/trek-kar/mytrek/mytrek.php" target="_self"> MY TREK </a></li>
      <li><a href="http://localhost/trek-kar/explorer/explorer.php" target="_self"> EXPLORER</a></li>
      <li><a href="http://localhost/trek-kar/camp/camp.php" target="_self"> CAMP </a></li>
      <li><a href="http://localhost/trek-kar/activity/activity.php" target="_self"> ACTIVITY </a></li>
    </ul>
  </nav>
  <button class="create" id="open-modal"> <!--create trek button with + svg-->
    <img src="http://localhost/trek-kar/svg_icon/plus.svg">
    <div class="crbutton">CREATE TREK</div>
  </button>

  <!-- CREATE TREK MODAL WINDOW START -->
  <div id="modal">

    <form action="create_trek.php" method="post" id="trekForm">
      <div class="form-group">
        <label for="date">Date:</label>
        <input type="date" id="date" name="date" required>
      </div>
      <div class="form-group">
        <label for="time">Time:</label>
        <input type="time" id="time" name="time" required>
      </div>
      <div class="form-group">
        <label for="duration">Max Duration (hours):</label>
        <input type="number" id="duration" name="duration" min="0" required>
      </div>

      <div class="form-group">
        <label for="distance">Approx Distance (Km) :</label>
        <input type="number" id="distance" name="distance" min="0" required>
      </div>
      <div class="form-group">
        <label for="meetingSpot">Meeting Spot:</label>
        <input type="text" id="meetingSpot" name="meetingSpot" required>
      </div>
      <div class="form-group">
        <label for="maxMembers">Maximum Members:</label>
        <input type="number" id="totalMembers" name="maxMembers" min="0" required>
      </div>

      <div class="form-group">
        <label for="ageGroup" id="agelabel">Age Group:</label>
        <input type="number" id="ageGroup" name="minAge" placeholder="min-age" min="0" required><input type="number" id="ageGroup" name="maxAge" placeholder="max-age" min="0" required>
      </div>
      <div class="form-group">
        <label id="difficulty">Difficulty:</label>
        <div class="radio-container">
          <label class="radio"><input type="radio" name="difficulty" value="easy"> Easy</label>
          <label class="radio"><input type="radio" name="difficulty" value="moderate"> Moderate</label>
          <label class="radio"><input type="radio" name="difficulty" value="hard"> Hard</label>
        </div>

        <label id="gender">Gender:</label>
        <div class="radio-container">
          <label class="radio"><input type="radio" name="gender" value="male"> Male</label>
          <label class="radio"><input type="radio" name="gender" value="female"> Female</label>
          <label class="radio"><input type="radio" name="gender" value="anyone">Anyone</label>
        </div>
      </div>
      <div class="form-group">
        <label for="description">Description:</label>
        <textarea id="description" name="description" rows="5" maxlength="200" required></textarea>
      </div>
      <button type="submit">Post</button>
    </form>
    <div id="close-modal">x</div>
  </div>
  <div id="backdrop"></div>
  <!-- CREATE TREK MODAL WINDOW END -->

  <div class="wrapper">
    <div class="boxout"> <!--boxout is grid layout that help to create flash card-->
      <?php
      {
        if ($countRow['count'] == 0) {
          ?> <img class="no_trek" src="http://localhost/trek-kar/images/no_trek.png" alt="No Treks Available" /> <?php
        }
        else{
      while ($row = mysqli_fetch_assoc($result))
       {
       
        // $post[]=$row;

        $post_id = $row['created_post_id'];

        // getting time in HH:MM am/pm format
        $time = mysqli_query($con, "SELECT DATE_FORMAT(time, '%h:%i %p') AS ftime FROM post_details where created_post_id = '$post_id' ");
        $time = mysqli_fetch_assoc($time);
        $time = $time['ftime'];

        // getting date in dd/mm/yyyy format
        $date = mysqli_query($con, "SELECT DATE_FORMAT(date, '%d/%m/%Y') AS fdate FROM post_details where created_post_id = '$post_id ' ");
        $date = mysqli_fetch_assoc($date);
        $date = $date['fdate'];

        // $created_postid = $row['created_post_id'];
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
        $city = $row['city'];
        $member_count = $row['member_count'];
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
              <p class="maxmember"><?php echo $max_member; ?> Members</p>
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
          <form action="participate.php" method="post">
            <div class="click"> <!--button-->
              <!-- Hidden input to store the post details -->
              <input type="hidden" name="created_postid" value="<?php echo $post_id; ?>">
              <input type="hidden" name="time" value="<?php echo $time; ?>">
              <input type="hidden" name="date" value="<?php echo $date; ?>">
              <input type="hidden" name="name" value="<?php echo $name; ?>">
              <input type="hidden" name="username" value="<?php echo $username; ?>">
              <input type="hidden" name="description" value="<?php echo $description; ?>">
              <input type="hidden" name="distance" value="<?php echo $distance; ?>">
              <input type="hidden" name="intensity" value="<?php echo $intensity; ?>">
              <input type="hidden" name="duration" value="<?php echo $duration; ?>">
              <input type="hidden" name="meetup" value="<?php echo $meetup_point; ?>">
              <input type="hidden" name="gender" value="<?php echo $gender; ?>">
              <input type="hidden" name="minage" value="<?php echo $min_age; ?>">
              <input type="hidden" name="maxage" value="<?php echo $max_age; ?>">
              <input type="hidden" name="maxmember" value="<?php echo $max_member; ?>">
              <input type="hidden" name="profile" value="<?php echo $profile; ?>">
              <input type="hidden" name="city" value="<?php echo $city; ?>">
              <input type="hidden" name="member_count" value="<?php echo $member_count; ?>">

              <button type="submit" class="participate">Participate</button>
            </div>
          </form>

        </div>
        <?php } }}?>


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


  <script src="create_trek.js"></script>
  <script src="weather.js"></script>
  <script>
    window.onload = function() {
      // Retrieve the selected city from the URL parameter or session
      const selectedCity = " <?php echo $selectedCity; ?>";
      // Call getWeather function with the selected city
      getWeather(selectedCity);
    };
  </script>
</body>

</html>
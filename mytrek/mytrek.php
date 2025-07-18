<?php
session_start();

if (!isset($_SESSION['user_id'])) {
  header("Location: http://localhost/trek-kar/login/login.php");
}


// get data from database and dyanmically print
include("../connect/connect.php");
$selectedCity = $_GET['city'] ?? $_SESSION['city'];
$current_user_id = $_SESSION['user_id'];
$result = mysqli_query($con, "SELECT * FROM my_trek WHERE city = '$selectedCity' AND user_id = '$current_user_id' ") or die("Select Error");

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>trekkar-MY-TREK</title>
  <link rel="stylesheet" href="mytrek.css" />
  <script src="mytrek.js"></script>
  <link rel="icon" href="http://localhost/trek-kar/images/icon.png">
</head>

<body>

  <div class="location">
    <img src="http://localhost/trek-kar/svg_icon/location.svg">
    <form method="GET" action="mytrek.php" id="state">
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
      <li><a href="http://localhost/trek-kar/home/home.php" target="_self"> HOME </a></li>
      <li><a href="http://localhost/trek-kar/group/group.php" target="_self"> GROUP </a></li>
      <li><a href="#" target="_self" id="active"> MY TREK </a></li>
      <li><a href="http://localhost/trek-kar/explorer/explorer.php" target="_self"> EXPLORER</a></li>
      <li><a href="http://localhost/trek-kar/camp/camp.php" target="_self"> CAMP </a></li>
      <li><a href="http://localhost/trek-kar/activity/activity.php" target="_self"> ACTIVITY </a></li>
    </ul>
  </nav>

  <div class="wrapper">
    <div class="boxout"> <!--boxout is grid layout that help to create flash card-->
      <?php
      while ($row = mysqli_fetch_assoc($result)) {

        // $post[]=$row;

        $username = $row['username'];

        // getting time in HH:MM am/pm format
        $time = mysqli_query($con, "SELECT DATE_FORMAT(time, '%h:%i %p') AS ftime FROM post_details where username = '$username' ");
        $time = mysqli_fetch_assoc($time);
        $time = $time['ftime'];

        // getting date in dd/mm/yyyy format
        $date = mysqli_query($con, "SELECT DATE_FORMAT(date, '%d/%m/%Y') AS fdate FROM post_details where username = '$username' ");
        $date = mysqli_fetch_assoc($date);
        $date = $date['fdate'];

        $name = $row['name'];
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
        $postid = $row['post_id'];

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
          <form action="http://localhost/trek-kar/mytrek/remove.php" method="post">
            <div class="click"> <!--button-->
              <input type="hidden" name="postid" value="<?php echo $postid; ?>">
              <button type="submit" class="participate">Remove</button>
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

  <!-- <script src="weather.js"></script> -->
  <script>
    window.onload = function() {
      // Retrieve the selected city from the URL parameter or session
      const selectedCity = "<?php echo $selectedCity; ?>";
      // Call getWeather function with the selected city
      // getWeather(selectedCity);
    };
  </script>
</body>

</html>
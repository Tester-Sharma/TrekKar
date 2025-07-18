<?php
session_start();

if (!isset($_SESSION['user_id'])) {
  header("Location: http://localhost/trek-kar/login/login.php");
}

include("../connect/connect.php");
$selectedCity = $_GET['city'] ?? $_SESSION['city'];
$result = mysqli_query($con, "SELECT * FROM activity WHERE city = '$selectedCity' ORDER BY RAND()") or die("Select Error");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>trekkar-ACTIVITY</title>
  <link rel="stylesheet" href="activity.css" />
  <script src="activity.js"></script>
  <link rel="icon" href="http://localhost/trek-kar/images/icon.png">
</head>

<body>
  <div class="location">
    <img src="http://localhost/trek-kar/svg_icon/location.svg">
    <form method="GET" action="activity.php" id="state">
      <select id="stateSelect" onchange=" this.form.submit()" class="selector" name="city">
        <option value="" selected="selected"><?php echo $selectedCity ?></option>
        <option value="jaipur">Jaipur</option>
        <option value="jodhpur">Jodhpur</option>
        <option value="udaipur">Udaipur</option>
        <option value="banglore">Banglore</option>
      </select>
    </form>
  </div>
  <div class="user"><a href="http://localhost/trek-kar/profile/userprofile.php"><img src="../uploads/<?php echo $_SESSION['profile']; ?>"></a></div>
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
      <li><a href="#" target="_self" id="active"> ACTIVITY </a></li>
    </ul>
  </nav>

  <div class="wrapper">
    <div class="boxout">
      <?php
      while ($row = mysqli_fetch_assoc($result)) {

      ?>
        <div class="boxin">

          <div class="slider-container">
            <div class="slide">
              <img src="<?php echo $row['image']; ?>" alt="Image 1">
            </div>
          </div>
          <h1><?php echo $row['activity_name']; ?></h1>
          <div class="desc">
            <p><?php echo $row['description']; ?></p>
          </div>
          <div class="info">
            <div class="profile"> <!--profile section contain userr info-->
              <img src="http://localhost/trek-kar/images/sample profile2.jpg">
              <div class="utext">
                <p class="name"> Trek-Kar</p>
                <p class="username">trekkar.admin</p>
              </div>
            </div>
            <div class="mini"> <!--a simple svg quick info-->
              <div class="mode"><img src="http://localhost/trek-kar/svg_icon/<?php echo $row['intensity']; ?>.svg">
                <p class="txtmode"><?php echo $row['intensity']; ?></p>
              </div>
              <div class="warning"><img src="http://localhost/trek-kar/svg_icon/warning.svg">
                <p class="altitudetxt"><?php echo $row['essential']; ?></p>
              </div>
              <div class="genderselect"><img src="http://localhost/trek-kar/svg_icon/gender.svg">
                <p class="gender"><?php echo $row['gender']; ?></p>
              </div>
              <div class="age"><img src="http://localhost/trek-kar/svg_icon/age-group.svg">
                <p class="agegrp"><?php echo $row['age_group']; ?></p>
              </div>
              <div class="max"><img src="http://localhost/trek-kar/svg_icon/max-people.svg">
                <p class="maxmember"><?php echo $row['max_member']; ?></p>
              </div>
              <?php $date = date('d/m/y', strtotime($row['date']));?>
              <p class="date"><?php echo $date; ?></p>
              <p class="amount"> ₹ <?php echo $row['price']; ?></p>
              <button class="contact"><a href="">CONTACT</a></button>
            </div>
          </div>


        </div>
      <?php } ?>
    </div>
  </div>






  <div class="footer">
    <div class="footbg"><img src="http://localhost/trek-kar/svg_icon/footer.svg"></div>
    <div class="help">
      <p class="foottxt"> Meaning ? </p>
      <div></div>
      <div class="fmode"><img src="http://localhost/trek-kar/svg_icon/Hard.svg">
        <p class="ftxt">HARD</p>
      </div>
      <div class="fmode"><img src="http://localhost/trek-kar/svg_icon/Moderate.svg">
        <p class="ftxt">MODERATE</p>
      </div>
      <div class="fmode"><img src="http://localhost/trek-kar/svg_icon/Easy.svg ">
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
</body>

</html>
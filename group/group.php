<?php
session_start();

if (!isset($_SESSION['user_id'])) {
  header("Location: http://localhost/trek-kar/login/login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>trekkar-GROUP</title>
  <link rel="stylesheet" href="group.css" />
  <script src="group.js"></script>
  <link rel="icon" href="http://localhost/trek-kar/images/icon.png">
</head>

<body>
  <div class="location">
    <img src="http://localhost/trek-kar/svg_icon/location.svg">
    <select id="stateSelect" onchange="stateSelected();" class="selector">
      <option value="" selected="selected"><?php echo $_SESSION['city'] ?></option>
      <option value="jaipur">Jaipur</option>
      <option value="jodhpur">Jodhpur</option>
      <option value="udaipur">Udaipur</option>
      <option value="banglore">Banglore</option>
    </select>
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
      <li><a href="#" target="_self" id="active"> GROUP </a></li>
      <li><a href="http://localhost/trek-kar/mytrek/mytrek.php" target="_self"> MY TREK </a></li>
      <li><a href="http://localhost/trek-kar/explorer/explorer.php" target="_self"> EXPLORER</a></li>
      <li><a href="http://localhost/trek-kar/camp/camp.php" target="_self"> CAMP </a></li>
      <li><a href="http://localhost/trek-kar/activity/activity.php" target="_self"> ACTIVITY </a></li>
    </ul>
  </nav>
  <div class="create"> <!--create trek button with + svg-->
    <img src="http://localhost/trek-kar/svg_icon/plus.svg">
    <div class="crbutton">CREATE GROUP</div>
  </div>
  <div class="wrapper">
    <div class="boxout">
      <div class="boxin">
        <div class="profile">
          <img src="http://localhost/trek-kar/images/sample profile1.jpg">
          <div>
            <p class="name">natural hiker</p>
            <p class="username">natural_hiker</p>
          </div>
          <div class="follow">
            <p class="follower">22.5k follower</p><button class="followbttn">FOLLOW</button>
          </div>
        </div>
        <div class="descr">
          <p class="bio">Welcome to our online community of outdoor enthusiasts! We are a passionate group dedicated to organizing unforgettable camping experiences for adventurers of all levels.

            At our core, we believe in the transformative power of nature and the connections forged around a campfire. Whether you're a seasoned backpacker or a first-time camper, our group offers a diverse range of camping trips tailored to suit every preference and skill level.

            Joining our community means gaining access to a vibrant network of like-minded individuals </p>
        </div>
      </div>

      <div class="boxin">
        <div class="profile">
          <img src="http://localhost/trek-kar/images/sample profile2.jpg">
          <div>
            <p class="name">jodhpuri hiker</p>
            <p class="username">jodhpuri_hiker</p>
          </div>
          <div class="follow">
            <p class="follower">10k follower</p><button class="followbttn">FOLLOW</button>
          </div>
        </div>
        <div class="descr">
          <p class="bio">Step into the world of adventure with our online community centered around the majestic city of Jodhpur! Nestled in the heart of Rajasthan's desert landscape, Jodhpur is a treasure trove of cultural heritage and natural beauty, making it the perfect backdrop for unforgettable camping experiences.

            Our group is dedicated to showcasing the magic of Jodhpur and its surrounding wilderness through meticulously planned camping adventures. From the golden sands of the Thar Desert to the ancient forts and palaces </p>
        </div>
      </div>
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
</body>

</html>
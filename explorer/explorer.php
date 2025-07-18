<?php
session_start();

if (!isset($_SESSION['user_id'])) {
  header("Location: http://localhost/trek-kar/login/login.php");
}


include("../connect/connect.php");
$selectedCity = $_GET['city'] ?? $_SESSION['city'];


$result  = mysqli_query($con, "SELECT * FROM explorer WHERE city = '$selectedCity'  ORDER BY RAND()") or die("Select Error");

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>trekkar-EXPLORER</title>
  <link rel="stylesheet" href="explorer.css" />
  <!-- <link rel="stylesheet" href="https://webchat-styler-css.botpress.app/prod/ab6ce614-6a3d-4b1b-a772-1e8525643887/v94991/style.css"> -->
  <script src="explorer.js"></script>
  <link rel="icon" href="http://localhost/trek-kar/images/icon.png">
</head>

<body>
  <div class="location">
    <img src="http://localhost/trek-kar/svg_icon/location.svg">
    <form method="GET" action="explorer.php" id="state">
      <select id="stateSelect" onchange=" this.form.submit()" class="selector" name="city">
        <option value="" selected="selected"><?php echo $selectedCity ?></option>
        <option value="jaipur">Jaipur</option>
        <option value="jodhpur">Jodhpur</option>
        <option value="udaipur">Udaipur</option>
        <option value="banglore">Banglore</option>
      </select>
    </form>
  </div>
  <div class="user"><a href="http://localhost/trek-kar/profile/userprofile.php"><img src="../uploads/<?php echo $_SESSION['profile']; ?>"> </a></div>
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
      <li><a href="#" target="_self" id="active"> EXPLORER</a></li>
      <li><a href="http://localhost/trek-kar/camp/camp.php" target="_self"> CAMP </a></li>
      <li><a href="http://localhost/trek-kar/activity/activity.php" target="_self"> ACTIVITY </a></li>
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
          <div class="description"> <u><b><?php echo $row['location']; ?></b></u> : <?php echo $row['description']; ?> </div>
        </div>
      <?php } ?>
    </div>

    <div id="chat-container">
    <div id="messages"></div>
    <input type="text" id="user-input" placeholder="Type your message..." />
    <button id="send-button">Send</button>
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
    <script src="https://cdn.botpress.cloud/webchat/v2.1/inject.js"></script>
<script src="https://mediafiles.botpress.cloud/6dbd9461-2a2d-49c2-8568-1bd53f56f17f/webchat/v2.1/config.js"></script>
</body>
</html>
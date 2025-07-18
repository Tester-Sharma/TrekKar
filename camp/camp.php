<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: http://localhost/trek-kar/login/login.php");
    exit();
}

include("../connect/connect.php");

// Fetch all camp details from the database
$result = mysqli_query($con, "SELECT * FROM camp ORDER BY RAND()") or die("Select Error");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Trekkar - CAMP</title>
    <link rel="stylesheet" href="camp.css" />
    <script src="camp.js"></script>
    <link rel="icon" href="http://localhost/trek-kar/images/icon.png">
</head>

<body>
    <div class="user"><a href="http://localhost/trek-kar/profile/userprofile.php"><img src="../uploads/<?php echo $_SESSION['profile']; ?>"></a></div>
    <div class="upper"> <!-- Upper section -->
        <div class="mountain1"><img src="http://localhost/trek-kar/images/mountain1.png"></div>
        <div class="bird"><img src="http://localhost/trek-kar/images/bird.png" id="bird"></div>
        <div class="mountain2"><img src="http://localhost/trek-kar/images/mountain2 1.png" id="mountain2"></div>
        <div class="mountain3"><img src="http://localhost/trek-kar/images/mountain3.png"></div>
        <div class="banner"><img src="http://localhost/trek-kar/images/banner.png"></div>
        <div class="upgrad"></div>
    </div>

    <nav> <!-- Navigation Bar -->
        <ul>
            <li><a href="http://localhost/trek-kar/home/home.php" target="_self">HOME</a></li>
            <li><a href="http://localhost/trek-kar/group/group.php" target="_self">GROUP</a></li>
            <li><a href="http://localhost/trek-kar/mytrek/mytrek.php" target="_self">MY TREK</a></li>
            <li><a href="http://localhost/trek-kar/explorer/explorer.php" target="_self">EXPLORER</a></li>
            <li><a href="#" target="_self" id="active">CAMP</a></li>
            <li><a href="http://localhost/trek-kar/activity/activity.php" target="_self">ACTIVITY</a></li>
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
                            <img src="../camp/camp_image/<?php echo $row['image']; ?>" alt="Camp Image">
                        </div>
                    </div>
                    <h1><?php echo $row['location']; ?></h1>
                    <div class="desc">
                        <p><?php echo $row['description']; ?></p>
                    </div>
                    <div class="info">
                        <div class="profile"> <!-- Profile section with user info -->
                            <img src="http://localhost/trek-kar/images/sample profile2.jpg">
                            <div class="utext">
                                <p class="name"><?php echo $row['username']; ?></p>
                                <p class="username"><?php echo $row['name']; ?></p>
                            </div>
                        </div>
                        <div class="mini"> <!-- Simple svg quick info -->
                            <div class="mode">
                                <img src="http://localhost/trek-kar/svg_icon/<?php echo $row['intensity']; ?>.svg">
                                <p class="txtmode"><?php echo ucfirst($row['intensity']); ?></p>
                            </div>
                            <div class="altitude">
                                <img src="http://localhost/trek-kar/svg_icon/High altitude.svg">
                                <p class="altitudetxt"><?php echo $row['altitude']; ?> ft</p>
                            </div>
                            <div class="range">
                                <img src="http://localhost/trek-kar/svg_icon/time.svg">
                                <p class="rangetxt"><?php echo $row['stay']; ?></p>
                            </div>
                            <div class="genderselect">
                                <img src="http://localhost/trek-kar/svg_icon/gender.svg">
                                <p class="gender"><?php echo $row['gender']; ?></p>
                            </div>
                            <div class="age">
                                <img src="http://localhost/trek-kar/svg_icon/age-group.svg">
                                <p class="agegrp"><?php echo $row['min_age']; ?> - <?php echo $row['max_age']; ?> years</p>
                            </div>
                            <div class="max">
                                <img src="http://localhost/trek-kar/svg_icon/max-people.svg">
                                <p class="maxmember"><?php echo $row['max_members']; ?> people</p>
                            </div>
                            <?php $formatted_date = date('d/m/y', strtotime($row['date'])); ?>
                            <p class="date"><?php echo $formatted_date; ?></p>
                            <p class="amount">₹<?php echo $row['price']; ?></p>
                            <button class="contact"><a href="#">CONTACT</a></button>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <div class="footer">
        <div class="footbg"><img src="http://localhost/trek-kar/svg_icon/footer.svg"></div>
        <div class="help">
            <p class="foottxt">Meaning?</p>
            <div></div>
            <div class="fmode"><img src="http://localhost/trek-kar/svg_icon/Hard.svg">
                <p class="ftxt">HARD</p>
            </div>
            <div class="fmode"><img src="http://localhost/trek-kar/svg_icon/Moderate.svg">
                <p class="ftxt">MODERATE</p>
            </div>
            <div class="fmode"><img src="http://localhost/trek-kar/svg_icon/Easy.svg">
                <p class="ftxt">EASY</p>
            </div>
            <div class="fmode"><img src="http://localhost/trek-kar/svg_icon/sandclock white.svg">
                <p class="ftxt">Approx time</p>
            </div>
            <div class="fmode"><img src="http://localhost/trek-kar/svg_icon/age-group-white.svg">
                <p class="ftxt">Age group</p>
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
                <a href="#"><img src="http://localhost/trek-kar/images/instagram.png"></a>
                <a href="#"><img src="http://localhost/trek-kar/images/facebook.png"></a>
                <a href="#"><img src="http://localhost/trek-kar/images/twitter.png"></a>
            </div>
        </div>
        <div class="whatsapp"><a href="#"><img src="http://localhost/trek-kar/svg_icon/whatsapp.svg"></a></div>
        <p class="copyright">© 2024 trekkar.com</p>
    </div>
</body>

</html>

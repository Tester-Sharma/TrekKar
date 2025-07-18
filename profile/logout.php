<?php
session_start();
session_destroy();
echo '<script>alert("Logout Succesfully !");';
echo 'window.location.href = "http://localhost/trek-kar/login/login.php";</script>';
?>
<?php
session_start();
session_destroy();
setcookie('username',null,time()-1);
header('Location:http://localhost/Attendance%20System%20project/login%20form/login_panel.php');
?>
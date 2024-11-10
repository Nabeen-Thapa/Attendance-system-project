<?php
session_start();
if (!isset($_SESSION['student_id'])) {
    header('Location: ./student_login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="../Student_Dashboard/student_title_css.css">
</head>

<body class="student_title_bar">
    <div class="std_title_bar">
        <a href="student_dashboard.php">
            <div class="Alogo"><img src="../logo/system logo.png" alt="" class="alogo_pic"></div>
        </a>
        <div class="std_links">
            <a href="student_dashboard.php"
                class="std_titles">dashboard</a>
            <a href="student_attendance_detail.php"
                class="std_titles">my attendance</a>
            <a href="student_details.php"
                class="std_titles">my detalis</a>

        </div>
        <!--student pfofile part-->
        <div id="idstudent_profile_part">
            <div id="idstudent_pic_part">
                <a href="student_details.php">
                    <img src="../registration form/student_images/<?php echo $_SESSION['std_profile']?>"
                        class="studentPP">
                    <div id="idprofile_text"><?php echo $_SESSION['student_name'] ?></div>
                </a>
                <div class="dropdown">
                    <button onclick="toggleDropdown()" class="dropbtn">&#9660;</button>
                    <div id="myDropdown" class="dropdown-content">
                        <a href="student_details.php">View Profile</a>
                        <a href="student_pwd_change.php">change password</a>
                        <a href="student_logout.php">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function toggleDropdown() {
            document.getElementById("myDropdown").classList.toggle("show");
        }
        //Close the dropdown if the user clicks outside of it
        window.onclick = function (event) {
            if (!event.target.matches('.dropbtn')) {
                var dropdowns = document.getElementsByClassName("dropdown-content");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                }
            }
        }
    </script>
</body>

</html>
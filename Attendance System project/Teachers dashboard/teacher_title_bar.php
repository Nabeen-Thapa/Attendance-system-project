<?php
session_start();
if(!isset($_SESSION['teacher_id'])){
    header('location:./teacher_login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="teacher_title_bar_css.css" />
</head>

<body>
    <div id="dash_topbar">
        <a href="./teacher_dashboard.php" class="Alogo"><img src="../logo/system logo.png" alt="" class="alogo_pic"></a>
    <div class="title_bar_title">Student attendace system</div>
         
        <!-- for teacher login -->
        <!-- <a href="./teacher_logout.php"
            class="logout_btn">T logout</a>'; -->

        
        
        <!-- teachers pfofile part -->
        <div id="idteacher_profile_part">
            <div id="idteacher_pic_part">
            <img src="../Admin dashboard/teacher_images/<?php echo $_SESSION['teacher_profile'] ?>" class="teacherPP">
                <div id="idprofile_text">
                    <?php echo $_SESSION['teacher_name'];?>
                </div>
            </div>
            <div class="dropdown">
                    <button onclick="toggleDropdown()" class="dropbtn">&#9660;</button>
                    <div id="myDropdown" class="dropdown-content">
                        <a href="./view_teacher_profile.php">View Profile</a>
                        <a href="./edit_teacher_profile.php">edit Profile</a>
                        <a href="./teacher_pwd_change.php">change password</a>
                        <a href="./teacher_logout.php">Logout</a>
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



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


    <!-- <script>
        $(document).ready(function () {
            $('#year').change(function () {
                var year = $(this).val();
                // ajax call
                $.ajax('../title bar/load_semester.php', {
                    data: { 'year': year },
                    dataType: 'text',
                    method: 'post',
                    success: function (response) {
                        $('#semester').html(response);
                    }
                });
            });
            $('#semester').change(function () {
                var sem = $(this).val();
                // ajax call
                $.ajax('../title bar/load_subject.php', {
                    data: { 'semester': sem },
                    dataType: 'text',
                    method: 'post',
                    success: function (response) {
                        $('#subject').html(response);
                    }
                });
            });

        });
    </script> -->
    
</body>

</html>

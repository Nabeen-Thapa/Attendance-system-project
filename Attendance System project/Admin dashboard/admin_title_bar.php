<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header('location:./Admin_login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="admin_title_bar_css.css" />
</head>

<body>
    <div id="admin_title_bar"> 
        <a href="./Admin_dashboard.php" class="Alogo" onclick="admin_logo_click()"><img src="../logo/system logo.png" alt="" class="alogo_pic"></a>
        <div id="admin-view-links" class="admin_view_links">
    <a href="./view_teachers.php" data-title="Teachers">teachers</a>
    <a href="./view_programs.php" data-title="Programs">programs</a>
    <a href="./view_years.php" data-title="Years">years</a>
    <a href="./view_semesters.php" data-title="Semesters">semesters</a>
    <a href="./view_batches.php" data-title="Batches">batches</a>
    <a href="./view_subjects.php" data-title="Subjects">subjects</a>
    <a href="./view_subject_teachers.php" class="subject_teacher" data-title="Subject Teachers">subjects teachers</a>
</div>


        <!--admins pfofile part-->
        <div id="idadmin_profile_part">
            <div id="idadmin_pic_part">
                <a href="./view_admin_profile.php">
                <img src="admin_images/<?php echo $_SESSION['admin_image'] ?>" alt="" class="adminPP">
                <div id="idprofile_text"><?php echo $_SESSION['admin_name']; ?>
                </div>
                </a>
                <div class="dropdown">
                    <button onclick="toggleDropdown()" class="dropbtn">&#9660;</button>
                    <div id="myDropdown" class="dropdown-content">
                        <a href="../Admin dashboard/view_admin_profile.php">View Profile</a>
                        <a href="../Admin dashboard/admin_pwd_change.php">change password</a>
                        <a href="../Admin dashboard/admin_logout.php">Logout</a>
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

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const links = document.querySelectorAll('#admin-view-links a');
        
        // Check if there's an active link stored
        const activeLink = sessionStorage.getItem('activeLink');
        if (activeLink) {
            const activeElement = document.querySelector(`#admin-view-links a[href="${activeLink}"]`);
            if (activeElement) {
                activeElement.classList.add('active');
            }
        }
        
        // Add click event listeners to the links
        links.forEach(link => {
            link.addEventListener('click', function() {
                // Remove the active class from all links
                links.forEach(link => link.classList.remove('active'));
                
                // Add the active class to the clicked link
                this.classList.add('active');
                
                // Store the active link in session storage
                sessionStorage.setItem('activeLink', this.getAttribute('href'));
            });
        });
    });
</script>

</body>

</html>
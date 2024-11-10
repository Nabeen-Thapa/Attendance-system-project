<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="teacher_side_bar_css.css">
    <link rel="stylesheet" href="../Display Tables/student_attendance_tblcss.css">

</head>

<body>
    <div class="teacher_side_bar">
        <a href="./teacher_dashboard.php"
            class="menus">Dashboard<img src="../images/dashboards.png" alt="" class="teach_dashimg"></a>

        <a href="./view%20students.php"
        class="menus">view Students<img src="../images/all students.jpg" alt="" class="teach_dashimg" id="allstd"></a>

        <a href="view_all_std_attendance_table.php" class="menus" id="Afile" name="Afile"><img src="../images/attendance file.png" alt="" class="teach_dashimg">Attendance table</a>

            <!-- <a href="../Display Tables/std_attendance_days_display.php"
            class="menus" id="Arecord"><img src="../images/present students.png" alt="" class="teach_dashimg">Attendance days
            </a> -->
        <a href="./view_attendance_all_record.php"
            class="menus" id="Arecord"><img src="../images/present students.png" alt="" class="teach_dashimg">Attendance
            records</a>

            <!-- <a href="./view_teachers_semesters.php" class="menus"
            id="add_sub"><img src="../images/add subjects.png" id="addsub" class="teach_dashimg">my semesters</a> -->

        <a href="../registration form/Student_register.php" class="menus"
            id="add_std" target="_blank"><img src="../images/add student.png" id="addstd" class="teach_dashimg">Add students</a>

        <!-- <a href="../login form/logout.php" class="menus" id="logout"><img src="images/logoutt1.png" id="logout" class="teach_dashimg">Logout</a> -->
           
    </div>
    <!-- <script src="../Teachers dashboard/teacher_dashboard_displaysjs.js"></script>
    <script src="menu_berjs.js"></script> -->
</body>

</html>
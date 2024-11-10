<?php
// try{
// // session_start();
// if(!isset($_SESSION['username'])){
//     header('http://localhost/Attendance%20System%20project/login%20form/login_panel.php?msg=1');
// }
// $validtime  = $_SESSION['login_time'] + 60;
// if(isset($_SESSION['login_time']) && time() < $validtime){
//     $_SESSION['login_time'] = time();
// }else {
//     header('http://localhost/Attendance%20System%20project/login%20form/login_panel.php?msg=2');
// }
// }catch(Exception $ex){
//     die ("session errro: " .$ex->getMessage());
// }

if (isset($_POST['Afile'])) {
    header('Location:Attendance System project/Display Tables/student_attendance_table.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="menu_barcss.css">
    <link rel="stylesheet" href="../Display Tables/student_attendance_tblcss.css">

</head>

<body>
    <div class="menu_bar">
        <a href="https://localhost/Attendance%20System%20project/Teachers%20dashboard/teacher_dashboard.php"
            class="menus">Dashboard<img src="../images/dashboards.png" alt="" class="teach_dashimg"></a>

        <a href="https://localhost/Attendance%20System%20project/student%20attendance%20record%20tables/student_edit_table.php"
        class="menus">Students<img src="../images/all students.jpg" alt="" class="teach_dashimg" id="allstd"></a>

        <a href="https://localhost/Attendance%20System%20project/Display%20Tables/student_attendance_table.php"
            class="menus" id="Afile" name="Afile"><img src="../images/attendance file.png" alt=""
                class="teach_dashimg">Attendance 
            file</a>
            <a href="https://localhost/Attendance%20System%20project/Display%20Tables/std_attendance_days_display.php"
            class="menus" id="Arecord"><img src="../images/present students.png" alt="" class="teach_dashimg">Attendance days
            </a>
        <a href="https://localhost/Attendance%20System%20project/student%20attendance%20record%20tables/std_record_tbl.php"
            class="menus" id="Arecord"><img src="../images/present students.png" alt="" class="teach_dashimg">Attendance
            records</a>

        <a href="https://localhost/Attendance%20System%20project/registration%20form/Student_register.php" class="menus"
            id="add_std" target="_blank"><img src="../images/add student.png" id="addstd" class="teach_dashimg">Add students</a>

        <a href="https://localhost/Attendance%20System%20project/registration%20form/add_subject.php" class="menus"
            id="add_sub"><img src="../images/add subjects.png" id="addsub" class="teach_dashimg">Add subject</a>

        <!-- <a href="https://localhost/Attendance%20System%20project/login%20form/logout.php" class="menus" id="logout"><img src="images/logoutt1.png" id="logout" class="teach_dashimg">Logout</a> -->
        
    </div>
    <!-- <script src="../Teachers dashboard/teacher_dashboard_displaysjs.js"></script>
    <script src="menu_berjs.js"></script> -->
</body>

</html>
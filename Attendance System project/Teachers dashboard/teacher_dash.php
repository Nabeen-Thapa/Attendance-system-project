<?php
include('../database and tables/create_database.php');


   




error_reporting(0);

$student_count_name = "SELECT COUNT(Name) AS course_count FROM course_table";
$student_count_name = "SELECT COUNT(Name) AS name_count FROM Student_table";
$student_count_name = "SELECT COUNT(Name) AS all_std_count FROM Student_table";
$student_count_name = "SELECT COUNT(Name) AS name_count FROM Student_table";
$student_count_name = "SELECT COUNT(Name) AS name_count FROM Student_table";
$result_name = mysqli_query($connect, $student_count_name);

if ($result_name && mysqli_num_rows($result_name) == 1) {
    $row = mysqli_fetch_assoc($result_name);
    $count_name = $row['name_count']; 
    print_r($count_name);
} else {
    echo 'Table is empty';
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>teacher dash</title>
    <link rel="stylesheet" href="teacher_dashcss.css">
</head>
<body>
    <div class="Dash_entities" id="teacher_dash">
        <div class="entities">
            <button class="entity">courses()<?php echo $count_name; ?>
                <img src="images/attendance pic.png" class="admindashpic" id="">
            </button>
        </div>
        </div>
        <div class="entities">
            <button href="https://localhost/Attendance%20System%20project/student%20attendance%20record%20tables/std_record_tbl.php" class="entity" id="">All students<?php echo $count_name ;?></button>
            <img src="images/all student.jpg" class="admindashpic" id="">
        </div>
        <div class="entities">
            <button class="entity" id="">Female students()
            <img src="images/female student.png" class="admindashpic" id=""></button>
        </div>
        <div class="entities">
            <button class="entity" id="">Male students()
            <img src="images/male student.png" class="admindashpic" id=""></button>
        </div>
        <div class="entities">
            <button class="entity" id="">present studnts()
            <img src="images/present student.png" class="admindashpic" id=""></button>
        </div>
        <div class="entities">
            <button class="entity" id="">Absent studnts()
            <img src="images/absent stundet.png" class="admindashpic" id=""></button>
        </div>
        
        
    </div>
    <script src="../title bar/menu_berjs.js"></script>
</body>
</html>
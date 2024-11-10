<?php
include ("student_title_bar.php");
include ('../database and tables/create_database.php');

error_reporting(0);
try{
    $std_id = $_SESSION['student_id'];
    //print course name
$course_name = "SELECT student_table.std_course, course_table.Name AS course_name
        FROM student_table
        INNER JOIN course_table ON student_table.std_course = course_table.id
         WHERE student_table.id = '$std_id'
        ";
$result_course = mysqli_query($connect, $course_name);
if (mysqli_num_rows($result_course) > 0) {
    $course_row = mysqli_fetch_assoc($result_course);

} else {
    echo 'course table is empty';
}

//batche
$batch_name = "SELECT student_table.Batch_id, batch_table.Title as batch_title from student_table
INNER JOIN batch_table on student_table.Batch_id = batch_table.id
where student_table.id = '$std_id'
";
$result_batch = mysqli_query($connect, $batch_name);
if (mysqli_num_rows($result_batch) > 0) {
    $batch_row = mysqli_fetch_assoc($result_batch);

} else {
    echo 'batch table is empty';
}

//semester
$semester_name = "SELECT student_table.semester, semester_table.Name as semester_name from student_table
INNER JOIN semester_table on student_table.semester= semester_table.id
where student_table.id = '$std_id'
";
$result_semester = mysqli_query($connect, $semester_name);
if (mysqli_num_rows($result_semester) > 0) {
    $semester_row = mysqli_fetch_assoc($result_semester);

} else {
    echo 'semester table is empty';
}




//subject student counter
$std_sem = $_SESSION['std_semester'];
$subjects_count = "SELECT COUNT(id) AS subjects_count FROM subjects_table
where Semester_id = '$std_sem'";

$result_subjects = mysqli_query($connect, $subjects_count);
if (mysqli_num_rows($result_subjects) == 1) {
    $subjects_row = mysqli_fetch_assoc($result_subjects);
} else {
    echo 'subjects table is empty';
}

//student present counter
$present_count = "SELECT COUNT(status) AS present_count FROM attendence_record_table 
where  student_id= '$std_id' and status = '1'";
$result_present = mysqli_query($connect, $present_count);
if (mysqli_num_rows($result_present) == 1) {
    $present_row = mysqli_fetch_assoc($result_present);
} else {
    echo 'present table is empty';
}

//student present counter
$absent_count = "SELECT COUNT(status) AS absent_count FROM attendence_record_table 
where  student_id= '$std_id' and status = '0'";
$result_absent = mysqli_query($connect, $absent_count);
if (mysqli_num_rows($result_absent) == 1) {
    $absent_row = mysqli_fetch_assoc($result_absent);
} else {
    echo 'absent table is empty';
}
}catch(Exception $ex){
    die("accessing database in studnet dashboard" .$ex->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>studnet dash board</title>
    <link rel="stylesheet" href="student_dashboard_css.css">
</head>

<body class="std_body">

    <div class="std_dashboard">
        <div class="std_dash">
            <a>
                <p>your course</p>
                <p><?php echo $course_row['course_name']; ?></p>
            </a>
            <img src="images/attendance pic.png" class="std_dash_img" id="">
        </div>
        <div class="std_dash">
            <a>
                <p>your batch</p>
                <p><?php echo $batch_row['batch_title'];?></p>
            </a>
            <img src="images/attendance pic.png" class="std_dash_img" id="">
        </div>
        <div class="std_dash">
            <a>
                <p>your semester</p>
                <p><?php echo $semester_row['semester_name'];?></p>
            </a>
            <img src="images/attendance pic.png" class="std_dash_img" id="">
        </div>
        <div class="std_dash">
            <a>
                <p>your subjects</p>
                <p><?php echo $subjects_row['subjects_count'];?></p>
            </a>
            <img src="images/attendance pic.png" class="std_dash_img" id="">
        </div>
        <div class="std_dash">
            <a>
                <p>your present days</p>
                <p><?php echo $present_row['present_count'];?></p>
            </a>
            <img src="images/attendance pic.png" class="std_dash_img" id="">
        </div>
        <div class="std_dash">
            <a>
                <p>your absent days</p>
                <p><?php echo $absent_row['absent_count'];?></p>
            </a>
            <img src="images/attendance pic.png" class="std_dash_img" id="">
        </div>
    </div>
    <!-- <div class="std_dash_content">this attendance system show the detail only about login student, you can see only
        about detail and can update your datail. </div> -->
</body>

</html>
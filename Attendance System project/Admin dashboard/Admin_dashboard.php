<?php
include ("admin_title_bar.php");
include ("admin_side_bar.php");
include ('../database and tables/create_database.php');
//course counter
$course_count = "SELECT COUNT(Name) AS course_count FROM course_table";
$result_course = mysqli_query($connect, $course_count);
if ( mysqli_num_rows($result_course) == 1) {
    $course_row = mysqli_fetch_assoc($result_course);
   
} else {
    echo 'course table is empty';
}

//backes
$batch_count = "SELECT COUNT(id) AS batch_count FROM batch_table";
$result_batch = mysqli_query($connect, $batch_count);
if ( mysqli_num_rows($result_batch) == 1) {
    $batch_row = mysqli_fetch_assoc($result_batch);
    
} else {
    echo 'batch table is empty';
}

//teahcers counter
$teacher_count = "SELECT COUNT(id) AS teacher_count FROM teacher_details";
$result_teacher = mysqli_query($connect, $teacher_count);
if ( mysqli_num_rows($result_teacher) == 1) {
    $teacher_row = mysqli_fetch_assoc($result_teacher);
} else {
    echo 'teacher table is empty';
}
//student counter
$student_count = "SELECT COUNT(id) AS student_count FROM student_table";
$result_student = mysqli_query($connect, $student_count);
if ( mysqli_num_rows($result_student) == 1) {
    $student_row = mysqli_fetch_assoc($result_student);
} else {
    echo 'student table is empty';
}

//female student counter
$female_std_count = "SELECT COUNT(id) AS female_std_count FROM student_table where Gender='Female'";
$result_female_std = mysqli_query($connect, $female_std_count);
if ( mysqli_num_rows($result_female_std) == 1) {
    $female_std_row = mysqli_fetch_assoc($result_female_std);
} else {
    echo 'female_std table is empty';
}

//male student counter
$male_std_count = "SELECT COUNT(id) AS male_std_count FROM student_table where Gender='Male'";
$result_male_std = mysqli_query($connect, $male_std_count);
if ( mysqli_num_rows($result_male_std) == 1) {
    $male_std_row = mysqli_fetch_assoc($result_male_std);
} else {
    echo 'male_std table is empty';
}

//male student counter
$subjects_count = "SELECT COUNT(id) AS subjects_count FROM student_table";
$result_subjects = mysqli_query($connect, $subjects_count);
if ( mysqli_num_rows($result_subjects) == 1) {
    $subjects_row = mysqli_fetch_assoc($result_subjects);
} else {
    echo 'subjects table is empty';
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>teacher dash</title>
    <link rel="stylesheet" href="Admin_dashboard_css.css">
</head>

<body class="admin_body">
    <div class="Dash_entities" id="admin_dash">
        <div class="entities">
            <a href="./view_programs.php">
                <p>all courses</p>
                <p><?php echo $course_row['course_count']; ?></p>
            </a>
            <img src="../images/attendance pic.png" class="admindashpic" id="">
        </div>
        <div class="entities">
            <a href="./view_batches.php">
                <p>all batch</p>
                <p><?php echo $batch_row['batch_count']; ?></p>
            </a>
            <img src="../images/attendance pic.png" class="admindashpic" id="">
        </div>
        <div class="entities">
            <a href="./view_teachers.php">
                <p>All teachers</p>
                <p><?php echo $teacher_row['teacher_count']; ?></p>
            </a>
            <img src="../images/teachers.png" class="admindashpic" id="">
        </div>
        <div class="entities">
            <a href="./student_edit_table.php" >
                <p>All students</p>
                <p><?php echo $student_row['student_count']; ?></p>
            </a>
            <img src="../images/all std_img.png" class="admindashpic" id="">
        </div>
        <div class="entities">
            <a>
                <p>Female students</p>
                <p><?php echo $female_std_row['female_std_count']; ?></p>
            </a>
            <img src="../images/female std_img.png" class="admindashpic" id="">
        </div>
        <div class="entities">
            <a>
                <p> Male students</p>
                <p><?php echo $male_std_row['male_std_count']; ?></p>
            </a>
            <img src="../images/male std_img.png" class="admindashpic" id="">
        </div>
        <div class="entities">
            <a href="./view_subjects.php" >
                <p> subjects</p>
                <p><?php echo $subjects_row['subjects_count']; ?></p>
            </a>
            <img src="../images/all subjects.png" class="admindashpic" id="">
        </div>
    </div>
</body>

</html>
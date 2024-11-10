<?php
include ("teacher_title_bar.php");
include ("teacher_side_bar.php");
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
    <div class="teachers_subject">
        <?php
        include ('../database and tables/create_database.php');
        $session_teacher_id = $_SESSION['teacher_id'];
        $subject_select = "SELECT subject_assign_teacher.*, subjects_table.Title as subject_name FROM subject_assign_teacher
        INNER JOIN subjects_table ON subject_assign_teacher.subject_id = subjects_table.id
        WHERE subject_assign_teacher.teacher_id = '$session_teacher_id'";
        $result_subject = mysqli_query($connect, $subject_select);
        echo '<h1>your subjects</h1> ';
        if (mysqli_num_rows($result_subject) > 0) {
            while ($subject = mysqli_fetch_assoc($result_subject)) {
                echo ' <div class= "view_teacher_subjects">
                    <div  class="subject">' . $subject['subject_name'] . '</div> 
                     <a href ="https://localhost/Attendance%20System%20project/Teachers%20dashboard/view_attendance_table.php?sem_id=' . $subject['semester_id'] . '&sub_id=' . $subject['subject_id'] . '&sub_name=' . $subject['subject_name'] . '" class="attendance_tbl">attendance</a>
                    <a  href="https://localhost/Attendance%20System%20project/Teachers%20dashboard/view_record_subject_wise.php ?sem_id=' . $subject['semester_id'] . '&sub_id=' . $subject['subject_id'] . '&sub_name=' . $subject['subject_name'] . '" class="view_student_tbl">view record</a>
                   
                </div>';
            }
        } else {
            echo 'No subjects assigned to this teacher.';
        }

        ?>
        <hr/ >
        <div class="teacher_semester_dash">
            <h1>your semesters</h1>
            <?php include ('view_teachers_semesters.php'); ?>
        </div>
    </div>

    <div class="Dash_entities" id="teacher_dash">
        <div class="entities">
            <button class="entity">courses 
                <img src="images/attendance pic.png" class="admindashpic" id="">
            </button>
        </div>

        <div class="entities">
            <button class="entity" id="">
                All students
                <img src="images/all student.jpg" class="admindashpic" id="">
            </button>
        </div>
        <div class="entities">
            <button class="entity" id="">Female students
                <img src="images/female student.png" class="admindashpic" id=""></button>
        </div>
        <div class="entities">
            <button class="entity" id="">Male students
                <img src="images/male student.png" class="admindashpic" id=""></button>
        </div>
        <!-- <div class="entities">
            <button class="entity" id="">present studnts
                <img src="images/present student.png" class="admindashpic" id=""></button>
        </div>
        <div class="entities">
            <button class="entity" id="">Absent studnts
                <img src="images/absent stundet.png" class="admindashpic" id=""></button>
        </div> -->
    </div>


</body>

</html>
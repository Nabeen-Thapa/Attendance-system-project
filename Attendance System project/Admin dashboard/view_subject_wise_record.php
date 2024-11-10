<?php
include ("admin_title_bar.php");
include ("admin_side_bar.php");
?>
<div class="teachers_subject">
        <?php
        include ('../database and tables/create_database.php');
        // $session_teacher_id = $_SESSION['teacher_id'];
        $subject_select = "SELECT subject_assign_teacher.*, subjects_table.Title as subject_name FROM subject_assign_teacher
        INNER JOIN subjects_table ON subject_assign_teacher.subject_id = subjects_table.id
        ";
        $result_subject = mysqli_query($connect, $subject_select);
        echo '<h1>all subject list</h1> ';
        if (mysqli_num_rows($result_subject) > 0) {
            while ($subject = mysqli_fetch_assoc($result_subject)) {
                echo ' <div class= "view_teacher_subjects">
                    <div  class="subject">' . $subject['subject_name'] . '</div> 
                     <a href ="../Teachers dashboard/view_attendance_table.php?sem_id=' . $subject['semester_id'] . '&sub_id=' . $subject['subject_id'] . '" class="attendance_tbl">attendance</a>
                    <a  href="../Teachers dashboard/view_record_subject_wise.php ?sem_id=' . $subject['semester_id'] . '&sub_id=' . $subject['subject_id'] . '" class="view_student_tbl">view record</a>
                   
                </div>';
            }
        } else {
            echo 'No subjects assigned to this teacher.';
        }
        ?>
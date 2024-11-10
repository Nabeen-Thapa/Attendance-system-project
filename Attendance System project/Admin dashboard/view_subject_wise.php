<?php
include ("admin_title_bar.php");
include ("admin_side_bar.php");
include ("search_bar.php");
?>
<link rel="stylesheet" href="admin_view_css.css">
<link rel="stylesheet" href="search_bar.css">
<div class="teachers_subject">
        <?php
        include ('../database and tables/create_database.php');
        if (isset($_POST['searchBox']) && !empty($_POST['searchBox'])) {
            $search = $_POST['searchBox'];
            $subject_select = "SELECT subject_assign_teacher.*, subjects_table.Title as subject_name FROM subject_assign_teacher
            INNER JOIN subjects_table ON subject_assign_teacher.subject_id = subjects_table.id
             WHERE subjects_table.Title LIKE '%$search%' 
            ";

        }else{
        $subject_select = "SELECT subject_assign_teacher.*, subjects_table.Title as subject_name FROM subject_assign_teacher
        INNER JOIN subjects_table ON subject_assign_teacher.subject_id = subjects_table.id
        ";
        }
        $result_subject = mysqli_query($connect, $subject_select);
        echo '<h1>list of all subjects</h1> ';
        if (mysqli_num_rows($result_subject) > 0) {
            while ($subject = mysqli_fetch_assoc($result_subject)) {
                echo ' <div class= "view_teacher_subjects">
                    <div  class="subject">' . $subject['subject_name'] . '</div> 
                    <a  href="view_record_subject_wise.php ?sem_id=' . $subject['semester_id'] . '&sub_id=' . $subject['subject_id'] . '&sub_title='.$subject['subject_name'].'" class="view_student_tbl">view attendace record</a>
                   
                </div>';
            }
        } else {
            echo 'No subjects assigned to this teacher.';
        }
        ?>   
    </div>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>student attendeance table display</title>
    <link rel="stylesheet" href="view_attendace_table_css.css">

</head>

<body>
<?php
// displaying table for attendace (present/ absent talbe)
include ("teacher_title_bar.php");
include ("teacher_side_bar.php");
include ('../database and tables/create_database.php');

try {
    $batch_select = "SELECT * from batch_table ";
    $result_batch = mysqli_query($connect, $batch_select);
    $batchs_id = [];
    if (mysqli_num_rows($result_batch) > 0) {
        while ($batch_id = mysqli_fetch_assoc($result_batch)) {
            array_push($batchs_id, $batch_id);
        }
    }
    $course_select = "SELECT * from Course_table";
    $result_course = mysqli_query($connect, $course_select);
    $courses_id = [];
    if (mysqli_num_rows($result_course) > 0) {
        while ($course_id = mysqli_fetch_assoc($result_course)) {
            array_push($courses_id, $course_id);
        }
    }
    $semester_select = "SELECT * from semester_table";
    $result_semester = mysqli_query($connect, $semester_select);
    $semesters_id = [];
    if (mysqli_num_rows($result_semester) > 0) {
        while ($semester_id = mysqli_fetch_assoc($result_semester)) {
            array_push($semesters_id, $semester_id);
        }
    }
} catch (Exception $exts) {
    die("student and subjest relation error:" . $exts->getMessage());
}
?>
<form action="" method="post">
    <div class="std_find">
        <div class="std_course">

            <!-- <label for="course">Choose your course:</label> -->
            <select name="course" id="course" class="course">
                <option value="">courses</option>
                <?php foreach ($courses_id as $course_id) { ?>
                    <option value="<?php echo $course_id['id']; ?>" <?php echo (isset($_POST['course']) && $_POST['course'] == $course_id['id']) ? 'selected' : ''; ?>>
                        <?php echo $course_id['Name'] ?>
                    </option>
                <?php } ?>
            </select>

        </div>
        <div class="std_batch">
            <label for="batch">Choose your batch:</label>
            <select name="batch" id="batch" class="batch">
                <option value="">batchs</option>
                <?php foreach ($batchs_id as $batch_id) { ?>
                    <option value="<?php echo $batch_id['id'] ?>" <?php echo (isset($_POST['batch']) && $_POST['batch'] == $batch_id['id']) ? 'selected' : ''; ?>>
                        <?php echo $batch_id['Title'] ?>
                    </option>
                <?php } ?>
            </select>
            <span class="reg_err" id="std_reg_sec_err"><?php echo isset($batch_err) ? $batch_err : ''; ?></span>
        </div>
        <div class="std_semester">

            <!-- <label for="semester">Choose your semester:</label> -->
            <select name="semester" id="semester" class="semester">
                <option value="">semesters</option>
                <?php foreach ($semesters_id as $semester_id) { ?>
                    <option value="<?php echo $semester_id['id']; ?>" <?php echo (isset($_POST['semester']) && $_POST['semester'] == $semester_id['id']) ? 'selected' : ''; ?>>
                        <?php echo $semester_id['Name'] ?>
                    </option>
                <?php } ?>
            </select>
        </div>
    </div>
</form>

<?php

error_reporting(E_ALL);
try {

    // Fetch data
    
    $session_teacher_id = $_SESSION['teacher_id'];
    $semester_select = " SELECT Student_table.*, batch_table.Title as batch_name, course_table.Name as course_name , Semester_table.Name as semester
    FROM Student_table 
    INNER JOIN batch_table ON Student_table.batch_id = batch_table.id
    INNER JOIN course_table ON Student_table.std_course = course_table.id
    INNER JOIN semester_table ON Student_table.semester = semester_table.id
    where Student_table.semester =  teacher_
 ";
    $semester_result = mysqli_query($connect, $semester_select);

    if (mysqli_num_rows($semester_result) > 0) {
        echo "<div class='std_tbl_css' id='student_sheet'>";
        // echo "<center><h3>subject: </h3></center>";
        // echo "<center><h3>Teacher:</h3></center>";
        echo "<center><h2>Attendance sheet</h2></center>";
        echo '<table border="1">
                <tr>
                    <th>profile</th>          
                    <th class="attendance_tbl">Roll No</th>
                   <th class="attendance_tbl" id="Apro">Program</th>
                    <th class="attendance_tbl" id="Ayear">year</th>
                    <th class="attendance_tbl" id="Ayear">batch</th>
                    <th class="attendance_tbl" id="Asem">Semester</th> 
                    <th class="attendance_tbl" id="Asem">Section</th> 
                    <th class="attendance_tbl" colspan="2">Attendance</th>
                    
                </tr>';

        while ($semester_row = mysqli_fetch_assoc($semester_result)) {
            echo '<tr>
                    <td>
                    <img src="../registration form/student_images/' . $semester_row['image'] . '" class="student_tbl_pic" onclick ="profile_details()">  
                    </td>
                    <td>' . $semester_row['RollNo'] . '</td>
                    <td class="leftname">' . $semester_row['Name'] . '</td>
                    <td>' . $semester_row['course_name'] . '</td>
                    <td>' . $semester_row['year'] . '</td>
                    <td>' . $semester_row['batch_name'] . '</td>
                    <td>' . $semester_row['semester'] . '</td>
                    <td>' . $semester_row['section'] . '</td>
                    <td><input type="checkbox" name="" id="'.$semester_row['id'].'"></td>
                </tr>
            ';
        }
        echo '
            <tr>
                <td colspan="10">
                    <input type="submit" name="attendance_submit" value="Save"
                </td>
            </tr>';
        echo '</table>';
        echo '</div>';
    } else {
        echo 'Data not found';
    }
    mysqli_close($connect);
} catch (Exception $e) {
    die('table display error: ' . $e->getMessage());
}
?>


</body>

</html>

<!-- <script src="present_btnjs.js"></script>
    <script src="attendance_counterjs.js"></script>
    <script src="../title bar/menu_berjs.js"></script> -->
<!-- <a href="insert_present_counter.php?roll='. $semester_row['RollNo'].'&present=1". class="attendancebtn" id="idpresent" name="present" title="present">present</a> -->
<!-- <a href="absent_counter.php?id=' . $semester_row['id'] .'" class="attendancebtn" id="absent" name="absent" title="absent">absent</a> -->


<!-- echo '<tr>
                    <td>
                    <img src="../registration form/student_images/' . $semester_row['image'] . '" class="student_tbl_pic" onclick ="profile_details()">  
                    </td>
                    <td>' . $semester_row['RollNo'] . '</td>
                    <td class="leftname">' . $semester_row['Name'] . '</td>
                    <td>' . $semester_row['year'] . '</td>
                    <td>' . $semester_row['semester'] . '</td>
                    <td>' . $semester_row['section'] . '</td>
                    <td><input type="checkbox" name="" id="'.$semester_row['id'].'"></td>
                </tr>

            '; -->
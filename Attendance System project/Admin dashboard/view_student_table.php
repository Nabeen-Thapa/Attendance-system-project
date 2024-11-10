<?php
error_reporting(E_ALL);
$search = "";
try {
    include '../database and tables/create_database.php';
    include_once 'Search_bar.php';

    if (isset($_POST['searchBox']) && !empty($_POST['searchBox'])) {
        $search = $_POST['searchBox'];
        $select_student = "SELECT Student_table.*, batch_table.Title as batch_name, course_table.Name as course_name, Year_table.Name as year, Semester_table.Name as semester, CASE 
        WHEN status = 1 THEN 'Enabled'
        ELSE 'Disabled'
        END AS status_display
        FROM Student_table 
        INNER JOIN batch_table ON Student_table.batch_id = batch_table.id
        INNER JOIN course_table ON Student_table.std_course = course_table.id
        INNER JOIN Year_table ON Student_table.year = Year_table.id
        INNER JOIN semester_table ON Student_table.semester = semester_table.id
        WHERE Student_table.Name LIKE '%$search%' OR Student_table.RollNo like '$search' or course_table.Name LIKE '%$search%' or batch_table.Title LIKE '%$search%' OR Semester_table.Name like '%$search%'";
        
    } else {
        $select_student = "SELECT Student_table.*, batch_table.Title as batch_name, course_table.Name as course_name, Year_table.Name as year, Semester_table.Name as semester, CASE 
        WHEN status = 1 THEN 'Enabled'
        ELSE 'Disabled'
        END AS status_display
        FROM Student_table 
        INNER JOIN batch_table ON Student_table.batch_id = batch_table.id
        INNER JOIN course_table ON Student_table.std_course = course_table.id
        INNER JOIN Year_table ON Student_table.year = Year_table.id
        INNER JOIN semester_table ON Student_table.semester = semester_table.id";
    }

    $result_student = mysqli_query($connect, $select_student);

    if (mysqli_num_rows($result_student) > 0) {
        echo "<div class='std_edit_tbl' id='student_edit'>";
        echo "<center><h2>Attendance edit table</h2></center>";
        echo '<table border="1">
                <tr>
                    <th rowspan="2" id="edit_profle">Profile</th>                
                    <th rowspan="2" class="edit_id_roll">Roll No</th>
                    <th rowspan="2" class="attendance_tbl" id="Aname">Name</th>
                    <th rowspan="2" class="attendance_tbl" id="Apro">Program</th>
                    <th rowspan="2" class="attendance_tbl" id="Ayear">Year</th>
                    <th rowspan="2" class="attendance_tbl" id="Abatch">Batch</th>
                    <th rowspan="2" class="attendance_tbl" id="Asem">Semester</th> 
                    <th rowspan="2" class="attendance_tbl" id="Asem">Section</th> 
                    <th rowspan="2" class="attendance_tbl" id="Asem">Status</th> 
                    <th colspan="3">Perform</th>
                </tr>
                <tr>
                    <th class="std_hedit">Edit</th>
                    <th class="std_hedit">Delete</th>
                    <th class="std_hedit">Change Status</th>   
                </tr>';
        while ($row_student = mysqli_fetch_assoc($result_student)) {
            echo '<tr>
                <td><img src="../registration form/student_images/' . $row_student['image'] . '" class="student_tbl_pic" onclick="profile_details()"></td>  
                <td>' . $row_student['RollNo'] . '</td>
                <td class="align_left">' . $row_student['Name'] . '</td>
                <td>' . $row_student['course_name'] . '</td>
                <td>' . $row_student['year'] . '</td>
                <td>' . $row_student['batch_name'] . '</td>
                <td>' . $row_student['semester'] . '</td>
                <td>' . $row_student['section'] . '</td>
                <td>' . $row_student['status_display'] . '</td>
                
                <td><a onclick="return confirm(\'Are you sure you want to edit?\')" href="update_student.php?id=' . $row_student['id'] . '"><img src="../images/edited.png" id="student_edit" class="std_edit" title="edit"></a></td>

                <td><a onclick="return confirm(\'Are you sure you want to delete?\')" href="delete_student.php?id=' . $row_student['id'] . '"><img src="../images/deleted.png" id="std_delete" class="std_edit" title="delete"></a></td>
                <td><a onclick="return confirm(\'It will make student enable/disable?\')" href="change_student_status.php?id=' . $row_student['id'] . '&status=' . $row_student['status'] . '"><img src="../images/std_status.png" id="std_disable" class="std_edit" title="enable/disable"></a></td>
            </tr>';
        }
        echo '</table>';
        echo '</div>';
    } else {
        echo 'Data not found';
    }

    mysqli_close($connect);
} catch (Exception $e) {
    die('Student edit table: ' . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Edit Table</title>
    <link rel="stylesheet" href="student_edit_tablecss.css">
</head>
<body>
</body>
</html>

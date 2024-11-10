<?php
include ("student_title_bar.php");

error_reporting(E_ALL);
try 
{
    include '../database and tables/create_database.php';   
    // Fetch data
    $student_id =$_SESSION['student_id'];
    $attendance_select = "SELECT attendence_record_table.*,student_table.Name as std_name,student_table.RollNo as std_roll,student_table.image as std_img, subjects_table.Title as sub_name from attendence_record_table
    INNER JOIN student_table on attendence_record_table.student_id = student_table.id 
    INNER JOIN subjects_table on attendence_record_table.subject_id = subjects_table.id
    where student_table.id = '$student_id'
    ";
    $attendance_result = mysqli_query($connect, $attendance_select);

    if (mysqli_num_rows($attendance_result) > 0) {
        echo"<div class='view_attendace_record'";
        echo "<center><h2>Attendance record</h2></center>";
        echo "<div class='view_dropdown'>";
        include "../admin dashboard/view_student_dropdown.php";
        echo "</div>";
        echo '<table>
                <tr>
                    <th>profile</th>               
                    <th>Roll No</th>
                    <th>Name</th>
                    <th>date</th>
                    <th>attendance</th>
                </tr>
            ';

        while ($attendance_row = mysqli_fetch_assoc($attendance_result)) {
            echo '<tr>
            <td>
            <img src="../registration form/student_images/' .$attendance_row['std_img'].'" class="student_tbl_pic" onclick ="profile_details()">  
            </td>
                    <td>' . $attendance_row['std_roll'] . '</td>
                    <td class="leftname">' . $attendance_row['std_name'] . '</td>
                    <td>' . $attendance_row['date'] . '</td>
                    <td>' .  ($attendance_row['status']==1 ? "present": "absent") . '</td>
                </tr>
            ';
        }
        echo '</table>';
        echo'</div>';
    } else {
        echo 'Data not found';
    }
} catch (Exception $e) {
    die('table display error: ' . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>student attendace records</title>
    <link rel="stylesheet" href="../Admin dashboard/admin_view_css.css">
    <link rel="stylesheet" href="../Admin dashboard/std_record_tblcss.css">
</head>
<body>
   
    
</body>
</html>

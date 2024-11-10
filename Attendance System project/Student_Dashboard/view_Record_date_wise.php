<?php
include ("student_title_bar.php");

error_reporting(E_ALL);
try {
    include '../database and tables/create_database.php';

    // Fetch aggregated data
    $sem_id = $_GET['sem_id'];
    $sub_id = $_GET['sub_id'];
    $sub_tilte = $_GET['sub_title'];
    $std_id= $_GET['std_id'];

    // Corrected SQL Query with separate columns for present and absent dates
    $attendance_select = "SELECT 
        student_table.Name AS std_name, 
        student_table.RollNo AS std_roll, 
        student_table.image AS std_img,
        batch_table.Title AS batch_name, 
        semester_table.Name AS semester_name,
        CASE 
            WHEN attendence_record_table.status = 1 THEN attendence_record_table.date
            ELSE NULL
        END AS present_date,
        CASE 
            WHEN attendence_record_table.status = 0 THEN attendence_record_table.date
            ELSE NULL
        END AS absent_date
    FROM attendence_record_table
    INNER JOIN 
        student_table ON attendence_record_table.student_id = student_table.id
    INNER JOIN 
        batch_table ON student_table.batch_id = batch_table.id
    INNER JOIN 
        semester_table ON student_table.semester = semester_table.id
    WHERE student_table.semester = '$sem_id'
        AND attendence_record_table.subject_id = '$sub_id'
        AND attendence_record_table.student_id = '$std_id'
    ";

    $attendance_result = mysqli_query($connect, $attendance_select);

    if (mysqli_num_rows($attendance_result) > 0) {
        echo "<div class='view_attendace_record'>";
        echo "<center><h2>Attendance Record</h2></center>";
        echo "<center><h3>subject name : " . $sub_tilte . "</h3></center>";
        echo "<div class='view_dropdown'></div>";
        echo '<table>
                <tr>
                    <th>Profile</th>               
                    <th>Roll No</th>
                    <th>Name</th>
                    <th>Batch</th>
                    <th>Semester</th>
                    <th>Present Date</th>
                    <th>Absent Date</th>
                </tr>
            ';

        while ($attendance_row = mysqli_fetch_assoc($attendance_result)) {
            echo '<tr>
                    <td>
                        <img src="../registration form/student_images/' . $attendance_row['std_img'] . '" class="student_tbl_pic" onclick="profile_details()">  
                    </td>
                    <td>' . $attendance_row['std_roll'] . '</td>
                    <td class="leftname">' . $attendance_row['std_name'] . '</td>
                    <td>' . $attendance_row['batch_name'] . '</td>
                    <td>' . $attendance_row['semester_name'] . '</td>
                    <td>' . ($attendance_row['present_date'] ?: '-') . '</td>
                    <td>' . ($attendance_row['absent_date'] ?: '-') . '</td>
                </tr>
            ';
        }
        echo '</table>';
        echo '</div>';
    } else {
        echo 'Data not found';
    }
} catch (Exception $e) {
    die('Table display error: ' . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Attendance Records</title>
    <link rel="stylesheet" href="../Admin dashboard/admin_view_css.css">
    <link rel="stylesheet" href="../Admin dashboard/std_record_tblcss.css">
</head>

<body>
</body>

</html>

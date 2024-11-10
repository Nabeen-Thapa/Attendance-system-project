<?php
include ("admin_title_bar.php");
include ("admin_side_bar.php");
include_once 'Search_bar.php';
error_reporting(E_ALL);
try {
    include '../database and tables/create_database.php';
    // Fetch aggregated data
    if(isset($_POST['searchBox']) && !empty($_POST['searchBox'])){
        $search= $_POST['searchBox'];
    $attendance_select = "SELECT 
        student_table.Name AS std_name, 
        student_table.RollNo AS std_roll, 
        student_table.image AS std_img,
        batch_table.Title AS batch_name, 
        semester_table.Name AS semester_name,
        COUNT(CASE WHEN attendence_record_table.status = 1 THEN 1 END) AS present_count,
        COUNT(CASE WHEN attendence_record_table.status = 0 THEN 1 END) AS absent_count
    FROM attendence_record_table
    INNER JOIN 
        student_table ON attendence_record_table.student_id = student_table.id
    INNER JOIN 
        batch_table ON student_table.batch_id = batch_table.id
    INNER JOIN 
        semester_table ON student_table.semester = semester_table.id
        WHERE Student_table.Name LIKE '%$search%' OR Student_table.RollNo like '$search' OR Semester_table.Name like '%$search%'
    GROUP BY 
        student_table.id, student_table.Name, student_table.RollNo, student_table.image, batch_table.Title, semester_table.Name
        order by student_table.RollNo
    ";
    }else{
        $attendance_select = "SELECT 
        student_table.Name AS std_name, 
        student_table.RollNo AS std_roll, 
        student_table.image AS std_img,
        batch_table.Title AS batch_name, 
        semester_table.Name AS semester_name,
        COUNT(CASE WHEN attendence_record_table.status = 1 THEN 1 END) AS present_count,
        COUNT(CASE WHEN attendence_record_table.status = 0 THEN 1 END) AS absent_count
    FROM attendence_record_table
    INNER JOIN 
        student_table ON attendence_record_table.student_id = student_table.id
    INNER JOIN 
        batch_table ON student_table.batch_id = batch_table.id
    INNER JOIN 
        semester_table ON student_table.semester = semester_table.id
    GROUP BY 
        student_table.id, student_table.Name, student_table.RollNo, student_table.image, batch_table.Title, semester_table.Name
        order by student_table.RollNo
    ";
    }
    $attendance_result = mysqli_query($connect, $attendance_select);

    if (mysqli_num_rows($attendance_result) > 0) {
        echo "<div class='view_attendace_record'>";
        echo "<center><h2>Attendance Record</h2></center>";
        // echo "<div class='view_dropdown'>";
        // //include "view_student_dropdown.php";
        // echo "</div>";
        echo '<table>
                <tr>
                    <th>Profile</th>               
                    <th>Roll No</th>
                    <th>Name</th>
                    <th>Batch</th>
                    <th>Semester</th>
                    <th>Present Days</th>
                    <th>Absent Days</th>
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
                    <td>' . $attendance_row['present_count'] . '</td>
                    <td>' . $attendance_row['absent_count'] . '</td>
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
    <link rel="stylesheet" href="admin_view_css.css">
    <link rel="stylesheet" href="std_record_tblcss.css">
</head>

<body>
    
</body>

</html>

<?php
include ("admin_title_bar.php");
include ("admin_side_bar.php");
error_reporting(E_ALL);
try 
{
    include '../database and tables/create_database.php';
    
    // Fetch data
    $std_request_show = "SELECT Student_request_details.*, batch_table.Title as batch_name , course_table.Name as course_name, Year_table.Name as year, Semester_table.Name As semester 
     from Student_request_details
    INNER JOIN batch_table on Student_request_details.batch_id = batch_table.id 
    INNER JOIN course_table on Student_request_details.std_course = course_table.id
    INNER JOIN Year_table on Student_request_details.year = year_table.id 
    INNER JOIN Semester_table on Student_request_details.semester = Semester_table.id";

    $std_req_result = mysqli_query($connect, $std_request_show);

    if (mysqli_num_rows($std_req_result) > 0) {
        echo"<div class='std_edit_tbl'id='student_edit'>";
        echo "<center><h2>Attendance edit table</h2></center>";
        echo '<table border="1">
                <tr>
                    <th rowspan="2" id="edit_profle">profile</th>                
                    <th rowspan="2" class="edit_id_roll">Roll No</th>
                    <th rowspan="2" class="attendance_tbl" id="Aname">Name</th>
                    <th rowspan="2" class="attendance_tbl" id="Apro">Program</th>
                    <th rowspan="2" class="attendance_tbl" id="Ayear">year</th>
                    <th rowspan="2" class="attendance_tbl" id="Ayear">batch</th>
                    <th rowspan="2" class="attendance_tbl" id="Asem">Semester</th> 
                    <th rowspan="2" class="attendance_tbl" id="Asem">Section</th> 
                    <th colspan="5">operation</th>
                </tr>
                <tr>
                <th class="std_hedit">view</th>
                    <th class="std_hedit">accept</th>
                    <th class="std_hedit">reject</th>   
                </tr>    
            ';
        while ($row = mysqli_fetch_assoc($std_req_result)) {
            echo '<tr>
                <td>
                <a href="std_request_view.php?id='. $row['id'] .'">
                <img src="../registration form/student_images/' .$row['image'].'" class="student_tbl_pic" onclick ="profile_details()"> </a> 
                </td>  
                <td>' . $row['RollNo'] . '</td>
                <td class="align_left">' . $row['Name'] . '</td>
                <td>' . $row['course_name'] . '</td>
                <td>' . $row['year'] . '</td>
                <td>' . $row['batch_name'] . '</td>
                <td>' . $row['semester']. '</td>
                <td>' . $row['section']. '</td>

                <td>     
                    <a href="std_request_view.php?id='.$row['id'].'">view</a>
                </td>
                <td>     
                    <a href="std_request_accept.php?acc_id='. $row['id'].'">Accept</a>
                </td>
                <td>
                    <a onclick="return confirm(\'are you sure for delete?\')" href="std_req_reject.php?rej_id=' . $row['id'] . '">reject</a>
                </td>
                    
            </tr>
            ';
        }
        echo '</table>';
        echo'</div>';
    } else {
        echo '<script>alert("no request");</script>';
    }
    mysqli_close($connect);
} catch (Exception $e) {
    die('student edit table: ' . $e->getMessage());
}
?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>student edit table</title>
    <link rel="stylesheet" href="../student attendance record tables/student_edit_tablecss.css">
    
</head>
<body>
</body>
</html>


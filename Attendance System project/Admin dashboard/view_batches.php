<?php
include ("admin_title_bar.php");
include ("admin_side_bar.php");
error_reporting(E_ALL);
try 
{
    include '../database and tables/create_database.php';
    
    // Fetch data
    
    $select_batchs = "SELECT batch_table.*, course_table.Name AS course_name, 
    year_table.Name AS year_name, semester_table.Name AS semester_name 
    FROM batch_table 
    INNER JOIN course_table ON batch_table.course_id = course_table.id
    INNER JOIN year_table ON batch_table.year_id = year_table.id
    INNER JOIN semester_table ON batch_table.sem_id = semester_table.id";

    $result_batchs = mysqli_query($connect, $select_batchs);

    if (mysqli_num_rows($result_batchs) > 0) {
        echo"<div class='admin_batchs_view_tables'>";
        echo ' ";
        echo "<h2 class="batch_title">Attendance edit table</h2>';
        echo '<table border="1">
                <tr> 
                    <th>title</th>
                    <th>course</th>
                    <th>year</th>
                    <th>semester</th>
                    <th>start date</th>
                    <th>end</th>
                    <th colspan="2">operation</th>
                </tr>
            ';
        while ($batch_row = mysqli_fetch_assoc($result_batchs)) {
            echo '<tr>
                <td>' . $batch_row['Title'] . '</td>
                <td>' . $batch_row['course_name'] . '</td>
                <td>' . $batch_row['year_name'] . '</td>
                <td>' . $batch_row['semester_name'] . '</td>
                <td>' . $batch_row['start_year'] . '</td>
                <td>' . $batch_row['end_year'] . '</td>
                <td>     
                    <a onclick="return confirm(\'are you sure for edit\')" href="update_student.php?id=' . $batch_row['id'] .'"> <img src="../images/edited.png" id="student_edit" onclick ="Sedit()" class="std_edit" title="edit"></a>
                </td>
                <td>
                    <a onclick="return confirm(\'are you sure for delete?\')" href="delete_student.php?id=' . $batch_row['id'] . '"><img src="../images/deleted.png" id="std_delete" onclick ="Sdelete()" class="std_edit"  title="delete"> </a>
                </td>
                    
            </tr>
            ';
        }
        echo '</table>';
        echo'</div>';
    } else {
        echo 'Data not found';
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
    <link rel="stylesheet" href="admin_view_css.css">
</head>
<body>
</body>
</html>


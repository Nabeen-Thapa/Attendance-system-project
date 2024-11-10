<?php

error_reporting(E_ALL);
try 
{
    include '../database and tables/create_database.php';
      include ("admin_title_bar.php");
     include ("admin_side_bar.php");
    // Fetch data
    $select_programs = "SELECT * FROM course_table";
    $result_programs = mysqli_query($connect, $select_programs);

    if (mysqli_num_rows($result_programs) > 0) {
        echo"<div class='admin_programs_view_tables'>";
        echo "<h2 class='program_title'>Attendance edit table</h2>";
        echo '<table border="1">
                <tr> 
                    <th>Name</th>
                    <th>type</th>
                    <th colspan="2">operation</th>
                </tr>
            ';
        while ($program_row = mysqli_fetch_assoc($result_programs)) {
            echo '<tr>
                <td>' . $program_row['Name'] . '</td>
                <td>' . $program_row['course_type'] . '</td>
                <td>     
                    <a onclick="return confirm(\'are you sure for edit\')" href="update_student.php?id=' . $program_row['id'] .'"> <img src="../images/edited.png" id="student_edit" onclick ="Sedit()" class="std_edit" title="edit"></a>
                </td>
                <td>
                    <a onclick="return confirm(\'are you sure for delete?\')" href="delete_student.php?id=' . $program_row['id'] . '"><img src="../images/deleted.png" id="std_delete" onclick ="Sdelete()" class="std_edit"  title="delete"> </a>
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


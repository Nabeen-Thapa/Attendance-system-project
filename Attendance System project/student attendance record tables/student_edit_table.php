<?php

error_reporting(E_ALL);
try 
{
    include '../database and tables/create_database.php';
    include ("../title bar/title_bar.php");
    include ("../title bar/menu_bar.php");
    // Fetch data
    $select = "SELECT * FROM Student_table";
    $result = mysqli_query($connect, $select);

    if (mysqli_num_rows($result) > 0) {
        echo"<div class='std_edit_tbl'id='student_edit'>";
        echo "<center><h2>Attendance edit table</h2></center>";
        echo '<table border="1">
                <tr>
                    <th rowspan="2" id="edit_profle">profile</th>  
                    <th rowspan="2" class="edit_id_roll">ID</th>              
                    <th rowspan="2" class="edit_id_roll">Roll No</th>
                    <th rowspan="2" class="attendance_tbl" id="Aname">Name</th>
                    <th rowspan="2" class="attendance_tbl" id="Apro">Program</th>
                    <th rowspan="2" class="attendance_tbl" id="Ayear">year</th>
                    <th rowspan="2" class="attendance_tbl" id="Asem">Semester</th> 
                    <th rowspan="2" class="attendance_tbl" id="Asem">Section</th> 
                    <th colspan="5">operation</th>
                </tr>
                <tr>
                    <th class="std_hedit">edit</th>
                    <th class="std_hedit">delete</th>   
                </tr>    
            ';
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>
                <td>
                <img src="../registration form/student_images/' .$row['image'].'" class="student_tbl_pic" onclick ="profile_details()">  
                </td>  
                <td>' . $row['id'] . '</td>
                <td>' . $row['RollNo'] . '</td>
                <td class="align_left">' . $row['Name'] . '</td>
                <td>' . $row['std_course'] . '</td>
                <td>' . $row['year'] . '</td>
                <td>' . $row['semester']. '</td>
                <td>' . $row['section']. '</td>
                <td>     
                    <a onclick="return confirm(\'are you sure for edit\')" href="update_student.php?id=' . $row['id'] .'"> <img src="images/edited.png" id="student_edit" onclick ="Sedit()" class="std_edit" title="edit"></a>
                </td>
                <td>
                    <a onclick="return confirm(\'are you sure for delete?\')" href="delete_student.php?id=' . $row['id'] . '"><img src="images/deleted.png" id="std_delete" onclick ="Sdelete()" class="std_edit"  title="delete"> </a>
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
    <link rel="stylesheet" href="student_edit_tablecss.css">
    <link rel="stylesheet" href="../title bar/title_bar_css.css">
    <link rel="stylesheet" href="../title bar/menu_barcss.css">
</head>
<body>
</body>
</html>


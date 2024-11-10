<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>student attendace records</title>
    <link rel="stylesheet" href="student_attendance_tblcss.css">
    <link rel="stylesheet" href="std_record_tblcss.css">
    <link rel="stylesheet" href="../title bar/title_bar_css.css">
    <link rel="stylesheet" href="../title bar/menu_barcss.css">
</head>
<body>
   
    <!-- <script src="../Display Tables/attendance_counterjs.js"></script> -->
    <script src="../title bar/menu_berjs.js"></script>
</body>
</html>
<?php

    //attendance present counter
    // include("../Display Tables/Attendacne_counter.php");
    // include ("../Display Tables/student_attendance_table.php");

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
        echo"<div class='std_tbl_css'id='student_record'>";
        echo "<center><h2>Attendance record</h2></center>";
        echo '<table border="1">
                <tr>
                <th rowspan="2">profile</th> 
                    <th rowspan="2">ID</th>              
                    <th rowspan="2">Roll No</th>
                    <th rowspan="2">Name</th>
                    <th rowspan="2">Program</th>
                    <th rowspan="2">year</th>
                    <th rowspan="2">Semester</th> 
                    <th colspan="12">Month of</th>
                    <th rowspan="2">total</th>
                </tr>
                <tr>
                    <th class="rec_months">Jan</th>
                    <th class="rec_months">Feb</th>
                    <th class="rec_months">Mar</th>
                    <th class="rec_months">Apr</th>
                    <th class="rec_months">May</th>
                    <th class="rec_months">Jun</th>
                    <th class="rec_months">Jul</th>
                    <th class="rec_months">Aug</th>
                    <th class="rec_months">Sep</th>
                    <th class="rec_months">Oct</th>
                    <th class="rec_months">Nov</th>
                    <th class="rec_months">Dec</th>
                </tr> 
                   
            ';

        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>
            <td>
            <img src="../registration form/student_images/' .$row['image'].'" class="student_tbl_pic" onclick ="profile_details()">  
            </td>
                    <td>' . $row['id'] . '</td>
                    <td>' . $row['RollNo'] . '</td>
                    <td class="leftname">' . $row['Name'] . '</td>
                    <td>' . $row['std_course'] . '</td>
                    <td>' . $row['year'] . '</td>
                    <td>' . $row['semester']. '</td>
                    <td id="present_counter"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
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
    die('table display error: ' . $e->getMessage());
}
?>
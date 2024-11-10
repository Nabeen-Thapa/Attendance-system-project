<?php
// displaying table for attendace (present/ absent talbe)
include ("../title bar/title_bar.php");
include ("../title bar/menu_bar.php");

error_reporting(E_ALL);
try {
    $connect = mysqli_connect('localhost', 'root', '', 'Attendance_system');
    if (!$connect) {
        die("Connection failed: " . mysqli_connect_error());
    }
    // Fetch data
    $select = "SELECT * FROM Student_table";
    $result = mysqli_query($connect, $select);

    if (mysqli_num_rows($result) > 0) {
        echo "<div class='std_tbl_css' id='student_sheet'>";
        echo "<center><h3>subject: </h3></center>";
        echo "<center><h3>Teacher:</h3></center>";
        echo "<center><h2>Attendance sheet</h2></center>";
        echo '<table border="1">
                <tr>
                    <th>profile</th>          
                    <th class="attendance_tbl">Roll No</th>
                   <th class="attendance_tbl" id="Apro">Program</th>
                    <th class="attendance_tbl" id="Ayear">year</th>
                    <th class="attendance_tbl" id="Asem">Semester</th> 
                    <th class="attendance_tbl" id="Asem">Section</th> 
                    <th class="attendance_tbl" colspan="2">Attendance</th>
                    
                </tr>';

        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>
                    <td>
                    <img src="../registration form/student_images/' . $row['image'] . '" class="student_tbl_pic" onclick ="profile_details()">  
                    </td>
                    <td>' . $row['RollNo'] . '</td>
                    <td class="leftname">' . $row['Name'] . '</td>
                    <td>' . $row['year'] . '</td>
                    <td>' . $row['semester'] . '</td>
                    <td>' . $row['section'] . '</td>
                    <td><input type="checkbox" name="" id="present_checkbox"></td>
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
<!-- <a href="insert_present_counter.php?roll='. $row['RollNo'].'&present=1". class="attendancebtn" id="idpresent" name="present" title="present">present</a> -->
<!-- <a href="absent_counter.php?id=' . $row['id'] .'" class="attendancebtn" id="absent" name="absent" title="absent">absent</a> -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>student table display</title>
    <link rel="stylesheet" href="student_attendance_tblcss.css">

</head>

<body>

    <script src="present_btnjs.js"></script>
    <script src="attendance_counterjs.js"></script>
    <script src="../title bar/menu_berjs.js"></script>
</body>

</html>
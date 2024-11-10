<?php
    include ("../title bar/title_bar.php");
    include ("../title bar/menu_bar.php");
    //attendance present counter
    $present_counter=0;
    if(isset($_POST["present"])){
        $present_counter++;
    }

error_reporting(E_ALL);
try {
    $connect = mysqli_connect('localhost', 'root', '', 'Attendance_system');
    if (!$connect) {
        die("Connection failed: " . mysqli_connect_error());
    }
    // Fetch data
    $select_day = "SELECT * FROM attendance_record_table";
    $result_day = mysqli_query($connect, $select_day);

    if (mysqli_num_rows($result_day) > 0) {
        echo"<div class='std_tbl_css' id='student_sheet'>";
        echo "<center><h2>Attendance sheet</h2></center>";
        echo '<table border="1">
                <tr>
                    <th>profile</th>  
                    <th>ID</th>              
                    <th class="attendance_tbl" id="Aname">Name</th>
                    <th class="attendance_tbl">Registration No</th>
                    
                </tr>';

        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>
                    <td>
                        <img src="../registration form/student_images/' .$row['image'].'" class="student_tbl_pic" onclick ="profile_details()">  
                    </td>
                    <td>' . $row['id'] . '</td>
                    <td class="leftname">' . $row['Name'] . '</td>
                    <td>' . $row['RegistrationNo'] . '</td>
                    <td>' . $row['std_course'] . '</td>
                    <td>' . $row['year'] . '</td>
                    <td>' . $row['semester']. '</td>
                    <td>' . $row['section']. '</td>
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>student table display</title>
    <link rel="stylesheet" href="../title bar/title_bar_css.css">
    <link rel="stylesheet" href="../title bar/menu_barcss.css">
    <link rel="stylesheet" href="student_attendance_tblcss.css">

</head>
<body>
    
    <script src="present_btnjs.js"></script>
    <script src="attendance_counterjs.js"></script>
    <script src="../title bar/menu_berjs.js"></script>
</body>
</html>

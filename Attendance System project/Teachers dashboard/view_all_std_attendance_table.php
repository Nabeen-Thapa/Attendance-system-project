<?php
include ("teacher_title_bar.php");
include ("teacher_side_bar.php");
include_once 'search_bar.php';
include ('../database and tables/create_database.php');
print_r($_POST);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>student attendeance table display</title>
    <link rel="stylesheet" href="view_attendace_table_css.css">
</head>

<body>
    <form action="../database and tables/attendace_record_insert.php"
        method="post">
        <!-- get subject id in value -->
        <input type="hidden" name="subject_id" value="<?php echo $_GET['sub_id']; ?>" />
        <?php
        error_reporting(0);
        try {
            // Fetch data
            
            if(isset($_POST['searchBox']) && !empty($_POST['searchBox'])){
                $searched =$_POST['searchBox'];

            $student_select = " SELECT Student_table.*, batch_table.Title as batch_name, course_table.Name as course_name , year_table.Name as year_name, Semester_table.Name as semester
            FROM Student_table 
            INNER JOIN batch_table ON Student_table.batch_id = batch_table.id
            INNER JOIN course_table ON Student_table.std_course = course_table.id
            INNER JOIN semester_table ON Student_table.semester = semester_table.id
            INNER JOIN year_table ON Student_table.year = year_table.id
            where 
             Student_table.Name like '%$searched%' OR Student_table.RollNO like '%$searched%' OR Year_table.Name like '%$searched%' OR Semester_table.Name like '%$searched%' OR batch_table.Title like '%$searched%' AND
             Student_table.status = '1'";
            }else{
                $student_select = "SELECT Student_table.*, batch_table.Title as batch_name, course_table.Name as course_name , year_table.Name as year_name, Semester_table.Name as semester
                 FROM Student_table 
                INNER JOIN batch_table ON Student_table.batch_id = batch_table.id
                INNER JOIN course_table ON Student_table.std_course = course_table.
                id
                INNER JOIN year_table ON Student_table.year = year_table.id
                INNER JOIN semester_table ON Student_table.semester = semester_table.id
                where
                 Student_table.status = '1'";
            }
            $student_result = mysqli_query($connect, $student_select);

            if (mysqli_num_rows($student_result) > 0) {

                echo "<div class='std_tbl_css' id='student_sheet'>";
                echo "<center><h2>Attendance sheet</h2></center>";
                echo '<table border="1">
                <tr>
                    <th>profile</th>          
                    <th class="attendance_tbl">Roll No</th>
                    <th class="attendance_tbl" id="Apro">Name</th>
                   <th class="attendance_tbl" id="Apro">Program</th>
                    <th class="attendance_tbl" id="Ayear">year</th>
                    <th class="attendance_tbl" id="Ayear">batch</th>
                    <th class="attendance_tbl" id="Asem">Semester</th> 
                    <th class="attendance_tbl" id="Asem">Section</th> 
                    <th class="attendance_tbl">present</th>
                    <th class="attendance_tbl">Absent</th>
                    
                </tr>';

                while ($student_row = mysqli_fetch_assoc($student_result)) {
                    echo '<tr>
                    <td>
                    <img src="../registration form/student_images/' . $student_row['image'] . '" class="student_tbl_pic" onclick ="profile_details()">  
                    </td>
                    <td>' . $student_row['RollNo'] . '</td>
                    <td class="leftname">' . $student_row['Name'] . '</td>
                    <td>' . $student_row['course_name'] . '</td>
                    <td>' . $student_row['year_name'] . '</td>
                    <td>' . $student_row['batch_name'] . '</td>
                    <td>' . $student_row['semester'] . '</td>
                    <td>' . $student_row['section'] . '</td>

                    <td><input type="checkbox" class="attendance_present" name="attendance_present[' . $student_row["id"] . ']">
                    </td>
                    <td>
                    <input type="checkbox" class="attendance_absent" name="attendance_absent[' . $student_row["id"] . ']"></td>
                </tr>
            ';
                }
                echo '
            <tr>
                <td colspan="10">
                <button  calss="save_attendance" name="save_sttendance">Save attendance</button>  
                </td>
            </tr>
        ';
        echo '</table>';
        echo ' <div class="view_attendance_btn">
        <a href="./view_record_subject_wise.php ?sem_id=' . $semester_id. '">view attendance record</a>
        </div>';
    echo '</div>';
            } else {
                echo 'Data not found';
            }
            mysqli_close($connect);
        } catch (Exception $e) {
            die('table display error: ' . $e->getMessage());
        }
        ?>

    </form>

    <script>
        var presentCheckboxes = document.querySelectorAll('.attendance_present');
        var absentCheckboxes = document.querySelectorAll('.attendance_absent');
        // css to change the backgorund color of attendance checkbox while teacher checked
        for (var i = 0; i < presentCheckboxes.length; i++) {
            presentCheckboxes[i].addEventListener('change', function () {
                var row = this.closest('tr');
                if (this.checked) {
                    row.style.backgroundColor = "rgb(75, 73, 73)";
                    row.style.color = "white";
                } else {
                    row.style.backgroundColor = "";
                    row.style.color = "";
                }
            });
        }

        for (var i = 0; i < absentCheckboxes.length; i++) {
            absentCheckboxes[i].addEventListener('change', function () {
                var row = this.closest('tr');
                if (this.checked) {
                    row.style.backgroundColor = "rgb(238, 114, 51)";
                    row.style.color = "black";
                } else {
                    row.style.backgroundColor = "";
                    row.style.color = "";
                }
            });
        }
    </script>

</body>

</html>
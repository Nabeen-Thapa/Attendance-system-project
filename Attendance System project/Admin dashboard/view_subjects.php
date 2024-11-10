<?php
include ("admin_title_bar.php");
include ("admin_side_bar.php");
include ("search_bar.php");
?>

<?php
error_reporting(E_ALL);
try {
    include '../database and tables/create_database.php';
    // Fetch data
    if (isset($_POST['searchBox']) && !empty($_POST['searchBox'])) {
        $search = $_POST['searchBox'];
        $select_teacher_subjects = "SELECT subjects_table.*, course_table.Name as course_name, year_table.Name as year_name, semester_table.Name as semester_name from subjects_table  
        INNER JOIN course_table on subjects_table.course_id = course_table.id
        INNER JOIN year_table on subjects_table.year_id = year_table.id
        INNER JOIN semester_table on subjects_table.semester_id = semester_table.id
         WHERE subjects_table.Title LIKE '%$search%' or semester_table.Name LIKE '%$search%' or course_table.Name LIKE '%$search%'";

    }else{ 
    $select_teacher_subjects = "SELECT subjects_table.*, course_table.Name as course_name, year_table.Name as year_name, semester_table.Name as semester_name from subjects_table  
    INNER JOIN course_table on subjects_table.course_id = course_table.id
    INNER JOIN year_table on subjects_table.year_id = year_table.id
    INNER JOIN semester_table on subjects_table.semester_id = semester_table.id";
    }

    $result_teacher_subjects = mysqli_query($connect, $select_teacher_subjects);

    if (mysqli_num_rows($result_teacher_subjects) > 0) {
        echo "<div class='admin_teacher_subjects_view_tables'>";
        echo "<center><h2 class='teacher_subject_title'>list of all subjects</h2></center>";
        echo '<table>
                <tr> 
                    <th>title</th>
                    <th>course</th>
                    <th>year</th>
                    <th>semester</th>
                    <th>view attendace record</th>
                    
                </tr>
            ';
        while ($teacher_subject_row = mysqli_fetch_assoc($result_teacher_subjects)) {
            echo '<tr>
                <td>' . $teacher_subject_row['Title'] . '</td>
                <td>' . $teacher_subject_row['course_name'] . '</td>
                <td>' . $teacher_subject_row['year_name'] . '</td>
                <td>' . $teacher_subject_row['semester_name'] . '</td>
                <td>     
                    <a href="view_record_subject_wise.php?subject_id=' . $teacher_subject_row['id'] . '&sem_id=' . $teacher_subject_row['Semester_id'] . '&sub_title='.$teacher_subject_row['Title'].'"> <img src="../images/view_std_record.png" id="student_edit" onclick ="Sedit()" class="std_edit" title="view record"></a>
                </td>
                
                    
            </tr>
            ';
        }
        echo '</table>';
        echo '</div>';
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
    <link rel="stylesheet" href="search_bar.css">
</head>

<body>
</body>

</html>
<td>     
                    <!-- 
// <th colspan="2">perform</th>
                    <a onclick="return confirm(\'are you sure for edit\')" href=".php?id=' . $teacher_subject_row['id'] . '"> <img src="../images/edited.png" id="student_edit" onclick ="Sedit()" class="std_edit" title="edit"></a>
                </td>
                <td>
                    <a onclick="return confirm(\'are you sure for delete?\')" href="delete_student.php?id=' . $teacher_subject_row['id'] . '"><img src="../images/deleted.png" id="std_delete" onclick ="Sdelete()" class="std_edit"  title="delete"> </a>
                </td> -->
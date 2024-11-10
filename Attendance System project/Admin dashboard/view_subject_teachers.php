<?php
include ("admin_title_bar.php");
include ("admin_side_bar.php");
include_once 'search_bar.php';
error_reporting(E_ALL);
try {
    include '../database and tables/create_database.php';
    
    if(isset($_POST['searchBox']) && !empty($_POST['searchBox'])){
        $searched =$_POST['searchBox'];
    $select_subjects = "SELECT subject_assign_teacher.*,
    teacher_details.Name as teacher_Name,
    teacher_details.Email as teacher_Email, 
    teacher_details.Phone as teacher_Phone,
    teacher_details.image as teacher_image, 
    course_table.Name AS course_name, 
    batch_table.Title AS batch_name, 
    semester_table.Name AS semester_name,  
    subjects_table.Title as subject_name ,
    subjects_table.Subject_code as subject_code 
    FROM subject_assign_teacher 
    INNER JOIN teacher_details ON subject_assign_teacher.Teacher_id=teacher_details.id
    INNER JOIN course_table ON subject_assign_teacher.course_id = course_table.id
    INNER JOIN batch_table ON subject_assign_teacher.batch_id = batch_table.id
    INNER JOIN semester_table ON subject_assign_teacher.semester_id = semester_table.id
    INNER JOIN subjects_table ON subject_assign_teacher.subject_id = subjects_table.id
     where teacher_details.Name like '%$searched%' OR subjects_table.Title like '%$searched%'  OR Semester_table.Name like '%$searched%' OR batch_table.Title like '%$searched%' OR course_table.Name like '%$searched%'
    ";
    }else{
        $select_subjects = "SELECT subject_assign_teacher.*,
    teacher_details.Name as teacher_Name,
    teacher_details.Email as teacher_Email, 
    teacher_details.Phone as teacher_Phone,
    teacher_details.image as teacher_image, 
    course_table.Name AS course_name, 
    batch_table.Title AS batch_name, 
    semester_table.Name AS semester_name,  
    subjects_table.Title as subject_name ,
    subjects_table.Subject_code as subject_code 
    FROM subject_assign_teacher 
    INNER JOIN teacher_details ON subject_assign_teacher.Teacher_id=teacher_details.id
    INNER JOIN course_table ON subject_assign_teacher.course_id = course_table.id
    INNER JOIN batch_table ON subject_assign_teacher.batch_id = batch_table.id
    INNER JOIN semester_table ON subject_assign_teacher.semester_id = semester_table.id
    INNER JOIN subjects_table ON subject_assign_teacher.subject_id = subjects_table.id";
    }
    $result_subjects = mysqli_query($connect, $select_subjects);

    if (mysqli_num_rows($result_subjects) > 0) {
        echo "<div class='admin_subject_view_tables'>";
        echo "<center><h2 class='subject_title'>Attendance edit table</h2></center>";
        echo '<table>
                <tr> 
                <th  colspan="4" class="sub_teach_details">subject teacher details</th>
                    <th  colspan="4" class="sub_teach_details">subject details</th>
                    <th colspan="2" rowspan = "2">operation</th>
                </tr>
                <tr> 
                    <th>profile</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>subject Name</th>
                    <th>subject code</th>
                    <th>course</th>
                    <th>semester</th>
                </tr>
            ';
        while ($subject_row = mysqli_fetch_assoc($result_subjects)) {
            echo '<tr>
            <td>
                <img src="teacher_images/' .$subject_row['teacher_image'].'" class="teachers_profile">  
                </td>  
                <td>' . $subject_row['teacher_Name'] . '</td>
                <td>' . $subject_row['teacher_Email'] . '</td>
                <td>' . $subject_row['teacher_Phone'] . '</td>
                <td>' . $subject_row['subject_name'] . '</td>
                <td>' . $subject_row['subject_code'] . '</td>
                <td>' . $subject_row['course_name'] . '</td>
                <td>' . $subject_row['semester_name'] . '</td>
                
                <td>     
                    <a onclick="return confirm(\'are you sure for edit\')" href="###############?id=' . $subject_row['id'] . '"> <img src="../images/edited.png" id="student_edit" onclick ="Sedit()" class="std_edit" title="edit"></a>
                </td>
                <td>
                    <a onclick="return confirm(\'are you sure for delete?\')" href="############?id=' . $subject_row['id'] . '"><img src="../images/deleted.png" id="std_delete" onclick ="Sdelete()" class="std_edit"  title="delete"> </a>
                </td>
                    
            </tr>
            ';
        }
        echo '</table>';
        echo '</div>';
    } else {
        echo '<script>alert("Data not found");</script>';
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
    <title>view subjects</title>
    <link rel="stylesheet" href="admin_view_css.css">
</head>

<body>
</body>

</html>







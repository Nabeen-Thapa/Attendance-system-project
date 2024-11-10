<?php
include ("admin_title_bar.php");
include ("admin_side_bar.php");
include_once 'Search_bar.php';
error_reporting(E_ALL);
try 
{
    include '../database and tables/create_database.php';
    if(isset($_POST['searchBox']) && !empty($_POST['searchBox'])){
        $search_teacher = $_POST['searchBox'];
    $select_teachers = "SELECT * from teacher_details where Name like '%$search_teacher%'";
    }else {
        $select_teachers = "SELECT * from teacher_details";
    }
    $result_teachers = mysqli_query($connect, $select_teachers);

    if (mysqli_num_rows($result_teachers) > 0) {
        echo"<div class='admin_teachers_view_tables'>";
        echo "<h2>teachers view table</h2>";
        // echo '<a href="add_teacher_form.php" class="add_from_table">add teachers</a>';
        echo '<table>
                <tr>
                    <th rowspan="2">profile</th>  
                    <th rowspan="2" class= "teacher_name">Name</th>
                    <th rowspan="2">Email</th>
                    <th rowspan="2">Phone</th>
                    <th rowspan="2">Address</th>
                    <th colspan="2">perform</th>
                </tr>
                <tr>
                    <th>sdit</th>
                    <th>delete</th>
                </tr>
            ';
        while ($teacher_row = mysqli_fetch_assoc($result_teachers)) {
            echo '<tr>
                <td>
                <img src="teacher_images/' .$teacher_row['image'].'" class="teachers_profile">  
                </td>  
                <td>' . $teacher_row['Name'] . '</td>
                <td>' . $teacher_row['Email'] . '</td>
                <td>' . $teacher_row['Phone'] . '</td>
                <td>' . $teacher_row['address'] . '</td>
                <td>     
                     <a onclick="return confirm(\'are you sure for edit\')" href="update_teachers.php?teacher_update_id=' . $teacher_row['id'] .'"> <img src="../images/edited.png" id="student_edit" onclick ="Sedit()" class="std_edit" title="edit"></a>
                 </td>
                <td>
                    <a onclick="return confirm(\'are you sure for delete?\')" href="delete_teachers.php?id=' . $teacher_row['id'] . '"><img src="../images/deleted.png" id="std_delete" onclick ="Sdelete()" class="std_edit"  title="delete"> </a>
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
<head>
    <link rel="stylesheet" href="admin_view_css.css">
</head>


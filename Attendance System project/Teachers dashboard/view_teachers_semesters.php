<?php
error_reporting(E_ALL);
try {
    include '../database and tables/create_database.php';
    // Fetch data
    $teacher_id = $_SESSION['teacher_id'];
    $select_semesters = "SELECT subject_assign_teacher.*, Semester_table.Name AS semester_name, semester_table.Rank AS semester_rank , subjects_table.Title as subject_name FROM subject_assign_teacher 
    INNER JOIN semester_table ON subject_assign_teacher.semester_id = semester_table.id
    INNER JOIN subjects_table ON subject_assign_teacher.subject_id = subjects_table.id
     where subject_assign_teacher.Teacher_id = '$teacher_id'";
    $result_semesters = mysqli_query($connect, $select_semesters);

    if (mysqli_num_rows($result_semesters) > 0) {
        echo "<div class='view_teacher_semester'>";
       
        echo '<table border="1">
                <tr> 
                    <th>Semester Name</th>
                    <th>subject</th>                  
                    
                </tr>
            ';
        while ($semester_row = mysqli_fetch_assoc($result_semesters)) {
            echo '<tr>
                <td>' . $semester_row['semester_name'] . '</td>
                <td>' . $semester_row['subject_name'] . '</td>
                
                    
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

<head>
    <link rel="stylesheet" href="teacher_view_css.css">

</head>


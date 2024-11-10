<?php
include('../database and tables/create_database.php');
error_reporting(0);

$student_count_name = "SELECT COUNT(Name) AS course_count FROM course_table";
$student_count_name = "SELECT COUNT(Name) AS name_count FROM Student_table";
$student_count_name = "SELECT COUNT(Name) AS all_std_count FROM Student_table";
$student_count_name = "SELECT COUNT(Name) AS name_count FROM Student_table";
$student_count_name = "SELECT COUNT(Name) AS name_count FROM Student_table";
$result_name = mysqli_query($connect, $student_count_name);

if ($result_name && mysqli_num_rows($result_name) == 1) {
    $row = mysqli_fetch_assoc($result_name);
    $count_name = $row['name_count']; 
    print_r($count_name);
} else {
    echo 'Table is empty';
}
?>

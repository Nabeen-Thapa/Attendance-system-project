<?php

error_reporting(E_ALL);

try {
    include('../database and tables/create_database.php');
    $teacher_id = $_GET['id'];
    //delete techer for techer subject_assign_teacher  table
    $delete_teachers_assign = "DELETE FROM subject_assign_teacher WHERE Teacher_id = '$teacher_id'";
    if (mysqli_query($connect, $delete_teachers_assign)) {
        
        // delete the teacher from teacher_details
        $delete_teachers = "DELETE FROM teacher_details WHERE id = '$teacher_id'";
        if (mysqli_query($connect, $delete_teachers)) {
            header('location:teacher_dashboard.php');
            exit;
        } else {
            echo '<script>alert("Failed to delete teacher from teacher_details");</script>';
        }
    } else {
        echo '<script>alert("Failed to delete related records from subject_assign_teacher");</script>';
    }
} catch (Exception $ex) {
    die('Database Error: ' . $ex->getMessage());
}

?>

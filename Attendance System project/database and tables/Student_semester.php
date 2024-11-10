<?php
//include database
include 'create_database.php';
try {
    $std_sem_tbl = "CREATE TABLE IF NOT EXISTS Student_semester(
        id INT AUTO_INCREMENT PRIMARY KEY,
        student_id int,
        semester_id int,
        FOREIGN KEY (student_id) REFERENCES Student_table(id),
        FOREIGN KEY (semester_id) REFERENCES Semester_table(id),
        Enroll_date DATE,
        Status Boolean
    )";
    if(mysqli_query($connect,$std_sem_tbl)){
        echo ' ';
    } else {
        echo 'Failed to create table';
    }
    

    $insert_student_semester = " INSERT INTO Student_semester(student_id, semester_id, Enroll_date, Status) VALUES ('$student', '$semester', '$enroll_date','1')";
    if(mysqli_query($connect, $insert_student_semester)){
        echo ' <script>alert("teaches semester inserted successfully");</script> ';
    } else {
        echo 'Failed to insert into student_semesters table: ' . mysqli_error($connect);
    }


} catch (Exception $ex) {
    die("student semester create table error:" .$ex->getMessage());
}
?>
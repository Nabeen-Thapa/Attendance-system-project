<?php
//include database
include 'create_database.php';
try {
    $teacher_subject_table = "CREATE TABLE IF NOT EXISTS subject_assign_teacher(
        id INT AUTO_INCREMENT PRIMARY KEY,
        course_id int,
        batch_id int,
        semester_id int,
        Teacher_id int,
        subject_id int,
        FOREIGN KEY (course_id) REFERENCES course_table(id),
        FOREIGN KEY (batch_id) REFERENCES batch_table(id),
        FOREIGN KEY (semester_id) REFERENCES semester_table(id),
        FOREIGN KEY (Teacher_id) REFERENCES Teacher_details(id),
        FOREIGN KEY (subject_id) REFERENCES Subjects_table(id),
        class_start_date varchar(20),
        class_end_date varchar(20),
        Status Boolean
    )";
    if(mysqli_query($connect,$teacher_subject_table)){
        echo ' ';
    } else {
        echo 'Failed to create table';
    }
    
    // Assuming $teacher, $subject, $subject_start_date, and $subject_end_date are defined
    $insert_teacher_subject = " INSERT INTO subject_assign_teacher(course_id, batch_id, semester_id,Teacher_id, subject_id, class_start_date, class_end_date, Status) VALUES ('$assign_course','$assign_batch','$assign_sem','$teacher', '$subject', '$subject_start_date', '$subject_end_date','1')";
    if(mysqli_query($connect, $insert_teacher_subject)){
        echo ' <script>alert("teaches subject inserted successfully");</script> ';
    } else {
        echo 'Failed to insert into Teacher_subjects table: ' . mysqli_error($connect);
    }

} catch (Exception $ex) {
    die("teacher subject create table error:" .$ex->getMessage());
}
?>

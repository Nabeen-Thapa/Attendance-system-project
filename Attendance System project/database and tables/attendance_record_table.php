<?php
    include('create_database.php');
    
    try {
       $attendance_record_tbl="CREATE TABLE IF NOT EXISTS attendence_record_table( id int AUTO_INCREMENT PRIMARY KEY,
       subject_id int,
       student_id int,
       date DATE,
       FOREIGN KEY (subject_id) REFERENCES subjects_table(id),
       FOREIGN KEY (student_id) REFERENCES student_table(id),
       status boolean
       )";
       if(mysqli_query($connect, $attendance_record_tbl)){
        echo ' ';
       }else{
        echo 'echck the error';
       }
      

    } catch (Exception $exa) {
        die('attendance record table creation error:'. $exa->getMessage());
    }
?>
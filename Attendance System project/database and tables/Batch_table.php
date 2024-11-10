<?php
try{
    //connection to database
    include 'create_database.php';
    
    //sql to create course table on database
    $batch_tbl = "CREATE TABLE IF NOT EXISTS Batch_table(
        id INT AUTO_INCREMENT PRIMARY KEY,
        start_year VARCHAR(20),
        end_year VARCHAR(20),
        Title VARCHAR(255) NOT NULL,
        course_id int,
        year_id INT,
        sem_id INT,
        FOREIGN KEY (course_id) REFERENCES Course_table(id),
        FOREIGN KEY (sem_id) REFERENCES Semester_table(id),
        FOREIGN KEY (year_id) REFERENCES Year_table(id)
        )";
    if(mysqli_query($connect,$batch_tbl)){
        echo ' ';
    } else {
        echo 'Failed to create table' . mysqli_error($connect);
    }

    //iseret into course table
    $insert_batch = "INSERT INTO Batch_table(start_year,end_year,Title, course_id,year_id, sem_id)VALUES('$batch_start', '$batch_end', '$batch_title', '$batch_course', '$batch_year', '$batch_semester')";
    if(mysqli_query($connect,$insert_batch)){
        echo '<script>alert("batch inserted successfully");</script>';
    } else {
        echo 'Failed to create table' . mysqli_error($connect);
    }
}catch(Exception $e){
    die('batch table creating error:' .$e->getMessage());
}

?>
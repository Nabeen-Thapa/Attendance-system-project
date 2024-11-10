
<?php
try{
    //connection to database
    include 'create_database.php';
    
    //sql to create course table on database
    $semester_tbl = "CREATE TABLE IF NOT EXISTS Semester_table(
        id INT AUTO_INCREMENT PRIMARY KEY,
        Name VARCHAR(255) NOT NULL,
        Rank INT,
        year_id INT,
        FOREIGN KEY (year_id) REFERENCES Year_table(id)
        -- course_id int,
        -- batch_id int,
        -- FOREIGN KEY (course_id) REFERENCES course_table(id),
        -- FOREIGN KEY (batch_id) REFERENCES Batch_table(id)
    )";
    
    if(mysqli_query($connect,$semester_tbl)){
        echo ' ';
    } else {
        echo 'Failed to create table' . mysqli_error($connect);
    }

    //iseret into course table

    $insert_semester = "INSERT INTO  Semester_table(Name,Rank,year_id)VALUES('First semester','1','1'),('second semester','2','1'),('third semester','3','2'),('fourth semester','4','2'),('fifth semester','5','3'),('sixth semester','6','3'),('seventh semester','7','4'),('eighth semester','8','4')";

    // $insert_semester = "INSERT INTO  Semester_table(Name,Rank,course_id,year_id,batch_id)VALUES('$semester_name', '$semester_rank', '$semester_course', '$semester_year', '$semester_batch')";
    if(mysqli_query($connect,$insert_semester)) {
        echo ' <script>alert("semester added");</script>';
    } else {
        echo '<script>alert("semester added error");</script>';
    }

}catch(Exception $e){
    die('semester table creating error:' .$e->getMessage());
}

?>
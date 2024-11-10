
<?php
try{
    //connection to database
    include 'create_database.php';
    
    //sql to create course table on database
    $year_tbl = "CREATE TABLE IF NOT EXISTS Year_table(
        id INT AUTO_INCREMENT PRIMARY KEY,
        Name VARCHAR(255) NOT NULL,
        Rank INT
        -- course_id int,
        -- batch_id int,
        -- FOREIGN KEY (course_id) REFERENCES course_table(id),
        -- FOREIGN KEY (batch_id) REFERENCES batch_table(id)
    )";
    if(mysqli_query($connect,$year_tbl)){
        echo ' ';
    } else {
        echo 'Failed to create table' . mysqli_error($connect);
    }

    // //iseret into course table
    $insert_year = "INSERT INTO Year_table(Name,Rank)VALUES('First year','1'),('Second year','2'),('Third year','3'),('Fourth year','4')";

    // $insert_year = "INSERT INTO Year_table(Name,Rank,course_id, batch_id)VALUES('$year_name','$year_rank','$year_course','$year_batch')";

    if (mysqli_query($connect, $insert_year)) {
        echo ' <script>alert("year added");</script>';
    } else {
        echo '<script>alert("year added error");</script>';
    }

}catch(Exception $e){
    die('course table creating error:' .$e->getMessage());
}

?>
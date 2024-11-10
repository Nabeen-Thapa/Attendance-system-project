<?php
try{
    //connection to database
    include 'create_database.php';
    
    //sql to create course table on database
    $subject_tbl = "CREATE TABLE IF NOT EXISTS Subjects_table(
        id INT AUTO_INCREMENT PRIMARY KEY,
        Title VARCHAR(255) NOT NULL,
        Subject_code VARCHAR(50),
        Course_id int,
        Year_id INT,
        Semester_id INT,
        FOREIGN KEY (Course_id) REFERENCES Course_table(id),
        FOREIGN KEY (Year_id) REFERENCES Year_table(id),
        FOREIGN KEY (Semester_id) REFERENCES Semester_table(id)
        )";
    if(mysqli_query($connect,$subject_tbl)){
        echo ' ';
    } else {
        echo 'Failed to create subject table' . mysqli_error($connect);
    }
    $insert_subject = " INSERT INTO Subjects_table(Title, Subject_code, Course_id, Year_id,Semester_id)VALUES('$subject_name', '$subject_code', '$subject_course', '$subject_year', '$subject_semester')";
    if(mysqli_query($connect, $insert_subject)){
        echo ' <script>alert("aubject inserted successfully");</script> ';
    } else {
        echo 'Failed to insert in subject table' . mysqli_error($connect);
    }

}catch(Exception $exs){
    die('subjects table creating error:' .$exs->getMessage());
}
?>
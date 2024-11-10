
<?php
error_reporting(0);
try{
    //connection to database
    include 'create_database.php'; 
    //sql to create database table
    $student_tbl = "CREATE TABLE IF NOT EXISTS Student_table(
        id INT AUTO_INCREMENT PRIMARY KEY,
        Name VARCHAR(255) NOT NULL,
        Email VARCHAR(255) NOT NULL,
        Phone VARCHAR(20) NOT NULL,
        login_pwd VARCHAR(20),
        DOB DATE,
        course_type VARCHAR(30),
        std_course int,
        year int,
        Batch_id INT,
        semester int,
        section VARCHAR(10),
        RegistrationNo VARCHAR(30) NOT NULL,
        RollNo VARCHAR(30) NOT NULL,
        address VARCHAR(255) NOT NULL,
        Gender VARCHAR(10),
        image VARCHAR(255),
        Registered_date DATE,
        status TINYINT(1),
        FOREIGN KEY (std_course) REFERENCES Course_table(id),
        FOREIGN KEY (year) REFERENCES Year_table(id),
        FOREIGN KEY (Batch_id) REFERENCES Batch_table(id),
        FOREIGN KEY (semester) REFERENCES Semester_table(id)
       
    )";
    
    if(mysqli_query($connect,$student_tbl)){
        echo ' ';
    } else {
        echo 'Failed to create table';
    }
}catch(Exception $e){
    die('student table creating error :' .$e->getMessage());
}

?>
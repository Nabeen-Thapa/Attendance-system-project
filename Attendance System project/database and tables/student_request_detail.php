
<?php
error_reporting(E_ALL);
try{
    //connection to database
    include 'create_database.php';
    
    //sql to create database table
    $student_tbl = "CREATE TABLE IF NOT EXISTS Student_request_details(
        id INT AUTO_INCREMENT PRIMARY KEY,
        Name VARCHAR(255) NOT NULL,
        Email VARCHAR(255) NOT NULL,
        Phone VARCHAR(20) NOT NULL,
        login_pwd varchar(20),
        DOB DATE,
        course_type VARCHAR(30),
        std_course int,
        year int,
        semester int,
        batch_id int,
        section VARCHAR(10),
        RegistrationNo varchar(30) NOT NULL,
        RollNo varchar(30) NOT NULL,
        address VARCHAR(255) NOT NULL,
        Gender varchar(10),
        image varchar(255),
        request_date DATE,
        status boolean,
        FOREIGN KEY (std_course) REFERENCES course_table(id),
        FOREIGN KEY (year) REFERENCES year_table(id),
        FOREIGN KEY (batch_id) REFERENCES batch_table(id),
        FOREIGN KEY (semester) REFERENCES semester_table(id)
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
<?php
error_reporting(0);
try{
    //connection to database
    include 'create_database.php';
    
    //sql to create database table
    $teacher_tbl = "CREATE TABLE if not exists Teacher_details(
        id INT AUTO_INCREMENT PRIMARY KEY,
        Name VARCHAR(255) NOT NULL,
        Email VARCHAR(255) NOT NULL,
        Phone VARCHAR(20) NOT NULL,
        username VARCHAR(50),
        password varchar(20),
        address VARCHAR(255),
        Gender varchar(10),
        image varchar(255),
        status boolean)";
    if(mysqli_query($connect,$teacher_tbl)){
        echo ' ';
    } else {
        echo 'Failed to create table';
    }
    //iseret into teacher_details table
    $insert_batch = "INSERT INTO Teacher_details(Name, Email, Phone, username, password, address, Gender, image, status)VALUES('$teacher_name','$teacher_email', '$teacher_phone','$teacher_uname', '$teacher_pwd', '$teacher_address','$teacher_gender','$image','1')";
    if(mysqli_query($connect,$insert_batch)){
        echo '<script>alert("batch inserted successfully");</script>';
    } else {
        echo 'Failed to insert into table' . mysqli_error($connect);
    }
}catch(Exception $e){
    die('student table creating error :' .$e->getMessage());
}

?>